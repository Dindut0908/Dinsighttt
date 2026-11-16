
import { useEffect, useState, useCallback } from 'react';
import { supabase } from '../lib/supabase';
import type { User } from '@supabase/supabase-js';

export function useAuth() {
  const [user, setUser] = useState<User | null>(null);
  const [loading, setLoading] = useState(true);
  const [isAdmin, setIsAdmin] = useState(false);
  const [roleLoading, setRoleLoading] = useState(true);

  // Memeriksa sesi login
  useEffect(() => {
    let mounted = true;

    const {
      data: { subscription },
    } = supabase.auth.onAuthStateChange((_event, session) => {
      if (mounted) {
  setUser(session?.user ?? null);
  setRoleLoading(!!session?.user);
  setLoading(false);

  if (!session?.user) {
    setIsAdmin(false);
  }
}
    });

    const checkSession = async () => {
      const { data, error } = await supabase.auth.getSession();

      if (!mounted) return;

      if (error) {
        console.error('Gagal memeriksa sesi:', error.message);
      }

      setUser(data.session?.user ?? null);
setRoleLoading(!!data.session?.user);
setLoading(false);

if (!data.session?.user) {
  setIsAdmin(false);
}
    };

    checkSession();

    return () => {
      mounted = false;
      subscription.unsubscribe();
    };
  }, []);

  // Memeriksa apakah pengguna memiliki role admin
  useEffect(() => {
    let mounted = true;

    const checkAdmin = async () => {
      if (!user) {
        setIsAdmin(false);
        setRoleLoading(false);
        return;
      }

      setRoleLoading(true);

      const { data, error } = await supabase.rpc('is_admin' as any);

      if (!mounted) return;

      if (error) {
        console.error('Gagal memeriksa role admin:', error.message);
        setIsAdmin(false);
      } else {
        setIsAdmin(data === true);
      }

      setRoleLoading(false);
    };

    checkAdmin();

    return () => {
      mounted = false;
    };
  }, [user]);

  // Login
  const signIn = useCallback(
    async (email: string, password: string) => {
      const { error } = await supabase.auth.signInWithPassword({
        email,
        password,
      });

      return { error };
    },
    [],
  );

  // Registrasi
  const signUp = useCallback(
    async (email: string, password: string, name: string) => {
      const { error } = await supabase.auth.signUp({
        email,
        password,
        options: {
          data: { name },
        },
      });

      return { error };
    },
    [],
  );

  // Logout
  const signOut = useCallback(async () => {
    const { error } = await supabase.auth.signOut();
    return { error };
  }, []);

  return {
    user,
    loading,
    isAdmin,
    roleLoading,
    signIn,
    signUp,
    signOut,
  };
}
