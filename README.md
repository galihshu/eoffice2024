<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Office 2024 - Instalasi</title>
</head>
<body>
    <h1>E-Office 2024</h1>

    <p><strong>E-Office 2024</strong> adalah aplikasi berbasis <strong>Laravel 11.x</strong> yang digunakan untuk pengelolaan dokumen, arsip, dan workflow kantor secara digital.</p>

    <p><strong>Catatan:</strong> Laravel 11.x membutuhkan versi minimum <strong>PHP 8.2</strong>.</p>

    <h2>Persyaratan Sistem</h2>
    <ul>
        <li>PHP >= 8.2</li>
        <li>Composer</li>
        <li>MySQL / MariaDB</li>
        <li>Web Server (Apache / Nginx / Laravel Built-in Server)</li>
    </ul>

    <h2>Instalasi</h2>
    <p><strong>Penting:</strong> Project ini menggunakan konfigurasi yang mengakses database sejak awal proses instalasi. Pastikan file environment dan database sudah siap sebelum menjalankan Composer dan Artisan.</p>

    <h3>1. Clone Repository</h3>
    <pre>
git clone https://github.com/galihshu/eoffice2024.git
cd eoffice2024
    </pre>

    <h3>2. Konfigurasi Environment</h3>
    <p>Salin file environment dan sesuaikan konfigurasi dasar aplikasi:</p>
    <pre>
cp .env.example .env
    </pre>

    <h3>3. Konfigurasi Database</h3>
    <p>Buat database baru, lalu sesuaikan konfigurasi database di file <code>.env</code>:</p>
    <pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eoffice2024
DB_USERNAME=root
DB_PASSWORD=
    </pre>

    <p><strong>Default XAMPP:</strong></p>
    <ul>
        <li>Username: root</li>
        <li>Password: (kosongkan)</li>
    </ul>

    <h3>4. Install Dependency</h3>
    <pre>
composer install
    </pre>

    <h3>5. Generate Application Key</h3>
    <pre>
php artisan key:generate
    </pre>

    <h3>6. Storage Link</h3>
    <p>Perintah ini wajib dijalankan agar file upload dapat diakses dengan benar:</p>
    <pre>
php artisan storage:link
    </pre>

    <h3>7. Migrasi dan Seeder Database</h3>
    <pre>
php artisan migrate
php artisan db:seed
    </pre>

    <h3>8. Menjalankan Aplikasi</h3>
    <pre>
php artisan serve
    </pre>

    <h2>Akses Aplikasi</h2>
    <p>Buka browser dan akses:</p>
    <pre>
http://localhost:8000
    </pre>

    <h2>Lisensi</h2>
    <p>Project ini dikembangkan untuk kebutuhan pembelajaran dan pengembangan sistem E-Office. Lisensi dapat disesuaikan dengan kebutuhan masing-masing.</p>
</body>
</html>
