export type ValidationErrors<T> = Partial<Record<keyof T, string>>;

export function required(value: unknown, field = 'Field'): string | null {
  if (value === null || value === undefined || value === '') {
    return `${field} wajib diisi.`;
  }
  return null;
}

export function email(value: string): string | null {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!re.test(value)) {
    return 'Format email tidak valid.';
  }
  return null;
}

export function url(value: string): string | null {
  try {
    new URL(value);
    return null;
  } catch {
    return 'Format URL tidak valid.';
  }
}

export function maxLength(value: string, max: number, field = 'Field'): string | null {
  if (value.length > max) {
    return `${field} maksimal ${max} karakter.`;
  }
  return null;
}

export function minMaxNumber(
  value: number | string,
  min: number,
  max: number,
  field = 'Field',
): string | null {
  const n = Number(value);
  if (n < min || n > max) {
    return `${field} harus antara ${min} dan ${max}.`;
  }
  return null;
}

export function slugify(text: string): string {
  return text
    .toLowerCase()
    .trim()
    .replace(/[^\w\s-]/g, '')
    .replace(/[\s_-]+/g, '-')
    .replace(/^-+|-+$/g, '');
}

export type UploadPayload = {
  imageFile?: File;
  removeImage?: boolean;
  image?: string | null;
  thumbnailFile?: File;
  removeThumbnail?: boolean;
  thumbnail?: string | null;
  photoFile?: File;
  removePhoto?: boolean;
  photo?: string | null;
};

export function stripUploadFields<T extends UploadPayload>(
  payload: T,
): Omit<T, 'imageFile' | 'removeImage' | 'thumbnailFile' | 'removeThumbnail' | 'photoFile' | 'removePhoto'> {
  const { imageFile, removeImage, thumbnailFile, removeThumbnail, photoFile, removePhoto, ...rest } = payload;
  return rest;
}
