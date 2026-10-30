# Landing Page Profil Dosen & Kelola Data Publikasi Ilmiah

Aplikasi web profil dosen dan portofolio akademik untuk **Dr. Reski Pilu, S.Pd., M.Pd.** (Dosen S1 PGSD & Pendidikan Bahasa Inggris, FKIP Universitas Cokroaminoto Palopo - UNCP), dilengkapi dengan sistem katalog publik dan modul Admin CRUD untuk mengelola data publikasi ilmiah.

---

## 🚀 Fitur Utama

- **Landing Page Profil Dosen:** Menampilkan biografi akademik, keahlian, riwayat pendidikan, mata kuliah, statistik publikasi, serta tautan profil riset (SINTA, Google Scholar, ORCID).
- **Katalog Publikasi Publik:** Halaman penelusuran publikasi ilmiah dilengkapi pencarian, filter per tahun, dan tautan DOI / jurnal.
- **Kelola Data Publikasi Ilmiah (Admin CRUD):** Panel pengelolaan publikasi ilmiah (Tambah, Lihat, Perbarui, Hapus) disertai ringkasan statistik total karya dan total sitasi.

---

## 📋 Prasyarat Sistem

Sebelum memulai, pastikan perangkat Anda telah terpasang:

- **PHP** >= 8.2 (direkomendasikan PHP 8.3) dengan ekstensi `pdo_sqlite`, `openssl`, `mbstring`, `curl`
- **Composer** (v2.x)
- **Node.js** (v18.x atau lebih baru) & **npm**
- **Git**

---

## 🛠️ Panduan Clone dan Instalasi

Ikuti langkah-langkah berikut untuk mengunduh (clone) dan menjalankan repositori ini di lingkungan lokal Anda:

### 1. Clone Repositori

Buka terminal / command prompt, lalu clone repositori dan masuk ke direktori proyek:

```bash
git clone https://github.com/Adrobi251/Portofolio-Akademik.git
cd Portofolio-Akademik
```

---

### 2. Pasang Dependensi PHP (Composer)

Jalankan perintah berikut untuk menginstal seluruh dependensi Laravel:

```bash
composer install
```

---

### 3. Salin File Konfigurasi Environment (`.env`)

Salin file `.env.example` menjadi `.env`:

- **Linux / macOS / Git Bash:**
  ```bash
  cp .env.example .env
  ```
- **Windows (Command Prompt):**
  ```cmd
  copy .env.example .env
  ```
- **Windows (PowerShell):**
  ```powershell
  Copy-Item .env.example .env
  ```

---

### 4. Buat Application Encryption Key

Generate kunci aplikasi Laravel:

```bash
php artisan key:generate
```

---

### 5. Setup Database & Seeding Data Publikasi

Aplikasi ini menggunakan SQLite secara default sehingga Anda tidak perlu mengonfigurasi database server tambahan:

1. **Buat file database SQLite** (jika belum ada):
   - **Linux / macOS / Git Bash:**
     ```bash
     touch database/database.sqlite
     ```
   - **Windows (PowerShell):**
     ```powershell
     New-Item -ItemType File -Path database\database.sqlite -Force
     ```

2. **Jalankan Migrasi Tabel & Seeder:**
   ```bash
   php artisan migrate --seed
   ```
   *Atau jika hanya ingin menjalankan seeder data publikasi Dr. Reski Pilu:*
   ```bash
   php artisan db:seed --class=PublicationSeeder
   ```

---

### 6. Pasang Dependensi Frontend & Build Asset

Pasang dependensi Node.js lalu compile asset (Tailwind CSS v4 & Vite):

```bash
npm install
npm run build
```

---

### ⚡ Opsi Cepat (Setup Otomatis)

Jika Composer dan NPM sudah terpasang, Anda juga dapat menggunakan script setup bawaan:

```bash
composer run setup
php artisan db:seed --class=PublicationSeeder
```

---

## 💻 Menjalankan Server Lokal (Development)

Untuk menjalankan server pengembangan lokal:

### Cara 1: Menggunakan Perintah Sekaligus
```bash
composer run dev
```

### Cara 2: Menjalankan di Dua Terminal Terpisah
- **Terminal 1 (PHP Server):**
  ```bash
  php artisan serve
  ```
- **Terminal 2 (Vite Hot-Reload):**
  ```bash
  npm run dev
  ```

Setelah server berjalan, akses aplikasi melalui peramban:
- **Landing Page Utama:** [http://localhost:8000](http://localhost:8000)
- **Katalog Publikasi Publik:** [http://localhost:8000/publikasi](http://localhost:8000/publikasi)
- **Kelola Data Publikasi (Admin CRUD):** [http://localhost:8000/admin/publications](http://localhost:8000/admin/publications)

---

## 🧪 Menjalankan Pengujian (Testing)

Untuk memastikan seluruh pengujian fitur dan validasi CRUD berjalan dengan baik:

```bash
php artisan test
```

---

## 📂 Struktur Data Dosen

Data profil dosen dapat disesuaikan melalui file konfigurasi:
- File konfigurasi dosen: `config/dosen.php`
- Seeder data publikasi: `database/seeders/PublicationSeeder.php`

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan akademik dan portofolio dosen. Dilisensikan di bawah [MIT License](LICENSE).
