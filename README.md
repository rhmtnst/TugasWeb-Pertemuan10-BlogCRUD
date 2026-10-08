# Tugas Web Pertemuan 10 — Blog CRUD Laravel

## 👤 Identitas

- **Nama:** Rahmat Hamonangan Nasution
- *NIM:** 4253250053
- **Universitas:** Universitas Negeri Medan
- **Mata Kuliah:** Pemrograman Web
- **Pertemuan:** 10
- **Project:** Blog CRUD Laravel

---

## 📌 Deskripsi

Tugas Web Pertemuan 10 merupakan implementasi aplikasi **Blog CRUD menggunakan Laravel**.

Project ini menerapkan konsep routing, resource controller, Blade templating, validasi form, flash message, route model binding, pagination, serta fitur bonus berupa pencarian, soft delete, dan upload gambar.

---

## 🎯 Tujuan

Project ini bertujuan untuk memahami dan menerapkan:

- Resource Routing pada Laravel
- Resource Controller
- CRUD (Create, Read, Update, Delete)
- Blade Layout dengan `@extends` dan `@yield`
- Blade Components
- Validasi form
- Error message pada setiap field
- Old input
- Flash message
- CSRF Protection
- Method Spoofing PUT dan DELETE
- Route Model Binding
- Pagination
- Pencarian data
- Soft Delete
- Upload gambar

---

## 🛠️ Teknologi yang Digunakan

- PHP
- Laravel
- MySQL
- Blade
- HTML
- CSS
- Composer
- Laragon
- Visual Studio Code

---

## ✨ Fitur Utama

### 1. CRUD Post

Aplikasi menyediakan operasi CRUD untuk data post:

- Menampilkan daftar post
- Menambahkan post baru
- Melihat detail post
- Mengedit post
- Menghapus post

### 2. Validasi Form

Form post memiliki validasi:

- Judul wajib diisi
- Judul maksimal 200 karakter
- Isi post wajib diisi
- Isi post minimal 10 karakter
- Gambar bersifat opsional
- Format gambar yang diperbolehkan: JPG, JPEG, PNG, dan WEBP
- Ukuran gambar maksimal 2 MB

### 3. Resource Controller

Project menggunakan `PostController` sebagai Resource Controller dengan tujuh method utama:

- `index()`
- `create()`
- `store()`
- `show()`
- `edit()`
- `update()`
- `destroy()`

### 4. Resource Route

Routing CRUD menggunakan:

`Route::resource('posts', PostController::class);`

Dengan resource route tersebut, Laravel menyediakan route untuk seluruh proses CRUD post.

### 5. Blade Layout

Project menggunakan layout utama:

`resources/views/layouts/app.blade.php`

Halaman post menggunakan Blade inheritance melalui `@extends` dan `@yield`.

### 6. Blade Components

Project menggunakan minimal dua Blade Components:

- `alert.blade.php`
- `card.blade.php`

Component digunakan untuk membuat tampilan lebih terstruktur dan dapat digunakan kembali.

### 7. CSRF Protection

Setiap form POST menggunakan:

`@csrf`

Hal ini digunakan untuk memberikan perlindungan terhadap serangan CSRF.

### 8. Method Spoofing

Form update menggunakan:

`@method('PUT')`

Sedangkan form delete menggunakan:

`@method('DELETE')`

---

## ⭐ Fitur Bonus

### 1. Pencarian Post

Post dapat dicari berdasarkan:

- Judul
- Isi post

Fitur ini memudahkan pengguna menemukan post tertentu tanpa harus melihat seluruh daftar post.

### 2. Soft Delete

Project menggunakan Soft Delete.

Ketika sebuah post dihapus, data tidak langsung dihapus secara permanen dari database. Laravel menyimpan waktu penghapusan pada kolom `deleted_at`.

### 3. Upload Gambar

Post dapat memiliki gambar.

Fitur upload mendukung:

- JPG
- JPEG
- PNG
- WEBP

Ukuran maksimal gambar adalah 2 MB.

Gambar disimpan menggunakan storage Laravel.

Gambar juga dapat diganti ketika melakukan proses edit post.

---

## 🌐 Route

Route utama aplikasi:

| Method | URL | Fungsi |
|---|---|---|
| GET | `/` | Redirect ke halaman blog |
| GET | `/posts` | Menampilkan daftar post |
| GET | `/posts/create` | Menampilkan form tambah post |
| POST | `/posts` | Menyimpan post baru |
| GET | `/posts/{post}` | Menampilkan detail post |
| GET | `/posts/{post}/edit` | Menampilkan form edit post |
| PUT/PATCH | `/posts/{post}` | Memperbarui post |
| DELETE | `/posts/{post}` | Menghapus post |

---

## 🔄 Alur CRUD

### Create

Pengguna membuka halaman tambah post melalui:

`/posts/create`

Kemudian mengisi form dan mengirimkan data.

Laravel melakukan:

1. Validasi data
2. Menyimpan post
3. Menyimpan gambar jika ada
4. Mengarahkan pengguna kembali ke halaman yang sesuai
5. Menampilkan flash message

### Read

Halaman `/posts` menampilkan daftar post yang tersimpan di database.

Data ditampilkan menggunakan Blade.

Pagination digunakan untuk membatasi jumlah post yang ditampilkan pada satu halaman.

### Update

Pengguna dapat membuka:

`/posts/{post}/edit`

Data post akan ditampilkan kembali pada form.

Setelah form dikirim:

1. Data divalidasi
2. Data post diperbarui
3. Gambar dapat diganti jika diperlukan
4. Pengguna diarahkan kembali
5. Flash message ditampilkan

### Delete

Pengguna dapat menghapus post melalui tombol delete.

Form delete menggunakan:

`@csrf`

dan:

`@method('DELETE')`

Post kemudian diproses menggunakan Soft Delete.

---

## 🔗 Route Model Binding

Project menggunakan Route Model Binding Laravel.

Contohnya pada route:

`/posts/{post}`

Laravel secara otomatis mengambil data `Post` berdasarkan parameter tersebut dan mengirimkannya ke Controller.

Dengan demikian, Controller tidak perlu melakukan pencarian ID secara manual menggunakan `findOrFail()`.

---

## 📄 Pagination

Daftar post menggunakan pagination untuk membatasi jumlah data yang ditampilkan pada setiap halaman.

Pagination membantu membuat halaman blog tetap rapi ketika jumlah post semakin banyak.

---

## 🗃️ Database

Database MySQL yang digunakan:

`tugasweb_p10`

Konfigurasi database pada `.env`:

- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=tugasweb_p10`
- `DB_USERNAME=root`
- `DB_PASSWORD=`

Database digunakan untuk menyimpan data post dan informasi yang diperlukan oleh fitur Blog CRUD.

---

## 📂 Struktur Project

    TugasWeb-Pertemuan10-BlogCRUD/
    │
    ├── app/
    │   ├── Http/
    │   │   └── Controllers/
    │   │       └── PostController.php
    │   │
    │   └── Models/
    │       └── Post.php
    │
    ├── bootstrap/
    ├── config/
    │
    ├── database/
    │   └── migrations/
    │       ├── create_posts_table.php
    │       ├── add_deleted_at_to_posts_table.php
    │       ├── fix_deleted_at_on_posts_table.php
    │       └── add_image_to_posts_table.php
    │
    ├── public/
    │
    ├── resources/
    │   └── views/
    │       ├── layouts/
    │       │   └── app.blade.php
    │       │
    │       ├── components/
    │       │   ├── alert.blade.php
    │       │   └── card.blade.php
    │       │
    │       └── posts/
    │           ├── index.blade.php
    │           ├── create.blade.php
    │           ├── show.blade.php
    │           └── edit.blade.php
    │
    ├── routes/
    │   └── web.php
    │
    ├── storage/
    ├── tests/
    ├── .env.example
    ├── artisan
    ├── composer.json
    ├── composer.lock
    └── README.md

---

## ▶️ Instalasi dan Menjalankan Project

### 1. Clone Repository

    git clone https://github.com/rhmtnst/TugasWeb-Pertemuan10-BlogCRUD.git

### 2. Masuk ke Folder Project

    cd TugasWeb-Pertemuan10-BlogCRUD

### 3. Install Dependency

    composer install

### 4. Buat File `.env`

    copy .env.example .env

### 5. Generate Application Key

    php artisan key:generate

### 6. Konfigurasi Database

Buat database MySQL dengan nama:

    tugasweb_p10

Kemudian sesuaikan konfigurasi database pada file `.env`.

### 7. Jalankan Migration

    php artisan migrate

### 8. Buat Symbolic Link Storage

    php artisan storage:link

### 9. Jalankan Server Laravel

    php artisan serve

### 10. Buka Browser

    http://127.0.0.1:8000

---

## 📸 Dokumentasi Tampilan

### 1. Halaman Daftar Blog

Menampilkan seluruh post yang tersedia pada aplikasi.

<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/a92ca382-d4d1-4520-9d06-08e47f8b31ca" />

---

### 2. Halaman Tambah Post

Menampilkan form untuk membuat post baru.

<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/496a4660-1713-4261-839f-f78334fcae72" />


---

### 3. Validasi Form

Menampilkan pesan error ketika data yang dimasukkan tidak memenuhi aturan validasi.

<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/1dc722d2-bfa2-44d5-a84e-330a9e305201" />


---

### 4. Post Berhasil Ditambahkan

Menampilkan flash message setelah post berhasil dibuat.

<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/93c548ed-5ab4-462b-9939-a09ee09568e0" />


---

### 5. Detail Post

Menampilkan isi lengkap dari sebuah post.

<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/fb147f58-fb24-4033-bcee-ec073e268eb4" />



---

### 6. Edit Post

Menampilkan form untuk mengubah data post.

<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/722a7551-79f2-459f-9723-f9402cb45cc6" />


---

### 7. Post Berhasil Diperbarui

Menampilkan hasil setelah data post berhasil diperbarui.

<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/4c40fa45-1db4-4224-80c3-5742f7c5c738" />


---

### 8. Hapus Post

Menampilkan proses penghapusan post menggunakan method DELETE dan Soft Delete.

<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/c06267d3-56c4-4326-b7d5-999b2512666d" />
<img width="1366" height="768" alt="image" src="https://github.com/user-attachments/assets/6ecb46de-dd0d-4b55-97b4-7ef3881b9e9d" />


---


## 🔐 Keamanan dan Validasi

Project menerapkan beberapa fitur keamanan bawaan Laravel:

- CSRF Protection menggunakan `@csrf`
- Validasi input menggunakan Laravel Validation
- Error validation pada setiap field
- Old input untuk mempertahankan data form ketika validasi gagal
- Method Spoofing untuk PUT dan DELETE
- Route Model Binding
- File upload validation
- Batas ukuran file upload
- Soft Delete

---

## 📚 Kesimpulan

Tugas Web Pertemuan 10 berhasil menerapkan konsep Routing, Controller, Blade, dan CRUD pada framework Laravel.

Project telah mengimplementasikan Resource Route dan Resource Controller dengan tujuh method CRUD, Blade Layout, Blade Components, validasi form, flash message, CSRF Protection, Method Spoofing, Route Model Binding, dan Pagination.

Selain requirement utama, project juga menerapkan fitur bonus berupa pencarian post, Soft Delete, dan upload gambar.

Project ini menjadi dasar untuk memahami bagaimana Laravel digunakan untuk membangun aplikasi web yang terstruktur menggunakan konsep MVC.

---

## 🔗 Repository

[GitHub — TugasWeb-Pertemuan10-BlogCRUD](https://github.com/rhmtnst/TugasWeb-Pertemuan10-BlogCRUD)
