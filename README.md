# 📘 Ujion Landing Page & Admin Dashboard

Platform landing page modern dengan admin panel untuk **Ujion** - solusi ujian digital untuk sekolah Indonesia.

---

## 📋 Daftar Isi

1. [Ringkasan](#ringkasan)
2. [Stack Teknologi](#stack-teknologi)
3. [Fitur Utama](#fitur-utama)
4. [Struktur Project](#struktur-project)
5. [Setup & Instalasi](#setup--instalasi)
6. [Konfigurasi](#konfigurasi)
7. [Database](#database)
8. [API Endpoints](#api-endpoints)
9. [Admin Panel](#admin-panel)
10. [Frontend Assets](#frontend-assets)
11. [Testing](#testing)
12. [Deployment](#deployment)

---

## Ringkasan

**Ujion** adalah platform landing page responsif yang dirancang untuk mengkonversi pengunjung menjadi leads (demo/kontak) dengan fokus pada **conversion optimization**. Dilengkapi dengan:

- ✅ **Landing Page Dinamis**: 9 section yang dapat diedit dari admin
- ✅ **Lead Capture Form**: Formulir kontak dengan validasi & WhatsApp redirect
- ✅ **Analytics Tracking**: Pelacakan event (CTA clicks, scroll depth, page views)
- ✅ **Admin Dashboard**: Panel kontrol untuk manage leads & konten landing
- ✅ **Authentication**: Sistem login untuk akses admin
- ✅ **Responsive Design**: Mobile-first design dengan Tailwind CSS
- ✅ **Performance Optimized**: Lazy loading & optimized assets

---

## Stack Teknologi

### Backend

- **Framework**: Laravel 12.56.0
- **Database**: SQLite (production: PostgreSQL recommended)
- **PHP**: ^8.3
- **ORM**: Eloquent Models

### Frontend

- **Templating**: Blade (no Inertia/React)
- **Styling**: Tailwind CSS v4.0 + @tailwindcss/vite
- **Components**: Flowbite (v2.x)
- **Build Tool**: Vite v7+
- **Fonts**: Inter (body) & Poppins (headings) via Google Fonts
- **Analytics**: Vanilla JavaScript (no Google Analytics)

### Tools & Dependencies

- **Package Manager**: Composer (PHP), npm (JavaScript)
- **Task Runner**: Laravel Artisan
- **Testing**: PHPUnit
- **Version Control**: Git

---

## Fitur Utama

### 1. Landing Page (Public)

Halaman publik dengan 9 section konten:

1. **Hero Section** - Headline, subheadline, CTA buttons
2. **Problem Section** - Tantangan yang dihadapi sekolah
3. **Benefit Section** - Hasil yang akan didapat (4 metrics)
4. **Solution Section** - 4 solusi terintegrasi Ujion
5. **Features Section** - 4 fitur utama platform
6. **How It Works** - 4 langkah proses
7. **Pricing Section** - Paket harga terjangkau
8. **Final CTA** - Call-to-action terakhir sebelum footer
9. **Footer** - Branding & links

**Fitur Landing:**

- Form lead capture dengan validasi
- Redirect otomatis ke WhatsApp setelah submit lead
- Real-time tracking: CTA clicks, scroll depth (25%-100%), page views
- Reveal animations on scroll
- Sticky mobile CTA button
- Session ID tracking untuk analytics

### 2. Admin Panel (Protected by Auth)

Dashboard untuk manage konten & leads:

#### Dashboard (`/admin`)

- Statistik: Total leads, leads hari ini, total events, CTA clicks
- Tabel leads 8 terbaru dengan kontak & conversion info

#### Data Leads (`/admin/leads`)

- Paginated table (15 per page) dari semua leads
- Kolom: name, kontak, sekolah, peran, CTA variant, waktu submit
- Filter & search ready (implementasi future)

#### Pengaturan Landing (`/admin/settings`)

- Edit 14 field konten landing page:
    - Brand & WhatsApp number
    - Hero headline & subheadline
    - Problem, Benefit, Solution titles
    - Features, How-it-works, Pricing titles
    - Final CTA title & subtitle

#### Authentication

- Login page (`/login`)
- Logout functionality
- Session management
- Demo account: `admin@example.com` / `password`

---

## Struktur Project

```
LP-Ujion-byReditech/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── LandingPageController.php      # Public landing page logic
│   │   │   ├── Admin/
│   │   │   │   └── DashboardController.php    # Admin dashboard logic
│   │   │   └── Auth/
│   │   │       └── LoginController.php        # Authentication
│   │   └── Requests/
│   │       └── StoreLeadRequest.php           # Form validation
│   └── Models/
│       ├── Lead.php                           # Lead model
│       ├── LandingEvent.php                   # Event tracking
│       ├── SiteSetting.php                    # Content settings
│       └── User.php                           # Admin users
│
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table
│   │   ├── 0001_01_01_000001_create_cache_table
│   │   ├── 0001_01_01_000002_create_jobs_table
│   │   ├── 2026_03_31_000000_create_leads_table
│   │   ├── 2026_03_31_000001_create_landing_events_table
│   │   └── 2026_03_31_000002_create_site_settings_table
│   └── database.sqlite                        # SQLite database
│
├── resources/
│   ├── views/
│   │   ├── landing.blade.php                  # Public landing page
│   │   ├── admin/
│   │   │   ├── layouts/app.blade.php          # Admin master layout
│   │   │   ├── dashboard.blade.php            # Dashboard page
│   │   │   ├── leads/index.blade.php          # Leads table
│   │   │   └── settings/edit.blade.php        # Settings form
│   │   └── auth/
│   │       └── login.blade.php                # Login form
│   ├── css/
│   │   └── app.css                            # Tailwind + fonts
│   └── js/
│       └── app.js                             # Flowbite JS
│
├── public/
│   ├── assets/
│   │   ├── css/landing.css                    # Custom landing styles
│   │   └── js/landing.js                      # Landing tracking script
│   └── build/                                 # Vite build artifacts
│
├── routes/
│   └── web.php                                # All application routes
│
├── config/
│   └── landing.php                            # Landing page config
│
├── tests/
│   ├── Unit/
│   └── Feature/
│
├── .env                                       # Environment variables
├── .env.example                               # Example env
├── composer.json                              # PHP dependencies
├── package.json                               # JavaScript dependencies
├── vite.config.js                             # Vite configuration
└── README.md                                  # This file
```

---

## Setup & Instalasi

### Prerequisites

- PHP 8.3+
- Node.js 20.19+ atau 22.12+
- Composer
- Git

### Installation Steps

1. **Clone repository**

```bash
git clone <repo-url>
cd LP-Ujion-byReditech
```

2. **Install PHP dependencies**

```bash
composer install
```

3. **Install JavaScript dependencies**

```bash
npm install
```

4. **Setup environment file**

```bash
cp .env.example .env
php artisan key:generate
```

5. **Run migrations**

```bash
php artisan migrate
```

6. **Seed demo admin user** (optional)

```bash
php artisan tinker
# Dalam tinker:
App\Models\User::create([
  'name' => 'Admin User',
  'email' => 'admin@example.com',
  'password' => bcrypt('password'),
  'email_verified_at' => now()
]);
exit
```

7. **Build frontend assets**

```bash
npm run build
```

8. **Start development server**

```bash
php artisan serve
```

9. **Access application**

- Landing page: `http://localhost:8000`
- Admin: `http://localhost:8000/admin` (login required)
- Login: `http://localhost:8000/login`

---

## Konfigurasi

### Environment Variables (.env)

```env
# App
APP_NAME="Ujion"
APP_URL=http://localhost:8000
APP_ENV=local
APP_DEBUG=true
APP_KEY=base64:...

# Database
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite

# Landing Page
LANDING_BRAND="Ujion"
LANDING_WHATSAPP="6281234567890"

# Mail (untuk production)
MAIL_MAILER=smtp
MAIL_HOST=...
MAIL_PORT=...
```

### Landing Config (`config/landing.php`)

```php
return [
    'brand' => env('LANDING_BRAND', 'Ujion'),
    'whatsapp_number' => env('LANDING_WHATSAPP', '6281234567890'),
];
```

### Vite Config (`vite.config.js`)

- Entry points:
    - `resources/css/app.css` - Tailwind + Flowbite
    - `resources/js/app.js` - Flowbite JS
- Output: `public/build/`
- Google Fonts import dalam CSS

---

## Database

### Schema

#### `users` Table

```sql
CREATE TABLE users (
  id BIGINT PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255) UNIQUE,
  password VARCHAR(255),
  email_verified_at TIMESTAMP,
  timestamps
);
```

#### `leads` Table

```sql
CREATE TABLE leads (
  id BIGINT PRIMARY KEY,
  name VARCHAR(120),
  phone VARCHAR(30),
  email VARCHAR(255),
  school_name VARCHAR(160),
  role VARCHAR(80),
  message TEXT,
  cta_variant VARCHAR(100),
  source VARCHAR(100),
  ip_address VARCHAR(45),
  user_agent TEXT,
  timestamps
);
```

#### `landing_events` Table

```sql
CREATE TABLE landing_events (
  id BIGINT PRIMARY KEY,
  event_name VARCHAR(60),
  event_category VARCHAR(60),
  event_label VARCHAR(120),
  event_value INT,
  metadata JSON,
  session_id VARCHAR(120),
  ip_address VARCHAR(45),
  user_agent TEXT,
  timestamps,
  INDEX (event_name, created_at),
  INDEX (session_id)
);
```

#### `site_settings` Table

```sql
CREATE TABLE site_settings (
  id BIGINT PRIMARY KEY,
  key VARCHAR(100) UNIQUE,
  value TEXT,
  timestamps
);
```

---

## API Endpoints

### Public Routes

#### Landing Page

```
GET  /                     → Landing page view
POST /leads                → Submit lead form
POST /tracking/events      → Track analytics events
```

### Admin Routes (Protected by `auth` middleware)

```
GET  /admin                → Dashboard
GET  /admin/leads          → Leads table
GET  /admin/settings       → Settings form
PUT  /admin/settings       → Update settings
```

### Auth Routes

```
GET  /login                → Login form (guest only)
POST /login                → Login submit
POST /logout               → Logout
```

---

## Admin Panel

### Dashboard Features

1. **Statistics Cards**
    - Total Leads (all time)
    - Leads Today
    - Total Events Tracked
    - CTA Clicks Count

2. **Recent Leads Table**
    - 8 newest leads displayed
    - Columns: Name, Phone, Email, School, Role, CTA, Time
    - Link to full leads list

### Leads Management

- Full paginated table (15 per page)
- Sortable columns (future)
- Export to CSV (future)
- Delete/edit leads (future)

### Content Editor

Edit 14 fields dari landing page:

| Section         | Fields                      |
| --------------- | --------------------------- |
| Brand & Contact | Brand name, WhatsApp number |
| Hero            | Headline, Subheadline       |
| Problem         | Title, Closing text         |
| Benefit         | Title                       |
| Solution        | Title                       |
| Features        | Title                       |
| How It Works    | Title                       |
| Pricing         | Title, Note/Subtitle        |
| Final CTA       | Title, Subtitle             |

**Validation:**

- Max length per field enforced
- Required fields validation
- Error messages in Bahasa Indonesia
- Session flash messages on success

---

## Frontend Assets

### CSS

#### `resources/css/app.css`

- Tailwind CSS v4.0 import
- Google Fonts import (Inter, Poppins)
- Flowbite plugin
- CSS variables for custom fonts

#### `public/assets/css/landing.css`

- Custom landing page styles
- 2-column hero grid
- Card components
- Button variants
- Section spacing
- Reveal animations
- Mobile-first responsive design

### JavaScript

#### `resources/js/app.js`

- Bootstrap Laravel helpers
- Flowbite components initialization
- Interactive elements support (dropdowns, modals, etc.)

#### `public/assets/js/landing.js`

- Session ID generation & storage
- Event tracking via fetch keepalive
- Scroll depth tracking (25%, 50%, 75%, 100%)
- CTA click tracking
- Page view tracking
- IntersectionObserver for reveal animations

### Fonts

```css
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700&display=swap");

:root {
    --font-sans: "Inter", sans-serif;
    --font-heading: "Poppins", sans-serif;
}
```

---

## Testing

### Run Tests

```bash
php artisan test
```

### Test Coverage

- 2 tests passing
- Unit & Feature tests included
- Database migrations validated in tests

### Example Test

```php
// tests/Feature/ExampleTest.php
public function test_the_application_returns_a_successful_response(): void
{
    $response = $this->get('/');
    $response->assertStatus(200);
}
```

---

## Deployment

### Production Checklist

- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Generate app key: `php artisan key:generate`
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Cache routes: `php artisan route:cache`
- [ ] Cache config: `php artisan config:cache`
- [ ] Build frontend: `npm run build`
- [ ] Set strong passwords for admin users
- [ ] Configure email for notifications (future)
- [ ] Setup SSL/TLS certificate
- [ ] Configure database (PostgreSQL recommended)
- [ ] Setup automated backups

### Recommended Hosting

- **Server**: Linux (Ubuntu 22.04+)
- **Web Server**: Nginx or Apache
- **PHP**: 8.3+ with required extensions
- **Database**: PostgreSQL (production)
- **Cache**: Redis (optional)
- **Queue**: Supervisor + Redis (if needed)

### Nginx Configuration Example

```nginx
server {
    listen 80;
    server_name ujion.example.com;
    root /var/www/ujion/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.env {
        deny all;
    }
}
```

---

## Troubleshooting

### Database Not Found

```bash
# Create SQLite database
php artisan migrate
```

### Assets Not Loading

```bash
# Rebuild frontend
npm run build

# Clear Vite cache
rm -rf public/build
npm run build
```

### Permission Issues

```bash
# Fix directory permissions
chmod -R 775 storage bootstrap/cache

# Fix file ownership
chown -R www-data:www-data .
```

### Session Issues

```bash
# Clear sessions
php artisan session:clear

# Cache views
php artisan view:cache
```

---

## Resources & References

- [Laravel 12 Documentation](https://laravel.com/docs/12.x)
- [Tailwind CSS v4 Docs](https://tailwindcss.com/docs)
- [Flowbite Components](https://flowbite.com)
- [Blade Templating Guide](https://laravel.com/docs/12.x/blade)
- [Laravel Models & Eloquent](https://laravel.com/docs/12.x/eloquent)

---

## Support & Contact

Untuk pertanyaan atau bug reports, hubungi tim development.

---

## License

Proprietary © 2026 Ujion

---

**Last Updated**: March 31, 2026  
**Version**: 1.0.0  
**Status**: Production Ready ✅
