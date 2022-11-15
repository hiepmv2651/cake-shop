-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2022 lúc 08:54 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cake_memory`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `price`, `quantity`, `Product_id`, `user_id`, `image`, `created_at`, `updated_at`) VALUES
(1, '3800000', '10', '1', '4', 'logos/MousseChocolate.jpg', '2022-11-01 02:38:51', '2022-11-01 02:38:51'),
(2, '4200000', '12', '2', '3', 'logos/BlueOcean.jpg', '2022-11-03 02:38:43', '2022-11-03 02:38:43'),
(3, '3800000', '10', '4', '6', 'logos/MousseHawaii.jpg', '2022-11-12 02:38:35', '2022-11-12 02:38:35'),
(4, '594000', '18', '7', '8', 'logos/MiPaTe.jpg', '2022-11-11 02:38:26', '2022-11-11 02:38:26'),
(5, '195000', '5', '25', '9', 'logos/QuyHanhNhan.jpg', '2022-11-04 02:38:17', '2022-11-04 02:38:17'),
(6, '140000', '10', '14', '8', 'logos/PizzaPhoMai.jpg', '2022-11-05 02:38:08', '2022-11-05 02:38:08'),
(7, '800000', '10', '21', '2', 'logos/PizzaHaiSanXotCaChua.jpg', '2022-11-02 02:38:01', '2022-11-02 02:38:01'),
(8, '330000', '10', '8', '5', 'logos/MiThapCam.jpg', '2022-11-03 02:37:51', '2022-11-03 02:37:51'),
(9, '330000', '10', '10', '10', 'logos/SandwichCaNgu.jpg', '2022-11-05 02:37:42', '2022-11-05 02:37:42'),
(10, '300000', '15', '11', '8', 'logos/Chiffon3Vi.jpg', '2022-11-05 02:37:31', '2022-11-05 02:37:31'),
(11, '350000', '10', '16', '8', 'logos/Opera90G.jpg', '2022-11-06 02:37:22', '2022-11-06 02:37:22'),
(12, '500000', '10', '17', '8', 'logos/Tiramisu90G.jpg', '2022-11-09 02:37:14', '2022-11-09 02:37:14'),
(13, '125000', '5', '18', '3', 'logos/MousseChanhLeo.jpg', '2022-11-11 02:37:05', '2022-11-11 02:37:05'),
(14, '650000', '5', '24', '6', 'logos/PizzaRauCuThapCam.jpg', '2022-11-11 02:36:55', '2022-11-11 02:36:55'),
(15, '650000', '10', '23', '7', 'logos/PizzaHaiSanXotCaChua.jpg', '2022-11-09 02:36:47', '2022-11-09 02:36:47'),
(16, '250000', '10', '19', '10', 'logos/MousseTraXanh.jpg', '2022-11-01 02:36:37', '2022-11-01 02:36:37'),
(17, '100000', '2', '17', '3', 'logos/Tiramisu90G.jpg', '2022-11-01 02:36:26', '2022-11-01 02:36:26'),
(20, '380000', '1', '1', '11', 'logos/\r\nMousseChocolate.jpg', '2022-11-12 19:58:14', '2022-11-12 19:58:14'),
(22, '380000', '1', '4', '1', 'logos/MousseHawaii.jpg', '2022-11-14 20:32:52', '2022-11-14 20:32:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Bánh kem', NULL, NULL),
(2, 'Bánh mì', NULL, NULL),
(3, 'Bánh ngọt', NULL, NULL),
(4, 'Bánh tráng miệng', NULL, NULL),
(5, 'Bánh theo mùa', NULL, NULL),
(6, 'Bánh khô', NULL, NULL),
(7, 'Pizza', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_h_d_s`
--

CREATE TABLE `chi_tiet_h_d_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoadon_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_h_d_s`
--

INSERT INTO `chi_tiet_h_d_s` (`id`, `price`, `quantity`, `hoadon_id`, `Product_id`, `created_at`, `updated_at`) VALUES
(1, '250000', '10', '1', '20', '2022-11-10 02:36:06', '2022-11-10 02:36:06'),
(2, '3800000', '10', '2', '1', '2022-11-05 02:35:58', '2022-11-05 02:35:58'),
(3, '3800000', '10', '3', '4', '2022-11-05 02:35:50', '2022-11-05 02:35:50'),
(4, '125000', '5', '4', '18', '2022-11-12 02:35:41', '2022-11-12 02:35:41'),
(5, '250000', '10', '5', '19', '2022-11-12 02:35:32', '2022-11-12 02:35:32'),
(6, '100000', '2', '6', '17', '2022-11-14 02:35:23', '2022-11-14 02:35:23'),
(7, '4200000', '12', '8', '2', '2022-11-12 02:35:12', '2022-11-12 02:35:12'),
(8, '330000', '10', '9', '7', '2022-11-09 02:35:03', '2022-11-09 02:35:03'),
(9, '300000', '15', '7', '11', '2022-11-09 02:34:54', '2022-11-09 02:34:54'),
(10, '330000', '10', '10', '8', '2022-11-10 02:34:44', '2022-11-10 02:34:44'),
(11, '250000', '10', '11', '19', '2022-11-13 02:34:36', '2022-11-13 02:34:36'),
(12, '165000', '5', '12', '8', '2022-11-13 02:34:26', '2022-11-13 02:34:26'),
(13, '760000', '2', '13', '4', '2022-11-12 19:57:40', '2022-11-12 19:57:40'),
(14, '380000', '1', '14', '1', '2022-11-14 20:20:20', '2022-11-14 20:20:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_10_08_025959_create_sessions_table', 1),
(7, '2022_10_09_034829_create_categories_table', 1),
(8, '2022_10_09_074313_create_products_table', 1),
(9, '2022_10_10_121628_create_carts_table', 1),
(10, '2022_10_11_063858_create_orders_table', 1),
(11, '2022_10_13_024048_create_notifications_table', 1),
(12, '2022_10_24_025724_create_chi_tiet_h_d_s_table', 1),
(13, '2022_10_24_030405_create_trang_thais_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngaydat` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tongtien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `ngaydat`, `phone`, `address`, `description`, `user_id`, `trangthai_id`, `tongtien`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '2022-11-10', '01929291991', '02 Võ Nguyễn Giáp', NULL, '4', '3', '990000', 'đã thanh toán', '2022-11-12 02:34:04', '2022-11-12 02:34:04'),
(2, '2022-11-10', '0128288112', '03 Lê Thành Phương', NULL, '4', '1', '3800000', 'chưa thanh toán', '2022-11-12 02:33:56', '2022-11-12 02:33:56'),
(3, '2022-11-10', '091919933', '09 Lê Đại Hành', NULL, '6', '4', '3800000', 'đã thanh toán', '2022-11-12 02:33:44', '2022-11-12 02:33:44'),
(4, '2022-11-11', '02919191922', '199 Nguyễn Thành Phương', NULL, '7', '1', '125000', 'chưa thanh toán', '2022-11-13 02:33:33', '2022-11-13 02:33:33'),
(5, '2022-11-10', '029101919', '280 Nguyễn Bạch', NULL, '7', '1', '250000', 'chưa thanh toán', '2022-11-13 02:33:24', '2022-11-13 02:33:24'),
(6, '2022-11-09', '019191991', '28 Phạm Văn Đồng', NULL, '2', '2', '100000', 'đã thanh toán', '2022-11-10 02:33:13', '2022-11-10 02:33:13'),
(7, '2022-11-11', '0291991919', '200 Phạm Văn Đồng', NULL, '8', '4', '300000', 'đã thanh toán', '2022-11-12 02:33:02', '2022-11-12 02:33:02'),
(8, '2022-11-10', '0191919192', '28 Mạc Đỉnh Chi', NULL, '6', '1', '4200000', 'chưa thanh toán', '2022-11-12 02:32:53', '2022-11-12 02:32:53'),
(9, '2022-11-10', '0191919223', '80 Trần Phú', NULL, '3', '1', '990000', 'chưa thanh toán', '2022-10-13 02:25:14', '2022-10-13 02:32:34'),
(10, '2022-11-10', '0191929923', '29 Phạm Văn Đồng', NULL, '9', '1', '330000', 'chưa thanh toán', '2022-10-11 02:26:35', '2022-10-11 02:32:19'),
(11, '2022-11-11', '039929112', '80 Phạm Văn Đồng', NULL, '3', '5', '250000', 'chưa thanh toán', '2022-11-10 02:32:05', '2022-11-10 02:32:05'),
(12, '2022-11-02', '0192828181', '28 Phạm Văn Đồng', NULL, '10', '2', '495000', 'đã thanh toán', '2022-11-11 02:31:48', '2022-11-11 02:31:48'),
(13, '2022-11-13', '123', '123', '', '11', '5', '760000', 'Chưa thanh toán', '2022-11-12 19:57:40', '2022-11-12 19:57:40'),
(14, '2022-11-15', '123', '123', '', '1', '5', '380000', 'Chưa thanh toán', '2022-11-14 20:20:20', '2022-11-14 20:20:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `category`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Mousse Chocolate', '', 'logos/\r\nMousseChocolate.jpg', 'Bánh kem', '380000', '2022-10-13 02:25:14', '2022-11-08 02:25:14'),
(2, 'Bánh Kem Blue Ocean', NULL, 'logos/BlueOcean.jpg', 'Bánh Kem', '350000', '2022-10-12 02:25:52', '2022-11-17 02:25:52'),
(3, 'Bánh Kem Romantic', NULL, 'logos/Romantic.jpg', 'Bánh Kem', '350000', '2022-10-12 02:26:10', '2022-12-10 02:26:10'),
(4, 'Bánh Kem Mousse Hawaii', NULL, 'logos/MousseHawaii.jpg', 'Bánh Kem', '380000', '2022-10-11 02:26:35', '2022-11-09 02:26:35'),
(5, 'Bánh Kem Chocolate Fruit', NULL, 'logos/ChocolateFruit.jpg', 'Bánh Kem', '300000', '2022-10-06 02:27:08', '2022-11-12 02:27:08'),
(6, 'Bánh Mì Kẹp Gà Teriyaki', NULL, 'logos/Teriyaki.jpg', 'Bánh mì', '33000', '2022-10-14 02:27:24', '2022-11-12 02:27:24'),
(7, 'Bánh Mì Kẹp Pa Tê', NULL, 'logos/MiPaTe.jpg', 'Bánh mì', '33000', '2022-10-19 02:27:36', '2022-11-12 02:27:24'),
(8, 'Bánh Mì Kẹp Thập Cẩm', '', 'logos/MiThapCam.jpg', 'Bánh mì', '33000', '2022-10-26 02:27:46', '2022-11-09 02:26:35'),
(9, 'Bánh Mì Kẹp Xá Xíu', NULL, 'logos/MiXaXiu.jpg', 'Bánh mì', '33000', '2022-10-31 02:28:05', '2022-11-12 02:27:08'),
(10, 'Bánh Sandwich Cá Ngừ Phô Mai', NULL, 'logos/SandwichCaNgu.jpg', 'Bánh mì', '33000', '2022-10-24 02:28:16', '2022-11-08 02:25:14'),
(11, 'Bánh Chiffon 3 Vị', NULL, 'logos/Chiffon3Vi.jpg', 'Bánh ngọt', '20000', '2022-10-14 02:27:24', '2022-11-10 02:26:10'),
(12, 'Bánh Chiffon Trà Xanh ', NULL, 'logos/ChiffonTraXanh.jpg', 'Bánh ngọt', '35000', '2022-10-11 02:26:35', '2022-11-17 02:25:52'),
(13, 'Bánh Chiffon Vani', NULL, 'logos/ChiffonVani.jpg', 'Bánh ngọt', '30000', '2022-10-14 02:27:24', '2022-11-12 02:27:08'),
(14, 'Bánh Cuộn Nho Miếng ', NULL, 'logos/BanhCuonNhoMieng.jpg', 'Bánh ngọt', '20000', '2022-10-06 02:27:08', '2022-11-12 02:27:24'),
(15, 'Bánh Cuộn Socola Miếng', NULL, 'logos/BanhCuonSocola.jpg', 'Bánh ngọt', '30000', '2022-10-12 02:26:10', '2022-11-09 02:26:35'),
(16, 'Bánh Opera 90G', NULL, 'logos/Opera90G.jpg', 'Bánh tráng miệng', '35000', '2022-11-13 22:29:18', '2022-11-11 22:40:24'),
(17, 'Bánh Tiramisu 90G', NULL, 'logos/Tiramisu90G.jpg', 'Bánh tráng miệng', '50000', '2022-10-22 02:29:49', '2022-11-13 02:29:49'),
(18, 'Mousse Chanh Leo', NULL, 'logos/MousseChanhLeo.jpg', 'Bánh tráng miệng', '25000', '2022-10-06 02:27:08', '2022-11-10 02:26:10'),
(19, 'Mousse Trà Xanh', NULL, 'logos/MousseTraXanh.jpg', 'Bánh tráng miệng', '25000', '2022-11-13 02:30:32', '2022-11-17 02:25:52'),
(20, 'Mousse Xoài ', NULL, 'logos/MousseXoai.jpg', 'Bánh tráng miệng', '25000', '2022-10-11 02:26:35', '2022-11-08 02:25:14'),
(21, 'Bánh Quy Hạt Dẻ Cười', NULL, 'logos/BanhQuyHatDeCuoi.jpg', 'Bánh theo mùa', '80000', '2022-10-13 02:25:14', '2022-11-12 02:27:08'),
(22, 'Bánh Quy Hạt Mắc Ca ', NULL, 'logos/BanhQuyHatMacCa.jpg', 'Bánh theo mua', '80000', '2022-10-11 02:26:35', '2022-11-17 02:25:52'),
(23, 'Bánh Nướng Nhân Đậu Xanh Trứng', NULL, 'logos/BanhNuongDauXanh.jpg', 'Bánh theo mùa', '65000', '2022-10-06 02:27:08', '2022-11-12 02:27:24'),
(24, 'Bánh Dẻo Nhân Hạt Sen Trứng', NULL, 'logos/BanhDeoHatSen.jpg', 'Bánh theo mùa', '65000', '2022-10-06 02:27:08', '2022-11-12 02:27:08'),
(25, 'Bánh Lady Finger ', NULL, 'logos/LadyFinger.jpg', 'Bánh khô', '39000', '2022-10-14 02:27:24', '2022-11-08 02:25:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GY2k5KZ2msmgViBFwGz1Gk2KmZoprYIVLqqb2aTL', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRzYzcEpUWWxZdXJONjhWVGhtT3lmaFp5cDRrVzZyZlNaYmpGSGJ0ZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTE7fQ==', 1668484448);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thais`
--

CREATE TABLE `trang_thais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thais`
--

INSERT INTO `trang_thais` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chưa duyệt', NULL, NULL),
(2, 'Đã duyệt', NULL, NULL),
(3, 'Chưa giao', NULL, NULL),
(4, 'Đã giao', NULL, NULL),
(5, 'Huỷ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `gender`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'khanh', 'tranvankhanh3264@gmail.com', 1, '19292921', 'Nha Trang', '1', '2022-11-01 14:17:14', '$2y$10$egF3es6z4Q1e80AdBAPvPulJO9aRhJLpUSLje4bH3KAf6UWY4vFyO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-11 11:29:40', '2022-11-11 11:29:40'),
(2, 'huy', 'huynguyen@gmail.com', 2, '03991129221', 'Nha Trang', '1', '2022-11-03 18:34:37', '$2y$10$uZUmK5u6Qz.zvlWuNPWEnObvKIkWUPnJPMu.caZLaduM4ToqB4dqK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-11 11:34:26', '2022-11-11 11:34:26'),
(3, 'Lan', 'lannguyen22@gmail.com', 2, '019282811', 'Nha Trang', '1', '2022-11-10 18:38:39', '$2y$10$Em6yvUNL73sEu1eZ1jAu8u7IG24LMBh3a9cpc4W/6W9tSzxbTvT4u', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-11 11:38:30', '2022-11-11 11:38:30'),
(4, 'Vũ', 'nguyenvu3@gmail.com', 0, '0182837171', 'Phú Yên', '1', '2022-11-10 18:40:55', '$2y$10$e9sk9VJ00UElWeneqgD97.iTxuR.7H5nFqC/ARYBodn7lQrSIOBVu', NULL, NULL, NULL, NULL, NULL, 'profile-photos/3k1kD24JfZZ3hish2EvLLHaJ1Xjl7sSkqFPJKo0Q.jpg', '2022-11-11 11:40:41', '2022-11-11 11:42:52'),
(5, 'Hoàng', 'hoangquananh@gmail.com', 0, '0299123511', 'Nha Trang', '1', '2022-11-10 18:44:09', '$2y$10$gzOs.MDCTP4nUnMlpPJ2b.acGAr0A6vxQsj5fqU0wyy533aWGjkVW', NULL, NULL, NULL, NULL, NULL, 'profile-photos/xI8ztu5Doy37ucuquuXzRWGXv0HmNMS8hSRz5YKd.jpg', '2022-11-11 11:44:00', '2022-11-11 11:44:30'),
(6, 'Thọ', 'thotv2@gmail.com', 0, '02818183111', 'Nha Trang', '1', '2022-11-10 18:45:26', '$2y$10$jpsKRdfdFp3bgB4yhj1DAOw9YKakzHAwc/5IUmqncpTxy5PLJ2fu6', NULL, NULL, NULL, NULL, NULL, 'profile-photos/jTT5JXF2w6p1iyQVDz3eDfhEHMcMmBxnoS64djMo.jpg', '2022-11-11 11:45:13', '2022-11-11 11:45:44'),
(7, 'Tuệ Nguyễn', 'nguyenvantue@gmail.com', 0, '01929281112', 'Nha Trang', '1', '2022-11-10 18:46:36', '$2y$10$Sv8.LmZeNg3dU5bs.6iniuEUC4Cz9L1XQHWusrNReigGFvz47MW9O', NULL, NULL, NULL, NULL, NULL, 'profile-photos/jKxD9uGLHN33fedffRI24iW7A1AefeuHg3uz1oK5.jpg', '2022-11-11 11:46:28', '2022-11-11 11:46:54'),
(8, 'Khoa Trần', 'khoatv@gmail.com', 0, '0128281919', 'Nha Trang', '1', '2022-11-10 18:47:39', '$2y$10$.znZ7UXGDUQlxgRoOlbZL.3jss6.xbVwhIYLUfd/1Qg01.r.4ALma', NULL, NULL, NULL, NULL, NULL, 'profile-photos/2rJ1kWLyGnLsQEbqRaclKDcWGNzDgdClgI0UhGMW.jpg', '2022-11-11 11:47:35', '2022-11-11 11:47:58'),
(9, 'Khang Nguyễn', 'nguyenhuukhang2@gmail.com', 0, '012819192', 'Nha Trang', '1', '2022-11-10 18:48:50', '$2y$10$cUPVZOw9W7fSaVUNhz0TMetF6xsAGKZqvTZxq9IaU3M3zQ9.3L7iu', NULL, NULL, NULL, NULL, NULL, 'profile-photos/N7Obz8WtYIUbsh8XYaAhvXtJwCMYsnGDd8TmuI8j.jpg', '2022-11-11 11:48:40', '2022-11-11 11:49:08'),
(10, 'Huyền Nhi', 'huyennhig@gmail.com', 0, '012819192', 'Nha Trang', '2', '2022-11-10 18:49:54', '$2y$10$ehdAMvEJ4UCYv7x3jPKGxeZUrvapueqxTYXRaN0JmWkmf1qdkiDO2', NULL, NULL, NULL, NULL, NULL, 'profile-photos/5LYSGcvHZc7zkHqfcazveazcjxQGbvgtSUfcyLuK.jpg', '2022-11-11 11:49:49', '2022-11-11 11:50:13'),
(11, 'nguyen a', 'anguyen123@gmail.com', 0, '123', '123', '1', '2022-11-06 02:31:25', '$2y$10$/yBLA/ejzJLbhzI5MsWbv.7Ze8ZUkGanhLx1sUd/LJvYKDHXDAbJO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-12 19:31:16', '2022-11-12 19:31:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Chỉ mục cho bảng `chi_tiet_h_d_s`
--
ALTER TABLE `chi_tiet_h_d_s`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_title_unique` (`title`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `trang_thais`
--
ALTER TABLE `trang_thais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trang_thais_name_unique` (`name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_h_d_s`
--
ALTER TABLE `chi_tiet_h_d_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `trang_thais`
--
ALTER TABLE `trang_thais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
