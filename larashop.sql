-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2022 pada 04.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larashop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Cardinal', 'Cardinal is a clothing brand in Indonesia that has been active since 2005. Until now, Cardinal\'s distribution channels have reached 200 store points spread across Indonesia.', '20220117060312.jpg', '2022-01-16 23:03:12', '2022-01-16 23:03:12'),
(2, 'Bird Fly', 'Bird Fly is a clothing brand for woman in Indonesia that has been active since 2008. Until now, Bird Fly\'s distribution channels have reached 200 store points spread across Indonesia.', '20220117060954.jpg', '2022-01-16 23:09:54', '2022-01-16 23:09:54'),
(5, 'Cocorico', 'The All-Natural Cloth Brand, is an advocate for humane clothing production and environmental stewardship.', '20220118032703.jpg', '2022-01-17 20:27:03', '2022-01-17 20:32:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Women fashion', 'The Latest collection of Woman\'s Clothes.', '2022-01-15 20:27:59', '2022-01-15 23:15:15'),
(6, 'Men clothes', 'The Latest collection of Man\'s Clothes.', '2022-01-15 23:15:43', '2022-01-15 23:15:43'),
(7, 'Bag and Suitcase', 'The collection of newest trendy bag and suitcase.', '2022-01-15 23:41:22', '2022-01-16 18:51:23'),
(8, 'Jewellery', 'The collection of many luxury jewellery.', '2022-01-16 18:34:12', '2022-01-16 18:34:12'),
(9, 'Shoe & Sandals', 'Collection of Shoe & Sandals', '2022-01-18 07:25:46', '2022-01-18 07:25:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_15_130756_create_categories_table', 2),
(7, '2022_01_17_032538_create_brands_table', 3),
(9, '2022_01_18_035614_create_products_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `regular_price` int(11) NOT NULL,
  `promo_price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `sku`, `color`, `size`, `category_id`, `brand_id`, `stock`, `regular_price`, `promo_price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Colorful Pattern Shirts HD450', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi,!', 'FWM15VKT', 'yellow', 'm', 5, 2, 5, 120, 99, '20220118130113.jpg', '2022-01-18 06:01:13', '2022-01-18 06:01:13'),
(2, 'Ethnic Floral Casual Shirts', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est cumque repellat, iure nulla iste quisquam molestiae tempora! Debitis eius officiis commodi, minima accusamus vel illum eveniet magnam quisquam itaque necessitatibus.', 'SKU77695', 'black', 's', 6, 1, 7, 100, 85, '20220118141117.jpg', '2022-01-18 07:11:17', '2022-01-18 07:11:17'),
(3, 'Flowers Sleeve Lapel Shirt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est cumque repellat, iure nulla iste quisquam molestiae tempora! Debitis eius officiis commodi, minima accusamus vel illum eveniet magnam quisquam itaque necessitatibus.', 'SKU77696', 'blue', 'l', 6, 5, 4, 90, 55, '20220118141331.jpg', '2022-01-18 07:13:31', '2022-01-18 07:13:31'),
(4, 'Mens Porcelain Shirt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est cumque repellat, iure nulla iste quisquam molestiae tempora! Debitis eius officiis commodi, minima accusamus vel illum eveniet magnam quisquam itaque necessitatibus.', 'SKU77694', 'yellow', 'xl', 6, 5, 10, 76, 65, '20220118141506.jpg', '2022-01-18 07:15:06', '2022-01-18 07:15:06'),
(5, 'Fish Print Patched T-shirt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est cumque repellat, iure nulla iste quisquam molestiae tempora! Debitis eius officiis commodi, minima accusamus vel illum eveniet magnam quisquam itaque necessitatibus.', 'SKU77692', 'white', 'l', 5, 1, 6, 200, 150, '20220118141937.jpg', '2022-01-18 07:19:37', '2022-01-18 07:19:37'),
(6, 'New Shoe Npro 3 Black', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est cumque repellat, iure nulla iste quisquam molestiae tempora! Debitis eius officiis commodi, minima accusamus vel illum eveniet magnam quisquam itaque necessitatibus.', 'SKU77691', 'black', 'm', 9, 2, 8, 55, 40, '20220118142701.jpg', '2022-01-18 07:27:01', '2022-01-18 07:27:01'),
(7, 'Mini Kelly Poccette Bag', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est cumque repellat, iure nulla iste quisquam molestiae tempora! Debitis eius officiis commodi, minima accusamus vel illum eveniet magnam quisquam itaque necessitatibus.', 'SKU77690', 'navi', 'm', 7, 2, 4, 250, 200, '20220118143016.jpg', '2022-01-18 07:30:16', '2022-01-18 07:30:16'),
(8, 'Geometric Printed Hat', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est cumque repellat, iure nulla iste quisquam molestiae tempora! Debitis eius officiis commodi, minima accusamus vel illum eveniet magnam quisquam itaque necessitatibus.', 'SKU77689', 'black', 'l', 6, 1, 14, 20, 15, '20220118143209.jpg', '2022-01-18 07:32:09', '2022-01-18 07:32:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'william', 'william@mail.com', NULL, '$2y$10$q079V4/YNh7L4DDpA8m6GefyjuScCSMwSXQhtKO.FKgVC6FdxYj/G', NULL, '2022-01-14 03:09:32', '2022-01-14 03:09:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
