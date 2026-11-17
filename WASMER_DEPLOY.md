# Panduan Hosting Project Dinsight di Wasmer Edge

Project Dinsight (React + Supabase SPA) telah dikonfigurasikan agar dapat di-deploy secara langsung ke **Wasmer Edge** menggunakan server WebAssembly performa tinggi (`wasmer/static-web-server`) dengan dukungan fallback routing SPA (React Router).

---

## 📁 File Konfigurasi yang Ditambahkan

1. **`wasmer.toml`**: Manifest paket Wasmer yang mendefinisikan dependency WebAssembly `wasmer/static-web-server`, mounting direktori build (`/public`), dan command eksekusi WASI.
2. **`settings/sws.toml`**: Konfigurasi Static Web Server yang mengaktifkan:
   - `page-fallback = "/public/index.html"` (mencegah error 404 saat refresh route client-side seperti `/admin/*` atau `/login`)
   - Otomatis kompresi (gzip/brotli), header cache, dan keamanan.
3. **`app.yaml`**: Konfigurasi aplikasi Wasmer Edge (CDN cache, nama aplikasi).
4. **`.github/workflows/deploy-wasmer.yml`**: CI/CD otomatis untuk deploy ke Wasmer Edge setiap kali ada `git push` ke branch `main`.

---

## 🚀 Langkah-Langkah Deploy ke Wasmer

### 1. Instalasi Wasmer CLI di Komputer (Windows)

Buka PowerShell lalu jalankan perintah berikut:

```powershell
iwr https://win.wasmer.io -useb | iex
```

Setelah instalasi selesai, tutup dan buka kembali terminal / PowerShell, lalu pastikan Wasmer sudah terpasang:

```powershell
wasmer --version
```

---

### 2. Login ke Akun Wasmer

Jalankan perintah berikut untuk menghubungkan CLI dengan akun Wasmer Anda:

```bash
wasmer login
```

Browser akan terbuka otomatis untuk konfirmasi login, atau Anda dapat memasukkan API token dari dashboard [wasmer.io](https://wasmer.io).

---

### 3. Build & Deploy Project

Anda cukup menjalankan perintah npm yang sudah disediakan:

```bash
npm run wasmer:deploy
```

Atau langkah manualnya:

```bash
# 1. Build aset static React
npm run build

# 2. Deploy ke Wasmer Edge
wasmer deploy
```

> **Catatan saat deploy pertama kali**:
> - Wasmer CLI akan meminta Anda mengonfirmasi nama aplikasi atau namespace username akun Wasmer Anda jika belum terisi di `app.yaml`.
> - Anda dapat mengisi `owner: <username_wasmer_anda>` di file `app.yaml`.

Setelah proses upload selesai, Wasmer akan memberikan URL publik aktif Anda (contoh: `https://dinsight-<username>.wasmer.app`).

---

### 4. Uji Coba Lokal (Opsional)

Jika ingin menjalankan dan menguji server Wasmer secara lokal di komputer sebelum deploy:

```bash
npm run build
wasmer run . --net
```

Buka `http://localhost:8080` di browser.

---

## 🔄 Otomatisasi Deploy via GitHub Actions (Opsional)

Jika repository Anda di-push ke GitHub:
1. Buka repository di GitHub: **Settings** > **Secrets and variables** > **Actions**.
2. Tambahkan **Repository secrets**:
   - `WASMER_TOKEN`: API Token dari akun Wasmer Anda ([Wasmer Settings > Access Tokens](https://wasmer.io/settings/access-tokens)).
   - `VITE_SUPABASE_URL`: URL project Supabase Anda.
   - `VITE_SUPABASE_ANON_KEY`: Anon key Supabase Anda.
3. Setiap kali Anda melakukan `git push` ke branch `main`, GitHub Actions akan otomatis me-build dan men-deploy ke Wasmer Edge.
