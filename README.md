# QUIZ PBWL
Project ini dibangun menggunakan <a href="https://laravel.com">Laravel</a> untuk menyelesaikan quiz pada pata kuliah PBWL.

## Sistem Yang Dibutuhkan
- PHP ^8.1
- Composer
- Database Relasional

## Cara Instalasi
1. Clone project `https://github.com/nafbeckh/quiz-pbwl.git` 
2. Masuk ke direktori project `cd quiz-pbw` 
3. Install semua dependensi `composer install` 
4. Copy file .env.example `cp .env.example .env`
5. Generate key dengan `php artisan key:generate`
6. Konfigurasi database di file `.env`
7. Migrasi database `php artisan migrate --seed`
8. Jalankan server `php artisan serv`

### Default Login 
```
Email: admin@gmail.com
Password: admin
```