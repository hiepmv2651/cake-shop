# Cake memory shop

Xây dựng website bán bánh bằng laravel

## Thành viên nhóm

-   [@hiepmv](https://github.com/hiepmv2651)
-   [@khuevotan](https://github.com/khuevotan)
-   [@khanhsoen](https://github.com/khanhsoen)

![Logo](https://t4.ftcdn.net/jpg/03/31/10/17/240_F_331101745_iJ3F7GUwZQKIeFCUCUtFZ51EWRAD0gjZ.jpg)

## Cách chạy project

Clone the project

```bash
  git clone https://github.com/hiepmv2651/cake_shop.git
```

Update composer

```bash
  composer update
```

Install npm and run dev

```bash
  npm install
  npm run dev
```

Đổi tên file .env.example thành .env

```bash
  .env
```

Tạo APP_KEY

```bash
  php artisan key:generate
```

Tạo database trong xampp giống với DB_DATABASE

```bash
  cake_shop
```

Tạo bảng

```bash
  php artisan migrate
```

Chạy server

```bash
  php artisan serve
```
