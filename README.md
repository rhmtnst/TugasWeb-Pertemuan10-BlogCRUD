# TugasWeb-Pertemuan10-BlogCRUD

## Deskripsi

Project ini merupakan implementasi Tugas Rutin Pertemuan 10 pada mata kuliah Pemrograman Web menggunakan Laravel.

Aplikasi yang dibuat adalah Blog CRUD yang menerapkan routing, controller, Blade templating, validasi form, flash message, route model binding, pagination, serta beberapa fitur bonus.

## Teknologi

- Laravel
- PHP
- MySQL
- Blade
- HTML
- CSS

## Fitur Utama

### CRUD Post

- Menampilkan daftar post
- Membuat post baru
- Melihat detail post
- Mengedit post
- Menghapus post

### Validasi

Form post memiliki validasi:

- Judul wajib diisi dan maksimal 200 karakter
- Isi post wajib diisi dan minimal 10 karakter
- Gambar bersifat opsional
- File gambar dibatasi pada format JPG, JPEG, PNG, dan WEBP
- Ukuran gambar maksimal 2 MB

### Fitur Laravel

- Resource Controller
- Resource Route
- Route Model Binding
- Blade Layout
- Blade Components
- CSRF Protection
- Method Spoofing PUT dan DELETE
- Flash Message
- Pagination

## Fitur Bonus

### 1. Pencarian

Post dapat dicari berdasarkan judul maupun isi post.

### 2. Soft Delete

Post yang dihapus tidak langsung dihapus secara permanen dari database. Laravel menyimpan waktu penghapusan pada kolom `deleted_at`.

### 3. Upload Gambar

Post dapat memiliki gambar yang disimpan pada storage Laravel.

Gambar juga dapat diganti ketika melakukan proses edit post.

## Struktur Utama

```text
app/
├── Http/
│   └── Controllers/
│       └── PostController.php
└── Models/
    └── Post.php

database/
└── migrations/
    ├── create_posts_table.php
    ├── add_deleted_at_to_posts_table.php
    ├── fix_deleted_at_on_posts_table.php
    └── add_image_to_posts_table.php

resources/
└── views/
    ├── layouts/
    │   └── app.blade.php
    ├── components/
    │   ├── alert.blade.php
    │   └── card.blade.php
    └── posts/
        ├── index.blade.php
        ├── create.blade.php
        ├── show.blade.php
        └── edit.blade.php

routes/
└── web.php

Instalasi

Clone repository:

git clone https://github.com/rhmtnst/TugasWeb-Pertemuan10-BlogCRUD.git

Masuk ke folder project:

cd TugasWeb-Pertemuan10-BlogCRUD

Install dependency:

composer install

Salin file environment:

copy .env.example .env

Generate application key:

php artisan key:generate
Konfigurasi Database

Buat database MySQL dengan nama:

tugasweb_p10

Kemudian sesuaikan konfigurasi .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tugasweb_p10
DB_USERNAME=root
DB_PASSWORD=

Jalankan migration:

php artisan migrate

Buat symbolic link storage:

php artisan storage:link
Menjalankan Project

Jalankan server Laravel:

php artisan serve

Kemudian buka:

http://127.0.0.1:8000
Route Utama
Method	URL	Fungsi
GET	/	Redirect ke Blog
GET	/posts	Daftar post
GET	/posts/create	Form tambah post
POST	/posts	Menyimpan post
GET	/posts/{post}	Detail post
GET	/posts/{post}/edit	Form edit
PUT/PATCH	/posts/{post}	Memperbarui post
DELETE	/posts/{post}	Menghapus post
Catatan

File .env tidak disertakan dalam repository karena berisi konfigurasi lokal dan informasi sensitif.

Project ini dibuat untuk memenuhi Tugas Rutin Pertemuan 10 — Blog CRUD Laravel.