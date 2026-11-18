// Compatibility client: keeps the supabase-js call shapes used by the hooks,
// but talks to the Dinsight REST API (server/index.js) backed by MySQL.

const TOKEN_KEY = 'dinsight_token';

export const isSupabaseConfigured = true;

export type User = { id: string; email: string; name?: string | null };
type Session = { user: User } | null;
type DbError = { message: string } | null;

const getToken = () => localStorage.getItem(TOKEN_KEY);

async function api<T = unknown>(
  url: string,
  init: RequestInit = {},
): Promise<{ data: T | null; error: DbError }> {
  const headers = new Headers(init.headers);
  const token = getToken();
  if (token) headers.set('Authorization', `Bearer ${token}`);
  if (init.body && typeof init.body === 'string') headers.set('Content-Type', 'application/json');
  try {
    const res = await fetch(url, { ...init, headers });
    const body = await res.json().catch(() => null);
    if (!res.ok) return { data: null, error: { message: body?.error ?? `HTTP ${res.status}` } };
    return { data: body as T, error: null };
  } catch (e) {
    return { data: null, error: { message: (e as Error).message } };
  }
}

type Op = 'select' | 'insert' | 'update' | 'delete';

class QueryBuilder implements PromiseLike<{ data: any; error: DbError }> {
  private op: Op = 'select';
  private filters: Record<string, string> = {};
  private orderBy?: string;
  private payload: unknown;
  private isSingle = false;

  constructor(private table: string) {}

  select(_cols?: string) { return this; }
  insert(payload: unknown) { this.op = 'insert'; this.payload = payload; return this; }
  update(payload: unknown) { this.op = 'update'; this.payload = payload; return this; }
  delete() { this.op = 'delete'; return this; }
  eq(col: string, val: unknown) { this.filters[col] = String(val); return this; }
  order(col: string, opts?: { ascending?: boolean }) {
    this.orderBy = `${col}.${opts?.ascending === false ? 'desc' : 'asc'}`;
    return this;
  }
  single() { this.isSingle = true; return this; }

  private async run(): Promise<{ data: any; error: DbError }> {
    const base = `/api/t/${this.table}`;
    if (this.op === 'select') {
      const q = new URLSearchParams();
      for (const [k, v] of Object.entries(this.filters)) q.set(`eq.${k}`, v);
      if (this.orderBy) q.set('order', this.orderBy);
      const r = await api<any[]>(`${base}?${q}`);
      if (r.error) return r;
      return this.isSingle ? { data: r.data?.[0] ?? null, error: null } : r;
    }
    if (this.op === 'insert') {
      return api(base, { method: 'POST', body: JSON.stringify(this.payload) });
    }
    const id = this.filters.id;
    if (!id) return { data: null, error: { message: 'id filter required' } };
    if (this.op === 'update') {
      return api(`${base}/${id}`, { method: 'PATCH', body: JSON.stringify(this.payload) });
    }
    return api(`${base}/${id}`, { method: 'DELETE' });
  }

  then<R1, R2>(
    ok?: ((v: { data: any; error: DbError }) => R1 | PromiseLike<R1>) | null,
    fail?: ((e: unknown) => R2 | PromiseLike<R2>) | null,
  ) {
    return this.run().then(ok, fail);
  }
}

const listeners = new Set<(event: string, session: Session) => void>();
const emit = (event: string, session: Session) => listeners.forEach((l) => l(event, session));

async function currentUser(): Promise<User | null> {
  if (!getToken()) return null;
  const r = await api<{ user: User }>('/api/auth/me');
  if (r.error) {
    localStorage.removeItem(TOKEN_KEY);
    return null;
  }
  return r.data!.user;
}

const auth = {
  async getSession() {
    const user = await currentUser();
    return { data: { session: user ? { user } : null } };
  },
  onAuthStateChange(cb: (event: string, session: Session) => void) {
    listeners.add(cb);
    return { data: { subscription: { unsubscribe: () => listeners.delete(cb) } } };
  },
  async signInWithPassword({ email, password }: { email: string; password: string }) {
    const r = await api<{ token: string; user: User }>('/api/auth/login', {
      method: 'POST',
      body: JSON.stringify({ email, password }),
    });
    if (r.error) return { error: r.error };
    localStorage.setItem(TOKEN_KEY, r.data!.token);
    emit('SIGNED_IN', { user: r.data!.user });
    return { error: null };
  },
  async signUp(_args: unknown) {
    return { error: { message: 'Pendaftaran ditutup. Hubungi admin.' } as DbError };
  },
  async signOut() {
    localStorage.removeItem(TOKEN_KEY);
    emit('SIGNED_OUT', null);
    return { error: null };
  },
};

const storage = {
  from(_bucket: string) {
    return {
      async upload(p: string, file: File) {
        const fd = new FormData();
        fd.append('path', p); // must precede the file for multer
        fd.append('file', file);
        const r = await api('/api/storage', { method: 'POST', body: fd });
        return { error: r.error };
      },
      async remove(paths: string[]) {
        const r = await api('/api/storage', { method: 'DELETE', body: JSON.stringify({ paths }) });
        return { error: r.error };
      },
      getPublicUrl(p: string) {
        return { data: { publicUrl: `/uploads/${p.split('/').map(encodeURIComponent).join('/')}` } };
      },
    };
  },
};

export const supabase = {
  from: (table: string) => new QueryBuilder(table),
  auth,
  storage,
  async rpc(fn: string) {
    if (fn !== 'is_admin') return { data: null, error: { message: `Unknown rpc ${fn}` } };
    const r = await api<{ isAdmin: boolean }>('/api/auth/me');
    return { data: r.data?.isAdmin ?? false, error: r.error };
  },
};

export default supabase;
