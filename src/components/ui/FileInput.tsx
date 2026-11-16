import { useState } from 'react';
import { forwardRef } from 'react';

interface FileInputProps {
  label?: string;
  accept?: string;
  preview?: string;
  onRemove?: () => void;
  helperText?: string;
}

const FileInput = forwardRef<HTMLInputElement, FileInputProps>(({ label, accept, preview, onRemove, helperText, ...props }, ref) => {
  const [files, setFiles] = useState<FileList | null>(null);

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setFiles(e.target.files);
  };

  return (
    <div className="mb-4 space-y-2">
      {label && (
        <label className="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1">
          {label}
        </label>
      )}
      {preview && (
        <div className="flex items-center gap-3">
          <img src={preview} alt="preview" className="w-40 h-40 object-cover rounded-xl border border-slate-200 dark:border-white/10" />
          {onRemove && (
            <button type="button" onClick={onRemove} className="text-red-500 hover:text-red-600 text-sm font-semibold">
              Hapus gambar
            </button>
          )}
        </div>
      )}
      <input
        ref={ref}
        type="file"
        accept={accept}
        onChange={handleChange}
        className="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-slate-900 dark:text-white focus:outline-none transition"
        {...props}
      />
      {files && files.length > 0 && (
        <p className="text-sm text-slate-500 dark:text-slate-400">
          {files[0].name} ({Math.round(files[0].size / 1024)} KB)
        </p>
      )}
      {helperText && <p className="text-xs text-slate-500 dark:text-slate-400">{helperText}</p>}
    </div>
  );
});

FileInput.displayName = 'FileInput';

export default FileInput;
