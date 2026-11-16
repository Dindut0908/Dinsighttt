<div>
    <label class="block text-sm font-semibold mb-2">Nama Sertifikat</label>
    <input type="text" name="name" value="{{ old('name', $certificate->name ?? '') }}" required
        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
</div>

<div class="grid md:grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-semibold mb-2">Penerbit</label>
        <input type="text" name="issuer" value="{{ old('issuer', $certificate->issuer ?? '') }}" required
            class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold mb-2">Tanggal Terbit</label>
        <input type="date" name="issued_date"
            value="{{ old('issued_date', isset($certificate) ? $certificate->issued_date->format('Y-m-d') : '') }}"
            required
            class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
    </div>
</div>

<div>
    <label class="block text-sm font-semibold mb-2">Foto Sertifikat (opsional)</label>
    @if(!empty($certificate->image))
        <img src="{{ asset('storage/' . $certificate->image) }}"
            class="w-40 rounded-xl mb-2" alt="">
    @endif
    <input type="file" name="image" accept="image/*"
        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10">
</div>

<div>
    <label class="block text-sm font-semibold mb-2">URL Verifikasi (opsional)</label>
    <input type="url" name="credential_url"
        value="{{ old('credential_url', $certificate->credential_url ?? '') }}"
        placeholder="https://..."
        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 focus:border-cyan-500 outline-none">
</div>