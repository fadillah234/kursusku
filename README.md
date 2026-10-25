# KursusKu

KursusKu adalah platform belajar online sederhana yang dibuat menggunakan Laravel untuk memenuhi praktikum Framework Laravel, MVC, Route, Controller, dan View.

## Fitur

- Menampilkan halaman utama KursusKu.
- Menampilkan informasi dan ilustrasi platform belajar.
- Menampilkan empat kursus unggulan.
- Mengirim data kursus dari controller ke Blade view.
- Menggunakan CSS untuk mengatur tampilan dan responsivitas.
- Menggunakan route untuk mengakses halaman utama.

## Teknologi

- PHP
- Laravel
- Blade Template
- HTML
- CSS
- Git

## Struktur MVC

- **Route:** `routes/web.php`
- **Controller:** `app/Http/Controllers/HomeController.php`
- **View:** `resources/views/home.blade.php`
- **CSS:** `public/css/style.css`
- **Gambar:** `public/images/hero-kursus.jpg`

## Cara Menjalankan Proyek

1. Pastikan PHP, Composer, dan Laravel sudah tersedia.
2. Buka terminal di folder proyek.
3. Jalankan perintah:

   ```bash
   php artisan serve
   ```

4. Buka browser dan akses `http://127.0.0.1:8000`.

## Pengujian

Pengujian yang telah dilakukan:

- Memastikan halaman utama dapat ditampilkan.
- Memastikan data empat kursus muncul pada halaman.
- Memastikan perubahan teks pada Blade ditampilkan.
- Memeriksa tampilan responsif pada layar sempit.
- Memastikan URL yang tidak terdaftar menampilkan halaman 404.
- Memeriksa daftar route dengan `php artisan route:list`.

## Tujuan Praktikum

Praktikum ini bertujuan memahami alur request Laravel melalui route, controller, dan view serta mengenal pengelolaan versi proyek menggunakan Git.