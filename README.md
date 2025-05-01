# Laravel Blog CMS

A complete Blog Content Management System (CMS) built with Laravel. It includes full control over blog content, categories, pages, media, and site settings — from both frontend and backend.

---

## 🚀 Frontend Features

- Dynamic logo, site name, and copyright
- Dynamic page menu with active page highlighting
- Search functionality for posts
- Dynamic blog post listing
- Latest posts widget
- Related posts under single post
- Dynamic categories and subcategories
- User authentication (Login, Register, Forgot Password)
- Responsive design (mobile/tablet friendly)

---

## 🛠 Backend Features (Admin Panel)

- Admin dashboard with summary
- Site settings: logo, favicon, site name, copyright
- Theme switching option
- Page management: Add, edit, delete custom pages
- Category & subcategory management
- Post management with image upload, slug, tags
- Inbox message system:
  - View latest 3 messages in dropdown
  - Full inbox list
  - Read, delete, reply messages
  - Bulk sync or delete messages
- User profile and user list
- Toastr notifications for success/failure
- SweetAlert2 confirmation for delete actions

---

## 🧪 Technologies Used

### 🔤 Languages
- PHP
- HTML5
- CSS3
- JavaScript
- SQL (MySQL)

### 🧰 Framework & Platform
- [Laravel 10](https://laravel.com/)
- [Bootstrap 5](https://getbootstrap.com/) / Tailwind CSS 
- Laravel Blade Templating Engine

### 📦 PHP Packages
- [Intervention/Image](http://image.intervention.io/) – Image resizing and manipulation
- [Breeze ] 
- [Toastr](https://codeseven.github.io/toastr/) – Notification popup
- [SweetAlert2](https://sweetalert2.github.io/) – Confirmation dialog
- [Laravel File Storage](https://laravel.com/docs/10.x/filesystem) – For image/file upload
- Laravel Validator, Auth, Route, Migration (built-in components)

### ✨ JavaScript Libraries
- jQuery
- Toastr.js
- SweetAlert2
- Summernote



## ⚙️ Installation & Setup

```bash
# 1. Clone the repository
git clone https://github.com/Md-Naim-Howlader/Laravel_Blog_Site.git
cd Laravel_Blog_Site

# 2. Install PHP dependencies
composer install

# 3. Install Node.js dependencies
npm install

# 4. Build assets
npm run dev   # or npm run build for production

# 5. Create .env file
cp .env.example .env

# 6. Generate application key
php artisan key:generate

# 7. Configure .env (DB credentials, app name, etc.)

# 8. Run migrations 
php artisan migrate

# 9. Create symbolic link for storage
php artisan storage:link

# 10. Run the development server
php artisan serve
