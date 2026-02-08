# E-Office 2024

**E-Office 2024** adalah aplikasi berbasis **Laravel 11.x** untuk pengelolaan dokumen, arsip, dan workflow kantor secara digital. Laravel 11.x membutuhkan PHP versi minimum **8.2**.

**Persyaratan Sistem:** PHP >= 8.2, Composer, MySQL/MariaDB, Web Server (Apache/Nginx/Laravel Built-in Server).

**Instalasi:** Project ini mengakses database sejak awal, pastikan file environment dan database sudah dikonfigurasi sebelum menjalankan Composer dan Artisan.

1. **Clone Repository**  
```bash
git clone https://github.com/galihshu/eoffice2024.git
cd eoffice2024
```

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
npm install
```

5. **Generate Application Key**

```bash
php artisan key:generate
```

6. **Storage Link**

```bash
php artisan storage:link
```

7. **Build Assets**

```bash
npm run build
```

8. **Migrasi dan Seeder Database**

```bash
php artisan migrate
php artisan db:seed
```

9. **Menjalankan Aplikasi**

```bash
php artisan serve
```

**Akses Aplikasi:** Buka browser dan akses `http://localhost:8000`.

## Dependencies & Packages

### PHP Packages (Composer)

**Laravel Core:**
- `laravel/framework` ^11.9
- `laravel/tinker` ^2.9
- `laravel/ui` ^4.5

**External Packages:**
- `guzzlehttp/guzzle` ^7.9 - HTTP client library
- `maatwebsite/excel` ^3.1 - Export/import Excel files
- `realrashid/sweet-alert` ^7.2 - SweetAlert notifications
- `spatie/laravel-permission` ^6.9 - Role-based permissions
- `yajra/laravel-datatables` 11.0 - DataTables integration

**Development:**
- `fakerphp/faker` ^1.23 - Fake data generator
- `laravel/pint` ^1.13 - Code style fixer
- `laravel/sail` ^1.26 - Docker development environment
- `mockery/mockery` ^1.6 - Mock objects for testing
- `nunomaduro/collision` ^8.0 - Error handler
- `phpunit/phpunit` ^11.0.1 - Testing framework

### Frontend Packages (NPM)

**UI Framework & Styling:**
- `bootstrap` ^5.2.3 - CSS framework
- `tailwindcss` ^3.4.7 - Utility-first CSS framework
- `@popperjs/core` ^2.11.6 - Tooltip/popover positioning

**Build Tools:**
- `vite` ^5.0 - Build tool
- `laravel-vite-plugin` ^1.0 - Laravel integration for Vite
- `autoprefixer` ^10.4.19 - CSS post-processing
- `postcss` ^8.4.40 - CSS transformation
- `sass` ^1.56.1 - SCSS compiler

**JavaScript Libraries:**
- `axios` ^1.6.4 - HTTP client
- `laravel-datatables-vite` ^0.5.2 - DataTables for Vite

**Lisensi:** Project ini dikembangkan untuk pembelajaran dan pengembangan sistem E-Office. Lisensi dapat disesuaikan dengan kebutuhan masing-masing.
