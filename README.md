
<div align="center">
  <img src="https://github.com/muhammadfariddd/garden-gallery/blob/master/public/images/logo-navbar.png" alt="Fileswift Logo" width="300">
  <br/>

  <em>Platform E-commerce Elegan untuk Pecinta Tanaman, Dibangun dengan Laravel, Tailwind CSS, dan Filament.</em>
  <br/><br/>


<a href="https://laravel.com/" target="_blank">
    <img alt="Laravel" src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel"/>
</a>
<a href="https://tailwindcss.com/" target="_blank">  
    <img alt="Tailwind CSS" src="https://img.shields.io/badge/Tailwind_CSS-4-38B2AC?style=for-the-badge&logo=tailwind-css"/>
</a>
<a href="https://filamentphp.com/" target="_blank">
    <img alt="Filament" src="https://img.shields.io/badge/Filament-Admin_Panel-blueviolet?style=for-the-badge&logo=filament&logoColor=white">
</a>

</div>


---

**Garden Gallery** adalah aplikasi web e-commerce *full-stack* yang modern dan fungsional. Dirancang sebagai showcase implementasi nyata dari framework **Laravel** untuk backend yang *powerful* dan **Tailwind CSS** untuk frontend yang bersih dan responsif. Aplikasi ini menyediakan semua fitur esensial yang dibutuhkan sebuah toko online, dari etalase produk yang memukau hingga dasbor admin yang komprehensif yang dibuat menggunakan **Filament**.

---

## ✨ Fitur Utama

- ✅ **Desain Modern & Responsif** — Antarmuka yang indah dan berfungsi sempurna di desktop, tablet, dan seluler, berkat Tailwind CSS.
- ✅ **Manajemen Keranjang Belanja** — Fungsionalitas keranjang belanja yang intuitif untuk pengalaman pengguna yang lancar.
- ✅ **Dasbor Admin yang Aman** — Panel admin terproteksi untuk mengelola seluruh aspek toko.
- ✅ **Manajemen Konten (CRUD)** — Kemudahan dalam menambah, mengedit, dan menghapus produk serta kategori.

---

## 🖼️ Tampilan Aplikasi

Berikut adalah beberapa cuplikan dari aplikasi Garden Gallery.

|                                                         Halaman Utama                                                         |                                                         Halaman Toko                                                         |                                                         Dasbor Admin                                                         |
| :---------------------------------------------------------------------------------------------------------------------------: | :--------------------------------------------------------------------------------------------------------------------------: | :--------------------------------------------------------------------------------------------------------------------------: |
| <img src="https://github.com/user-attachments/assets/7ee63a5f-ba9e-4491-85a3-4f62c811f9a0" alt="Halaman Utama" width="300" /> | <img src="https://github.com/user-attachments/assets/c730db8d-94b7-4646-9b0b-10a8e3352379" alt="Halaman Toko" width="300" /> | <img src="https://github.com/user-attachments/assets/2ea735e6-e5f1-47d4-8dc2-e54721398b91" alt="Dasbor Admin" width="300" /> |

---

## 🛠️ Tumpukan Teknologi

| Komponen | Teknologi | Deskripsi |
| :--- | :--- | :--- |
| **Backend** | **Laravel 11** | Framework PHP untuk backend yang tangguh, routing, & validasi. |
| **Frontend** | **Blade & Tailwind CSS** | Membangun UI yang cepat, modern, dan sepenuhnya dapat disesuaikan. |
| **Compiler** | **Vite** | Build tool frontend generasi baru untuk kompilasi aset yang super cepat. |
| **Database** | **MySQL** | Sistem manajemen database relasional yang andal. |
| **Utilitas** | **Spatie Sluggable** | Paket untuk menghasilkan slug secara otomatis dari nama model. |

---

## 🚀 Cara Memulai

Ikuti panduan berikut untuk menjalankan proyek ini secara lokal di perangkat Anda.

### 🧾 Prasyarat

- PHP >= 8.1
- Composer
- Node.js & NPM / Yarn
- Git
- Database (MySQL)

### ⚙️ Langkah Instalasi

1.  **Clone Repositori**
    ```bash
    git clone https://github.com/muhammadfariddd/garden-gallery.git
    cd garden-gallery
    ```

2.  **Instal Dependensi & Siapkan Environment**
    ```bash
    composer install
    cp .env.example .env
    php artisan key:generate
    ```

3.  **Konfigurasi Database**
    Buka file `.env` dan sesuaikan kredensial database Anda.
    ```env
    DB_DATABASE=garden_gallery
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Migrasi & Seeding Database**
    Perintah ini akan membuat struktur tabel dan mengisi data awal (termasuk akun admin).
    ```bash
    php artisan migrate --seed
    ```

5.  **Buat Storage Link**
    Agar file gambar yang diunggah dapat diakses dari web.
    ```bash
    php artisan storage:link
    ```

6.  **Instal & Compile Aset Frontend**
    ```bash
    npm install
    npm run dev
    ```

7.  **Jalankan Server Lokal**
    ```bash
    php artisan serve
    ```

✨ Selesai! Aplikasi Anda sekarang dapat diakses di **`http://127.0.0.1:8000`**.

---

### 🧑‍💼 Akses Dasbor Admin

Gunakan kredensial berikut untuk masuk ke dasbor admin di `/admin/login`. Akun ini dibuat secara otomatis oleh *database seeder*.

-   **Email:** `admin@example.com`
-   **Password:** `password`

---

## 🤝 Kontribusi

Kontribusi Anda sangat kami hargai! Jika Anda ingin membantu mengembangkan proyek ini, silakan ikuti langkah-langkah berikut:

1.  **Fork** repositori ini.
2.  Buat *branch* fitur baru (`git checkout -b fitur/NamaFiturBaru`).
3.  *Commit* perubahan Anda (`git commit -m 'Menambahkan fitur X'`).
4.  *Push* ke *branch* tersebut (`git push origin fitur/NamaFiturBaru`).
5.  Buka sebuah **Pull Request**.

  ![GitHub Repo stars](https://img.shields.io/github/stars/username/repo-name?style=for-the-badge)
  [![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

<br/>
<p align="center">
  © 2025 Garden Gallery - Dibuat dengan ❤️ oleh Muhammad Farid
</p>
