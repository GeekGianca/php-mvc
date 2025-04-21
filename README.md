# PHP MVC Base 🚀

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-blue)](https://www.php.net/releases/8.2/)
[![Framework](https://img.shields.io/badge/Pattern-MVC-informational)](#)

A lightweight and extensible PHP MVC framework built from scratch. Ideal for learning the MVC pattern or bootstrapping small to medium-sized PHP web apps.

---

## 📁 Folder Structure

```
php-mvc/
├── config/            # Global configuration
├── controllers/       # Controllers (logic for each route)
├── libs/              # Core MVC classes (App, Controller, View, etc.)
├── models/            # Data layer: classes that interact with the DB
├── public/            # Public assets (CSS, JS, images, etc.)
├── remoto/            # Optional AJAX or API logic
├── views/             # HTML templates and dynamic content
├── index.php          # Application entry point
├── .htaccess          # Rewrite rules for clean URLs
└── README.md
```

---

## ⚙️ Local Setup

### ✅ Requirements

- PHP ≥ 8.2
- Apache (XAMPP / MAMP / WAMP / Bitnami)
- MySQL or MariaDB (if using DB)
- Optional: Composer (for future extensions)

### 🚀 Steps to Run Locally

1. **Clone the project**

```bash
git clone https://github.com/GeekGianca/php-mvc.git
cd php-mvc
```

2. **Set up your virtual host (optional)**  
   Or just drop it in `htdocs/` if using XAMPP.

3. **Configure `.htaccess`**  
   Make sure the file exists in root and Apache's `mod_rewrite` is enabled:

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
```

4. **Set your DB credentials**  
   Edit `config/config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_db');
define('DB_USER', 'root');
define('DB_PASS', '');
```

5. **Launch it!**  
   Go to: `http://localhost/php-mvc/` or your virtual host.

---

## 📦 Folder Details

| Path            | Purpose                                                                 |
|------------------|-------------------------------------------------------------------------|
| `config/`        | DB credentials, constants, global config                                |
| `controllers/`   | Route controllers, e.g. `main.php`, `registro.php`                      |
| `models/`        | DB-related logic per module                                             |
| `views/`         | Views organized in folders per feature                                  |
| `libs/`          | Core logic: `App.php`, `Controller.php`, `View.php`, `Model.php`        |
| `public/`        | Images, CSS, JS                                                         |
| `remoto/`        | For AJAX, JSON API responses, background scripts                        |
| `.htaccess`      | Clean URL routing                                                       |
| `index.php`      | App bootstrap and routing                                               |

---

## 💡 Future Improvements

- ✅ Modular loading of controllers/views
- ❌ No Composer autoloading yet
- 🔒 No CSRF/session protection (recommended to add)
- 🚦 No built-in routing system (can be added manually)
- 🧪 No tests included yet

---

## 📜 License

This project is licensed under the [MIT License](LICENSE).

---

## 👤 Author

Developed with ❤️ by **Giancarlos**  
Feel free to fork, star, or contribute!

---

## ❓ Need Help?

Open an [issue](https://github.com/GeekGianca/php-mvc/issues) or reach out on GitHub!
