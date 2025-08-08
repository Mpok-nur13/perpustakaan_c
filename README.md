# Perpustakaan C

Aplikasi manajemen perpustakaan berbasis Laravel.

Persyaratan sistem: PHP >= 8.0, Composer, MySQL, XAMPP/Laragon (opsional), Git.

Cara instalasi:  
Clone repository dengan perintah:
git clone https://github.com/username/nama-repo.git  
Masuk ke folder project:
cd nama-repo  
Install dependencies:
composer install  
Buat file .env dari .env.example lalu sesuaikan pengaturan database:  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=perpustakaan_c  
DB_USERNAME=root  
DB_PASSWORD=  
Generate application key:
php artisan key:generate  
Jalankan migrasi database:
php artisan migrate  
Jalankan server Laravel:
php artisan serve  
Akses di browser: http://127.0.0.1:8000

Fitur: CRUD Buku, CRUD Peminjaman Buku, Autentikasi Admin.

Lisensi: MIT License.
