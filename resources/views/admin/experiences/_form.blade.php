{{-- File ini berisi field input saja. Di-include oleh create & edit. --}}

<div>
    <label class="block text-sm font-semibold mb-2">Posisi / Kegiatan</label>
    <input type="text" name="position" value="{{ old('position', $experience->position ?? '') }}" required
        placeholder="Contoh: Web Developer Intern"
        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
</div>

<div class="grid md:grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-semibold mb-2">Nama Instansi</label>
        <input type="text" name="organization" value="{{ old('organization', $experience->organization ?? '') }}" required
            class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold mb-2">Periode</label>
        <input type="text" name="period" value="{{ old('period', $experience->period ?? '') }}" required
            placeholder="Jul 2023 - Des 2023"
            class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
    </div>
</div>

<div>
    <label class="block text-sm font-semibold mb-2">Deskripsi</label>
    <textarea name="description" rows="4"
        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">{{ old('description', $experience->description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-semibold mb-2">Gambar (opsional)</label>
    @if(!empty($experience->image))
        <img src="{{ asset('storage/' . $experience->image) }}"
            class="w-40 h-40 object-cover rounded-xl mb-2" alt="">
    @endif
    <input type="file" name="image" accept="image/*"
        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10">
</div>

<div>
    <label class="inline-flex items-center gap-2">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $experience->is_active ?? true) ? 'checked' : '' }}
            class="w-5 h-5 rounded">
        <span class="text-sm font-semibold">Tampilkan di Website</span>
    </label>
</div>