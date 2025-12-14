# PHP Virtualizor API Wrapper

[![GitHub](https://img.shields.io/badge/GitHub-Repository-blue)](https://github.com/Github-Aiko/PHP-Virtualizor)
[![CI](https://github.com/Github-Aiko/PHP-Virtualizor/actions/workflows/ci.yml/badge.svg)](https://github.com/Github-Aiko/PHP-Virtualizor/actions/workflows/ci.yml)
[![Packagist](https://img.shields.io/packagist/v/github-aiko/php-virtualizor)](https://packagist.org/packages/github-aiko/php-virtualizor)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

This is a wrapper for the API for Virtualizor.

**Project Repository:** https://github.com/Github-Aiko/PHP-Virtualizor

### Note
The Base-client is Forked from https://github.com/bennetgallein/VirtualizorPHP.
Code has been completely recoded.

Documentation for this Version of the API can be found here:
http://virtualizor.com/admin-api/#virtual-servers

## Installation

Install this library via composer is pretty easy. 
```bash
composer require github-aiko/php-virtualizor
```
And then you can get started with your project.

## Object Description:

Every call starts by Initializing the `Virtualizor` Object. Once initialized you can use it over and over again.
```php
$virt = new \Virtualizor\Virtualizor("ip", "key", "pass", "port");
```

### ServerInfo

Get some information about the master
```php
$info = $virt->serverInfo();
```

## Development

### Testing
```bash
composer install
vendor/bin/phpunit
```

### CI/CD
Project sử dụng GitHub Actions để tự động:
- Test trên nhiều phiên bản PHP (7.4, 8.0, 8.1, 8.2, 8.3, 8.4)
- Validate composer.json
- Tự động cập nhật Packagist khi có tag release

Xem thêm: [.github/workflows/README.md](.github/workflows/README.md)

### Submit lên Packagist
Để submit package lên Packagist:
1. Truy cập: https://packagist.org/packages/submit
2. Đăng nhập bằng GitHub
3. Nhập URL: `https://github.com/Github-Aiko/PHP-Virtualizor`
4. Click **Check** → **Submit**

Xem hướng dẫn chi tiết: [SETUP.md](SETUP.md)

## Contributing
Contributions are welcome! Please feel free to submit a Pull Request.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

