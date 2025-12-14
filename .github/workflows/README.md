# GitHub Actions Workflows

Repository này sử dụng GitHub Actions để tự động hóa các tác vụ CI/CD.

## Workflows

### 1. CI (`ci.yml`)
Chạy tự động khi có push hoặc pull request vào các nhánh `main`, `master`, hoặc `develop`.

**Chức năng:**
- Test trên nhiều phiên bản PHP (7.4, 8.0, 8.1, 8.2, 8.3, 8.4)
- Validate `composer.json`
- Chạy PHPUnit tests
- Kiểm tra platform requirements

### 2. Update Packagist (`packagist.yml`)
Chạy khi có release được publish hoặc chạy thủ công.

**Chức năng:**
- Validate `composer.json`
- Cập nhật package trên Packagist

**Yêu cầu:**
- Cần thiết lập secret `PACKAGIST_TOKEN` trong repository settings
- Lấy token từ: https://packagist.org/profile/

### 3. Auto Update Packagist (`auto-update-packagist.yml`)
Chạy tự động khi có tag mới được push (ví dụ: `v1.0.0`).

**Chức năng:**
- Tự động cập nhật Packagist khi có tag release mới
- Validate `composer.json` trước khi update

**Yêu cầu:**
- Cần thiết lập secret `PACKAGIST_TOKEN` trong repository settings

## Thiết lập Secrets

1. Truy cập: https://packagist.org/profile/
2. Tạo API token mới
3. Vào repository GitHub → Settings → Secrets and variables → Actions
4. Thêm secret mới:
   - Name: `PACKAGIST_TOKEN`
   - Value: (paste token từ Packagist)

## Sử dụng

### Tạo release mới:
```bash
# Tạo tag
git tag -a v1.0.0 -m "Release version 1.0.0"
git push origin v1.0.0
```

Workflow sẽ tự động chạy và cập nhật Packagist.

### Chạy workflow thủ công:
1. Vào tab "Actions" trên GitHub
2. Chọn workflow "Update Packagist"
3. Click "Run workflow"
4. Nhập tag cần update
5. Click "Run workflow"

