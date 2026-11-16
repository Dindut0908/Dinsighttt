import { HTMLAttributes } from 'react';

interface CardProps extends HTMLAttributes<HTMLDivElement> {
  padding?: 'none' | 'sm' | 'md' | 'lg';
}

const Card = ({ children, className = '', padding = 'md', ...props }: CardProps) => {
  const paddingMap: Record<string, string> = {
    none: '',
    sm: 'p-4',
    md: 'p-6',
    lg: 'p-8',
  };

  return (
    <div
      {...props}
      className={`rounded-2xl bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 ${paddingMap[padding]} ${className}`}
    />
  );
};

export default Card;
