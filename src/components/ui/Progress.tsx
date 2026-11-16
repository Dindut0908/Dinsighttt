interface ProgressProps {
  value: number;
  label?: string;
  className?: string;
}

const Progress = ({ value, label, className = '' }: ProgressProps) => {
  return (
    <div className={className}>
      {label && (
        <div className="flex justify-between mb-1 text-xs font-bold text-slate-600 dark:text-slate-400">
          <span>{label}</span>
          <span>{value}%</span>
        </div>
      )}
      <div className="h-2.5 w-full rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
        <div
          className="h-full rounded-full bg-gradient-to-r from-cyan-500 to-purple-500 transition-all duration-700"
          style={{ width: `${value}%` }}
        />
      </div>
    </div>
  );
};

export default Progress;
