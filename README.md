<div align="center">

# 🖥️ PHP Virtualizor API Wrapper

**A modern, elegant PHP wrapper for the Virtualizor API**

[![GitHub Repository](https://img.shields.io/badge/GitHub-Repository-181717?style=for-the-badge&logo=github)](https://github.com/Github-Aiko/PHP-Virtualizor)
[![Packagist Version](https://img.shields.io/packagist/v/github-aiko/php-virtualizor?style=for-the-badge&logo=packagist&logoColor=white)](https://packagist.org/packages/github-aiko/php-virtualizor)
[![PHP Version](https://img.shields.io/packagist/php-v/github-aiko/php-virtualizor?style=for-the-badge&logo=php&logoColor=white)](https://packagist.org/packages/github-aiko/php-virtualizor)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

[![CI](https://github.com/Github-Aiko/PHP-Virtualizor/actions/workflows/ci.yml/badge.svg)](https://github.com/Github-Aiko/PHP-Virtualizor/actions/workflows/ci.yml)
[![Packagist Downloads](https://img.shields.io/packagist/dt/github-aiko/php-virtualizor?color=blue)](https://packagist.org/packages/github-aiko/php-virtualizor)

</div>

---

## 📋 Table of Contents

- [✨ Features](#-features)
- [📦 Requirements](#-requirements)
- [🚀 Installation](#-installation)
- [⚡ Quick Start](#-quick-start)
- [📖 API Reference](#-api-reference)
- [🧪 Development](#-development)
- [🤝 Contributing](#-contributing)
- [📄 License](#-license)

---

## ✨ Features

| Feature | Description |
|---------|-------------|
| 🖥️ **Virtual Servers** | Create, manage, start, stop, restart VPS instances |
| 💾 **OS Templates** | List and manage operating system templates |
| 🌐 **IP Pool** | Manage IP address pools and allocations |
| 👥 **Users** | User management and authentication |
| 🔒 **Secure** | Built-in API key authentication |
| ⚡ **Modern PHP** | Supports PHP 7.4, 8.0, 8.1, 8.2, 8.3, 8.4 |

---

## 📦 Requirements

- **PHP** >= 7.4
- **ext-json** extension
- **Virtualizor** panel with API access enabled

---

## 🚀 Installation

Install via Composer:

```bash
composer require github-aiko/php-virtualizor
```

---

## ⚡ Quick Start

### Initialize the Client

```php
<?php

require 'vendor/autoload.php';

use Virtualizor\Virtualizor;

// Initialize with your Virtualizor credentials
$virtualizor = new Virtualizor(
    'your-server-ip',    // Server IP
    'your-api-key',      // API Key  
    'your-api-pass',     // API Password
    '4085',              // Admin Port (default: 4085)
    '4083'               // Client Port (default: 4083)
);
```

### Virtual Server Management

```php
// Get VirtualServer instance
$server = $virtualizor->server();

// List all virtual servers
$servers = $server->listAll();

// Get specific VPS info
$vpsInfo = $server->info($vpsId);

// Start/Stop/Restart VPS
$server->start($vpsId);
$server->stop($vpsId);
$server->restart($vpsId);
```

### OS Templates

```php
// Get OS Templates instance
$templates = $virtualizor->osTemplates();

// List all available templates
$allTemplates = $templates->listAll();
```

### IP Pool Management

```php
// Get IP Pool instance
$ipPool = $virtualizor->IPPool();

// List all IP pools
$pools = $ipPool->listAll();
```

### User Management

```php
// Get Users instance
$users = $virtualizor->Users();

// List all users
$allUsers = $users->listAll();
```

---

## 📖 API Reference

### Main Class: `Virtualizor`

| Method | Return Type | Description |
|--------|-------------|-------------|
| `server()` | `VirtualServer` | Virtual server operations |
| `osTemplates()` | `OSTemplates` | OS template operations |
| `IPPool()` | `IPPool` | IP pool operations |
| `Users()` | `Users` | User management operations |

> 📚 **Full Documentation:** [Virtualizor Admin API](http://virtualizor.com/admin-api/)

---

## 🧪 Development

### Running Tests

```bash
# Install dependencies
composer install

# Run PHPUnit tests
vendor/bin/phpunit
```

### CI/CD Pipeline

This project uses **GitHub Actions** for continuous integration:

| Check | Versions |
|-------|----------|
| 🧪 Unit Tests | PHP 7.4, 8.0, 8.1, 8.2, 8.3, 8.4 |
| ✅ Composer Validation | All versions |
| 📦 Auto Packagist Update | On release tags |

---

## 🤝 Contributing

Contributions are welcome! Here's how you can help:

1. 🍴 Fork the repository
2. 🌿 Create a feature branch (`git checkout -b feature/amazing-feature`)
3. 💾 Commit your changes (`git commit -m 'Add amazing feature'`)
4. 📤 Push to the branch (`git push origin feature/amazing-feature`)
5. 🔃 Open a Pull Request

---

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

---

<div align="center">

**Made with ❤️ by [Github-Aiko](https://github.com/Github-Aiko)**

*Based on [VirtualizorPHP](https://github.com/bennetgallein/VirtualizorPHP) - completely recoded*

</div>
