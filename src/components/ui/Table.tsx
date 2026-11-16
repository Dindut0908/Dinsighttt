import { HTMLAttributes } from 'react';

interface TableProps extends HTMLAttributes<HTMLTableElement> {
  children: React.ReactNode;
}

const Table = ({ children, className = '', ...props }: TableProps) => {
  return (
    <div className="overflow-x-auto rounded-2xl border border-slate-200 dark:border-white/10">
      <table
        className="w-full text-sm text-left"
        {...props}
      >
        {children}
      </table>
    </div>
  );
};

interface TableHeaderProps extends HTMLAttributes<HTMLTableSectionElement> {
  children: React.ReactNode;
}

const TableHeader = ({ children, ...props }: TableHeaderProps) => (
  <thead className="bg-slate-100 dark:bg-white/10 text-left" {...props}>
    {children}
  </thead>
);

interface TableRowProps extends HTMLAttributes<HTMLTableRowElement> {
  children: React.ReactNode;
}

const TableRow = ({ children, ...props }: TableRowProps) => <tr {...props}>{children}</tr>;

interface TableHeadProps extends HTMLAttributes<HTMLTableCellElement> {
  children: React.ReactNode;
}

const TableHead = ({ children, ...props }: TableHeadProps) => (
  <th className="p-4 font-semibold text-slate-700 dark:text-slate-300" {...props}>
    {children}
  </th>
);

interface TableBodyProps extends HTMLAttributes<HTMLTableSectionElement> {
  children: React.ReactNode;
}

const TableBody = ({ children, ...props }: TableBodyProps) => <tbody {...props}>{children}</tbody>;

interface TableCellProps extends HTMLAttributes<HTMLTableCellElement> {
  children: React.ReactNode;
}

const TableCell = ({ children, ...props }: TableCellProps) => (
  <td className="p-4 border-t border-slate-200 dark:border-white/10 text-slate-900 dark:text-white" {...props}>
    {children}
  </td>
);

export { Table, TableHeader, TableRow, TableHead, TableBody, TableCell };
