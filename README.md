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

Chỉnh sửa file .env

```bash
  APP_URL=http://127.0.0.1:8000
  
  MAIL_MAILER=smtp
  MAIL_HOST=smtp.gmail.com
  MAIL_PORT=...(thay bằng cổng muốn sử dụng)
  MAIL_USERNAME=...(thay bằng gmail đang sử dụng)
  MAIL_PASSWORD=...(thay bằng mật khẩu ứng dụng gmail)
  MAIL_ENCRYPTION=...(thay bằng giao thức gmail muốn sử dụng)
  MAIL_FROM_ADDRESS="hello@example.com"
  MAIL_FROM_NAME=...(thay bằng tên gmail muốn hiển thị)
```

Tạo APP_KEY

```bash
  php artisan key:generate
```

Tạo liên kết và copy 2 folder trong thư mục images vào public\storage

```bash
  php artisan storage:link
```

Vào PHP Myadmin tạo cơ sở dữ liệu có tên là cake_memory, sau đó nhập file sql trong thư mục sql vào

```bash
  cake_memory
```

Chạy server

```bash
  php artisan serve
```
