
import Navbar from './Navbar';
import { useEffect, type ReactNode } from 'react';

type WindowWithAOS = Window & {
  AOS?: {
    init: (opts?: unknown) => void;
  };
};

interface GuestLayoutProps {
  children: ReactNode;
}

const GuestLayout = ({ children }: GuestLayoutProps) => {
  useEffect(() => {
    if (
      typeof window !== 'undefined' &&
      (window as WindowWithAOS).AOS
    ) {
      (window as WindowWithAOS).AOS?.init({
        duration: 800,
        once: true,
        offset: 80,
      });
    }
  }, []);

  return (
    <div className="min-h-screen bg-slate-100 dark:bg-[#070B14] text-slate-900 dark:text-white transition-colors duration-500 overflow-x-hidden">
      <Navbar />

      <main className="pt-20 pb-10">
        {children}
      </main>
    </div>
  );
};

export default GuestLayout;
