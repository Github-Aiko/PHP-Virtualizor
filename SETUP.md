# Hướng dẫn thiết lập GitHub Actions và Packagist

## 📋 Mục lục
1. [Thiết lập GitHub Actions](#thiết-lập-github-actions)
2. [Thiết lập Packagist Token](#thiết-lập-packagist-token)
3. [Publish package lên Packagist](#publish-package-lên-packagist)
4. [Tạo release mới](#tạo-release-mới)

## 🚀 Thiết lập GitHub Actions

GitHub Actions đã được cấu hình sẵn trong thư mục `.github/workflows/`. Các workflow sẽ tự động chạy khi:

- **CI Workflow**: Khi có push hoặc pull request
- **Auto Update Packagist**: Khi có tag mới được push (ví dụ: `v1.0.0`)

### ⚠️ Lưu ý quan trọng

**Workflows sẽ hoạt động ngay cả khi bạn chưa có package trên Packagist!**

- Workflow **CI** sẽ luôn chạy và test code của bạn
- Workflows **Packagist** sẽ cảnh báo nếu package chưa tồn tại nhưng **không fail**
- Bạn có thể push code và chạy CI ngay lập tức, không cần đợi submit lên Packagist

### Kiểm tra workflows

1. Push code lên GitHub
2. Vào tab **Actions** trên repository
3. Bạn sẽ thấy các workflow đã được cấu hình và chạy tự động

## 🔑 Thiết lập Packagist Token

Để tự động cập nhật Packagist khi có release mới, bạn cần thiết lập secret token:

### Bước 1: Lấy token từ Packagist

1. Truy cập: https://packagist.org/profile/
2. Đăng nhập bằng tài khoản GitHub của bạn
3. Vào phần **API Tokens**
4. Click **Generate Token**
5. Copy token được tạo (chỉ hiển thị một lần!)

### Bước 2: Thêm token vào GitHub Secrets

1. Vào repository GitHub: https://github.com/Github-Aiko/PHP-Virtualizor
2. Vào **Settings** → **Secrets and variables** → **Actions**
3. Click **New repository secret**
4. Điền thông tin:
   - **Name**: `PACKAGIST_TOKEN`
   - **Secret**: (paste token từ Packagist)
5. Click **Add secret**

✅ Xong! Workflow sẽ tự động sử dụng token này để cập nhật Packagist.

**Lưu ý**: Token này chỉ cần thiết sau khi bạn đã submit package lên Packagist. Workflows vẫn sẽ chạy bình thường nếu chưa có token, chỉ hiển thị cảnh báo.

## 📦 Publish package lên Packagist

### Bước 1: Đảm bảo code đã được push

```bash
git add .
git commit -m "Prepare for Packagist"
git push origin main
```

### Bước 2: Submit package lên Packagist

1. Truy cập: https://packagist.org/packages/submit
2. Đăng nhập bằng tài khoản GitHub
3. Nhập URL repository: `https://github.com/Github-Aiko/PHP-Virtualizor`
4. Click **Check** để validate
5. Nếu OK, click **Submit**

### Bước 3: Thiết lập Auto-Update (Khuyến nghị)

Sau khi package đã được submit, thiết lập auto-update:

1. Vào: https://packagist.org/profile/
2. Tìm package `github-aiko/php-virtualizor`
3. Click **Settings**
4. Enable **Auto-Update** nếu chưa bật

Hoặc sử dụng GitHub Webhook:

1. Vào repository GitHub → **Settings** → **Webhooks**
2. Click **Add webhook**
3. Điền thông tin:
   - **Payload URL**: `https://packagist.org/api/github?username=Github-Aiko`
   - **Content type**: `application/json`
   - **Secret**: (paste Packagist API token)
   - **Events**: Chọn **Just the push event**
4. Click **Add webhook**

## 🏷️ Tạo release mới

Khi bạn muốn tạo một release mới:

### Cách 1: Sử dụng Git tags (Khuyến nghị)

```bash
# Tạo tag
git tag -a v1.0.0 -m "Release version 1.0.0"

# Push tag
git push origin v1.0.0
```

GitHub Actions sẽ tự động:
- Chạy tests
- Cập nhật Packagist

### Cách 2: Tạo GitHub Release

1. Vào repository → **Releases** → **Create a new release**
2. Chọn tag mới hoặc tạo tag mới
3. Điền thông tin release
4. Click **Publish release**

Workflow `packagist.yml` sẽ tự động chạy và cập nhật Packagist.

### Cách 3: Chạy workflow thủ công

1. Vào tab **Actions**
2. Chọn workflow **Update Packagist**
3. Click **Run workflow**
4. Chọn branch và nhập tag (nếu cần)
5. Click **Run workflow**

## ✅ Kiểm tra

Sau khi hoàn thành, package sẽ có sẵn tại:

- **Packagist**: https://packagist.org/packages/github-aiko/php-virtualizor
- **GitHub**: https://github.com/Github-Aiko/PHP-Virtualizor

Người dùng có thể cài đặt bằng:

```bash
composer require github-aiko/php-virtualizor
```

## 🐛 Xử lý lỗi

### Workflow không chạy
- Kiểm tra xem file workflow có trong `.github/workflows/` không
- Đảm bảo syntax YAML đúng
- Kiểm tra tab **Actions** trên GitHub

### Packagist không được cập nhật
- Kiểm tra secret `PACKAGIST_TOKEN` đã được thiết lập chưa
- Kiểm tra token có hợp lệ không
- Xem logs trong GitHub Actions để biết lỗi cụ thể

### Tests fail
- Kiểm tra PHP version trong workflow có khớp với requirements không
- Xem logs chi tiết trong GitHub Actions

## 📚 Tài liệu tham khảo

- [GitHub Actions Documentation](https://docs.github.com/en/actions)
- [Packagist Documentation](https://packagist.org/about)
- [Composer Documentation](https://getcomposer.org/doc/)

