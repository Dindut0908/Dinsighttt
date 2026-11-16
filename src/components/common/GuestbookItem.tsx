import { format } from 'date-fns';
import type { Guestbook } from '../../hooks/useGuestbooks';

interface GuestbookItemProps {
  item: Guestbook;
}

const GuestbookItem = ({ item }: GuestbookItemProps) => {
  const initial = item.name.charAt(0).toUpperCase();
  const date = item.created_at ? format(new Date(item.created_at), 'd MMM yyyy, HH:mm') : '';

  return (
    <div className="p-5 rounded-3xl bg-white dark:bg-[#111827] border border-slate-200 dark:border-white/10">
      <div className="flex items-start gap-3">
        <div className="w-10 h-10 rounded-full bg-cyan-500/10 text-cyan-500 flex items-center justify-center font-bold text-xs">
          {initial}
        </div>
        <div className="flex-1">
          <p className="font-bold text-slate-900 dark:text-white">{item.name}</p>
          <p className="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
            {item.email ?? 'email tidak diisi'} • {date}
          </p>
          <p className="mt-3 text-slate-700 dark:text-slate-300">{item.message}</p>
        </div>
      </div>
    </div>
  );
};

export default GuestbookItem;
