import { useEffect, useState } from 'react';
import { CheckCircle, AlertCircle } from 'lucide-react';

type ToastType = 'success' | 'error';

interface ToastProps {
  message: string;
  type: ToastType;
  duration?: number;
}

const Toast = ({ message, type, duration = 3000 }: ToastProps) => {
  const [visible, setVisible] = useState(true);

  useEffect(() => {
    const t = setTimeout(() => setVisible(false), duration);
    return () => clearTimeout(t);
  }, [duration]);

  if (!visible) return null;

  const isSuccess = type === 'success';
  const Icon = isSuccess ? CheckCircle : AlertCircle;
  const color = isSuccess ? 'text-green-500' : 'text-red-500';
  const bg = isSuccess ? 'bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-400' : 'bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-400';

  return (
    <div className={`fixed bottom-6 right-6 z-[100] px-4 py-3 rounded-xl shadow-lg flex items-center gap-3 animate-in fade-in slide-in-from-right-2 duration-300 ${bg} border border-slate-200 dark:border-white/10`}>
      <Icon className="w-5 h-5" />
      <p className="text-sm font-semibold">{message}</p>
    </div>
  );
};

export default Toast;
