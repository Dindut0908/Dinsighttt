import { ButtonHTMLAttributes, forwardRef } from 'react';

interface ButtonProps extends ButtonHTMLAttributes<HTMLButtonElement> {
  variant?: 'primary' | 'danger' | 'ghost' | 'outline';
  size?: 'sm' | 'md' | 'lg';
}

const Button = forwardRef<HTMLButtonElement, ButtonProps>(({ variant = 'primary', size = 'md', className = '', disabled, ...props }, ref) => {
  const base = 'rounded-xl font-semibold flex items-center justify-center gap-2 transition disabled:opacity-50 disabled:pointer-events-none';
  const variants: Record<string, string> = {
    primary: 'bg-cyan-500 text-white hover:bg-cyan-600',
    danger: 'bg-red-500 text-white hover:bg-red-600',
    ghost: 'bg-slate-200 dark:bg-white/10 text-slate-900 dark:text-white hover:bg-slate-300 dark:hover:bg-white/20',
    outline: 'border border-slate-200 dark:border-white/10 bg-transparent text-slate-900 dark:text-white hover:bg-slate-100 dark:hover:bg-white/5',
  };
  const sizes: Record<string, string> = {
    sm: 'px-3 py-1.5 text-sm',
    md: 'px-6 py-3 text-base',
    lg: 'px-8 py-4 text-lg',
  };

  return (
    <button
      ref={ref}
      className={`${base} ${variants[variant]} ${sizes[size]} ${className}`}
      disabled={disabled}
      {...props}
    />
  );
});

Button.displayName = 'Button';

export default Button;
