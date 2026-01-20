# E-Office 2024

**E-Office 2024** adalah aplikasi berbasis **Laravel 11.x** untuk pengelolaan dokumen, arsip, dan workflow kantor secara digital. Laravel 11.x membutuhkan PHP versi minimum **8.2**.

**Persyaratan Sistem:** PHP >= 8.2, Composer, MySQL/MariaDB, Web Server (Apache/Nginx/Laravel Built-in Server).

**Instalasi:** Project ini mengakses database sejak awal, pastikan file environment dan database sudah dikonfigurasi sebelum menjalankan Composer dan Artisan.

1. **Clone Repository**  
```bash
git clone https://github.com/galihshu/eoffice2024.git
cd eoffice2024
````

2. **Konfigurasi Environment**

```bash
cp .env.example .env
```

3. **Konfigurasi Database**
   Buat database baru, lalu sesuaikan `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eoffice2024
DB_USERNAME=root
DB_PASSWORD=
```

Default XAMPP: Username `root`, Password kosong.

4. **Install Dependency**

```bash
composer install
```

5. **Generate Application Key**

```bash
php artisan key:generate
```

6. **Storage Link**

```bash
php artisan storage:link
```

7. **Migrasi dan Seeder Database**

```bash
php artisan migrate
php artisan db:seed
```

8. **Menjalankan Aplikasi**

```bash
php artisan serve
```

**Akses Aplikasi:** Buka browser dan akses `http://localhost:8000`.

**Lisensi:** Project ini dikembangkan untuk pembelajaran dan pengembangan sistem E-Office. Lisensi dapat disesuaikan dengan kebutuhan masing-masing.
