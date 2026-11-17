import { useEffect, useState, useCallback } from 'react';
import { supabase } from '../lib/supabase';
import type { User } from '@supabase/supabase-js';

export function useAuth() {
  const [user, setUser] = useState<User | null>(null);
  const [loading, setLoading] = useState(true);
  const [isAdmin, setIsAdmin] = useState(false);
  const [roleLoading, setRoleLoading] = useState(true);

  useEffect(() => {
  // 1. Buat fungsi async di dalam useEffect
  const getInitialUser = async () => {
    const { data: { user } } = await supabase.auth.getUser();
    setUser(user);
  };

  getInitialUser();

    const { data: authListener } = supabase.auth.onAuthStateChange(async (_event, session) => {
      setUser(session?.user ?? null);
      setLoading(false);
      await checkAdminRole(session?.user ?? null);
    });

    supabase.auth.getSession().then(async ({ data }) => {
      setUser(data.session?.user ?? null);
      setLoading(false);
      await checkAdminRole(data.session?.user ?? null);
    });

    const { data: { subscription } } = supabase.auth.onAuthStateChange(
    (_event, session) => {
      setUser(session?.user ?? null);
    }
  );

  return () => {
    subscription.unsubscribe(); // <-- Pakai subscription.unsubscribe()
  };
}, []);

  const checkAdminRole = useCallback(async (currentUser: User | null) => {
    if (!currentUser) {
      setIsAdmin(false);
      setRoleLoading(false);
      return;
    }
    const { data, error } = await supabase.rpc('is_admin');
    setIsAdmin(Boolean(data) && !error);
    setRoleLoading(false);
  }, []);

  const signIn = useCallback(
    async (email: string, password: string) => {
      const { error } = await supabase.auth.signInWithPassword({ email, password });
      return { error };
    },
    [],
  );

  const signUp = useCallback(
    async (email: string, password: string, name: string) => {
      const { error } = await supabase.auth.signUp({
        email,
        password,
        options: { data: { name } },
      });
      return { error };
    },
    [],
  );

  const signOut = useCallback(async () => {
    const { error } = await supabase.auth.signOut();
    return { error };
  }, []);

  return { user, loading, isAdmin, roleLoading, signIn, signUp, signOut };
}
