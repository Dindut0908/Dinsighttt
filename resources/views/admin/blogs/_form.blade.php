<div>
    <label class="block text-sm font-semibold mb-2">Judul Artikel</label>
    <input type="text" name="title" value="{{ old('title', $blog->title ?? '') }}" required
        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
</div>

<div>
    <label class="block text-sm font-semibold mb-2">Konten Artikel</label>
    <textarea name="content" rows="12" required
        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none font-mono text-sm">{{ old('content', $blog->content ?? '') }}</textarea>
    <p class="text-xs text-slate-500 mt-1">Bisa pakai HTML sederhana, contoh: &lt;p&gt;paragraf&lt;/p&gt;</p>
</div>

<div>
    <label class="block text-sm font-semibold mb-2">Excerpt / Ringkasan (opsional)</label>
    <textarea name="excerpt" rows="2"
        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
    <p class="text-xs text-slate-500 mt-1">Kosongkan untuk auto-generate dari konten</p>
</div>

<div>
    <label class="block text-sm font-semibold mb-2">Thumbnail (opsional)</label>
    @if(!empty($blog->thumbnail))
        <img src="{{ asset('storage/' . $blog->thumbnail) }}"
            class="w-40 rounded-xl mb-2" alt="">
    @endif
    <input type="file" name="thumbnail" accept="image/*"
        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10">
</div>

<div class="grid md:grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-semibold mb-2">Tanggal Terbit</label>
        <input type="date" name="published_at"
            value="{{ old('published_at', isset($blog) && $blog->published_at ? $blog->published_at->format('Y-m-d') : date('Y-m-d')) }}"
            class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
    </div>
    <div class="flex items-end">
        <label class="inline-flex items-center gap-2">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" value="1"
                {{ old('is_published', $blog->is_published ?? true) ? 'checked' : '' }}
                class="w-5 h-5 rounded">
            <span class="text-sm font-semibold">Publish sekarang</span>
        </label>
    </div>
</div>