# SNIPER PHOTOGRAPHY - Full-Stack Photography Website
## Created by: Abubakar Musa

---

## 🎯 PROJECT OVERVIEW

A modern, responsive, and full-stack photography website for **Sniper Photography**, featuring a premium black, gold, and white color theme with smooth animations, dark/light mode toggle, and a complete admin dashboard.

---

## 🚀 FEATURES

### Frontend
- ✅ Fullscreen Hero Slider with background images
- ✅ About Section with skills animation
- ✅ Filterable Portfolio Gallery with Lightbox
- ✅ Services with pricing cards
- ✅ Booking Form with date picker
- ✅ Testimonials Slider
- ✅ Contact Form with Google Maps
- ✅ Dark/Light Mode Toggle
- ✅ Responsive Design (Mobile, Tablet, Desktop)
- ✅ Smooth scroll animations
- ✅ Loading screen

### Backend
- ✅ Secure Admin Authentication (Login/Logout)
- ✅ Admin Dashboard with statistics
- ✅ Booking Management (View, Update Status, Delete)
- ✅ Gallery Management (Upload, Delete with thumbnails)
- ✅ Services Management
- ✅ Testimonials Management
- ✅ Messages Management (Contact form submissions)
- ✅ Settings (Change Password, Site Info)
- ✅ AJAX-powered status updates
- ✅ Image upload with validation
- ✅ SQL Injection prevention
- ✅ Input validation and sanitization

---

## 🛠️ TECHNOLOGY STACK

| Layer | Technology |
|-------|-----------|
| Frontend | HTML5, CSS3, JavaScript (Vanilla) |
| Backend | PHP 7.4+ |
| Database | MySQL 5.7+ |
| Icons | Font Awesome 6 |
| Charts | Chart.js |
| Fonts | Google Fonts (Playfair Display, Inter) |

---

## 📁 PROJECT STRUCTURE

```
sniper-photography/
├── index.php                  # Main website homepage
├── database.sql               # Database schema
├── assets/
│   ├── css/
│   │   ├── style.css          # Main styles
│   │   ├── nav.css            # Navigation styles
│   │   ├── hero.css           # Hero section styles
│   │   ├── sections.css       # All section styles
│   │   └── admin.css          # Admin dashboard styles
│   ├── js/
│   │   ├── main.js            # Main website JavaScript
│   │   └── admin.js           # Admin dashboard JavaScript
│   ├── images/                # Static images
│   └── uploads/
│       └── gallery/           # Uploaded gallery images
├── includes/
│   ├── db.php                 # Database connection
│   └── auth.php               # Authentication functions
├── api/
│   ├── booking.php            # Booking form API
│   ├── contact.php            # Contact form API
│   ├── update-status.php      # Status update API
│   └── gallery-upload.php     # Gallery upload API
└── admin/
    ├── index.php              # Admin dashboard
    ├── login.php              # Admin login page
    ├── login-process.php      # Login handler
    ├── logout.php             # Logout handler
    ├── bookings.php           # Bookings management
    ├── gallery.php            # Gallery management
    ├── services.php           # Services management
    ├── testimonials.php       # Testimonials management
    ├── messages.php           # Messages management
    ├── settings.php           # Settings page
    └── api/
        ├── get-booking.php    # Get single booking
        └── get-message.php    # Get single message
```

---

## ⚙️ INSTALLATION

### Step 1: Database Setup

1. Create a MySQL database named `sniper_photography`
2. Import the `database.sql` file:
   ```bash
   mysql -u root -p sniper_photography < database.sql
   ```

### Step 2: Configuration

1. Open `includes/db.php`
2. Update database credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_username');
   define('DB_PASS', 'your_password');
   define('DB_NAME', 'sniper_photography');
   ```

### Step 3: Upload to Server

1. Upload all files to your web server (e.g., `public_html/sniper-photography/`)
2. Ensure the `assets/uploads/gallery/` directory is writable:
   ```bash
   chmod 755 assets/uploads/gallery/
   ```

### Step 4: Access

- **Website**: `http://yourdomain.com/sniper-photography/`
- **Admin Panel**: `http://yourdomain.com/sniper-photography/admin/`

### Default Admin Credentials
- **Username**: `admin`
- **Password**: `admin123`

⚠️ **IMPORTANT**: Change the default password immediately after first login!

---

## 🔐 SECURITY FEATURES

- Password hashing with bcrypt
- SQL injection prevention (prepared statements)
- XSS protection (output escaping)
- CSRF token support
- Input validation and sanitization
- File upload validation (type, size)
- Secure session management
- Security headers (X-Frame-Options, X-Content-Type-Options, X-XSS-Protection)

---

## 📱 RESPONSIVE BREAKPOINTS

| Device | Width |
|--------|-------|
| Mobile | < 768px |
| Tablet | 768px - 992px |
| Desktop | > 992px |

---

## 🎨 COLOR SCHEME

| Color | Hex Code | Usage |
|-------|----------|-------|
| Primary Gold | `#D4AF37` | Buttons, accents, highlights |
| Gold Dark | `#B8860B` | Gradients, hover states |
| Black | `#0a0a0a` | Background |
| Black Light | `#1a1a1a` | Cards, sections |
| White | `#ffffff` | Text, light mode |

---

## 📧 CONTACT

**Abubakar Musa**
- Email: abubakar@sniperphotography.com
- Instagram: @sniperphotography
- Location: Lagos, Nigeria

---

## 📄 LICENSE

This project is proprietary software created for Sniper Photography.

---

## 🙏 CREDITS

- Font Awesome for icons
- Unsplash for demo images
- Chart.js for analytics charts
- Google Fonts for typography

---

**Built with ❤️ by Abubakar Musa**


---

## 💳 PAYMENT GATEWAY (Paystack)

### Supported Payment Methods
- Visa, Mastercard, Verve cards
- Bank Transfer
- USSD
- Mobile Money
- QR Code

### Setup
1. Sign up at https://paystack.com
2. Get your API keys from dashboard
3. Update `paystack_settings` table with your keys
4. See `PAYSTACK_SETUP.md` for detailed instructions

### Payment Flow
1. Customer submits booking form
2. Booking saved with "unpaid" status
3. Customer proceeds to Paystack checkout
4. Payment verified automatically via callback
5. Booking updated to "paid" status
6. Admin notified in dashboard

### Test Cards
- **Card**: 4084084084084081
- **CVV**: 408
- **Expiry**: Any future date
- **PIN**: 0000
- **OTP**: 123456

---

## 🗄️ UPDATED DATABASE TABLES

| Table | Purpose |
|-------|---------|
| users | Admin accounts |
| bookings | Client bookings with payment fields |
| payments | Transaction log from Paystack |
| services | Photography services & pricing |
| gallery | Portfolio images |
| categories | Image categories |
| testimonials | Client reviews |
| messages | Contact form submissions |
| settings | Site configuration |
| paystack_settings | Payment gateway credentials |

---
