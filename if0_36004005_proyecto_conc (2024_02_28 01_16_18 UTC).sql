-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql101.byetcluster.com
-- Tiempo de generación: 27-02-2024 a las 19:29:43
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_36004005_proyecto_conc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fiat', '0000-00-00 00:00:00', '2023-12-29 17:31:25'),
(2, 'Chevrolet', '0000-00-00 00:00:00', '2023-12-06 22:51:50'),
(3, 'Nissan', '2023-12-05 22:58:21', '2023-12-05 22:58:21'),
(4, 'Renault', '2023-12-05 23:00:15', '2023-12-05 23:00:15'),
(5, 'Audi', '2023-12-05 23:01:42', '2023-12-06 22:00:59'),
(16, 'Porche', '2023-12-29 17:17:50', '2023-12-29 17:17:50'),
(17, 'Toyota', '2023-12-29 17:19:27', '2023-12-29 17:19:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `engine_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cars`
--

INSERT INTO `cars` (`id`, `brand_id`, `engine_id`, `model`, `year`, `color`, `description`, `stock`, `price`, `status`, `created_at`, `updated_at`) VALUES
(77, 4, 13, 'AS', 2020, 'Amarillo', 'Perfecto', 7, '6500', 'Deshabilitado', '2023-12-25 18:14:02', '2023-12-29 17:11:59'),
(78, 16, 13, '911', 2016, 'Gris', '59.000 Km', 0, '15000', 'Habilitado', '2023-12-29 17:18:18', '2024-02-21 00:56:29'),
(79, 4, 13, 'Sandero', 2020, 'Azul Metal', 'Sin detalles esteticos', 1, '10000', 'Habilitado', '2023-12-29 17:19:10', '2023-12-29 17:19:10'),
(80, 17, 13, 'Yaris', 2012, 'Rojo', '165.000 km', 1, '8000', 'Habilitado', '2023-12-29 17:20:02', '2023-12-29 17:20:02'),
(81, 2, 14, 'Onix', 2023, 'Blanco', '0 km', 2, '20000', 'Habilitado', '2023-12-29 17:27:51', '2023-12-29 17:27:51'),
(82, 1, 14, 'Chronos', 2022, 'Negro', '2000 km', 1, '16000', 'Habilitado', '2023-12-29 17:32:17', '2023-12-29 17:32:17'),
(83, 2, 14, 'Corsa', 2000, 'Gris', '225.000 km, Detalles de pintura y mecanica', 0, '3000', 'Habilitado', '2023-12-29 17:32:53', '2023-12-29 17:52:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postalCode` varchar(30) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `dni`, `email`, `phone`, `address`, `postalCode`, `city`, `province`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Jose', 'Alfonso', '36789123', 'pedro@hotmail.com', '2284953145', 'Av Avellaneda 3516', '7400', 'Olavarria', 'Buenos Aires', 'Habilitado', '2023-12-03 22:53:17', '2023-12-25 19:01:48'),
(5, 'Martin', 'Perez', '21321954', 'Alejandro@hotmail.com', '15648965', 'Sarmiento 6599', '7300', 'Azul', 'Buenos Aires', 'Habilitado', '2023-12-04 22:37:23', '2023-12-25 19:01:43'),
(6, 'Juan', 'Gimenez', '2345912', 'juanGuimenez@hotmail.com', '2284659315', 'Avenida Pringles 986', '7400', 'Azul', 'Buenos Aires', 'Habilitado', '2023-12-13 18:03:02', '2023-12-25 19:01:35'),
(12, 'Fermin', 'Hasker', '32961756', 'Fermin54@gmail.com', '2284653175', 'Pringles 5213', '7400', 'Olavarria', 'Buenos Aires', 'Habilitado', '2023-12-25 19:01:18', '2024-02-20 01:53:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `engines`
--

CREATE TABLE `engines` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `engines`
--

INSERT INTO `engines` (`id`, `description`, `created_at`, `updated_at`) VALUES
(13, 'Nafta', '2023-12-19 19:08:04', '2023-12-19 19:08:04'),
(14, 'Diesel', '2023-12-19 19:08:09', '2023-12-19 19:08:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(177, 'App\\Models\\Car', 78, 'c31fa95b-174d-42c4-9b16-cbb7ccb72b03', 'cars', 'Porche911_1', 'Porche911_1.jpg', 'image/jpeg', 'public', 'public', 275961, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2023-12-29 20:18:19', '2023-12-29 20:18:20'),
(178, 'App\\Models\\Car', 78, 'd3dd812a-cf45-46f2-a652-d922a75d5381', 'cars', 'Porche911_2', 'Porche911_2.jpg', 'image/jpeg', 'public', 'public', 228701, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-12-29 20:18:20', '2023-12-29 20:18:21'),
(179, 'App\\Models\\Car', 78, '03e13ab0-fb79-40a8-89a6-881e5520e64c', 'cars', 'Porche911_3', 'Porche911_3.jpg', 'image/jpeg', 'public', 'public', 158079, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-12-29 20:18:21', '2023-12-29 20:18:22'),
(180, 'App\\Models\\Car', 78, '0654d147-78ac-4971-b262-44e38f8ac5ba', 'cars', 'Porche911_4', 'Porche911_4.jpg', 'image/jpeg', 'public', 'public', 300594, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2023-12-29 20:18:22', '2023-12-29 20:18:23'),
(181, 'App\\Models\\Car', 78, '5fca0b18-72b3-4ff9-bde4-b209e1a3a908', 'cars', 'Porche911_5', 'Porche911_5.jpg', 'image/jpeg', 'public', 'public', 278062, '[]', '[]', '{\"thumb\": true}', '[]', 5, '2023-12-29 20:18:23', '2023-12-29 20:18:24'),
(182, 'App\\Models\\Car', 79, '55298564-bfca-4a34-b1a4-c58ad26e493e', 'cars', 'Renault_Sandero1', 'Renault_Sandero1.jpg', 'image/jpeg', 'public', 'public', 415832, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2023-12-29 20:19:10', '2023-12-29 20:19:11'),
(183, 'App\\Models\\Car', 79, '10cce5b9-fcf5-4e62-b788-86a21c8b449b', 'cars', 'Renault_Sandero2', 'Renault_Sandero2.jpg', 'image/jpeg', 'public', 'public', 221962, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-12-29 20:19:11', '2023-12-29 20:19:11'),
(184, 'App\\Models\\Car', 79, '2add3083-0b69-45a5-877e-9ce07e994fb1', 'cars', 'Renault_Sandero3', 'Renault_Sandero3.jpg', 'image/jpeg', 'public', 'public', 289751, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-12-29 20:19:11', '2023-12-29 20:19:12'),
(185, 'App\\Models\\Car', 79, '289ccb49-54bd-4b02-8693-949100b07155', 'cars', 'Renault_Sandero4', 'Renault_Sandero4.jpg', 'image/jpeg', 'public', 'public', 357443, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2023-12-29 20:19:12', '2023-12-29 20:19:13'),
(186, 'App\\Models\\Car', 79, 'ee816d2c-da9e-410e-b124-55b9b0269a49', 'cars', 'Renault_Sandero5', 'Renault_Sandero5.jpg', 'image/jpeg', 'public', 'public', 446855, '[]', '[]', '{\"thumb\": true}', '[]', 5, '2023-12-29 20:19:13', '2023-12-29 20:19:14'),
(187, 'App\\Models\\Car', 79, '28c0f763-c9d2-4c64-959a-67fe0b9a20df', 'cars', 'Renault_Sandero6', 'Renault_Sandero6.jpg', 'image/jpeg', 'public', 'public', 274249, '[]', '[]', '{\"thumb\": true}', '[]', 6, '2023-12-29 20:19:14', '2023-12-29 20:19:15'),
(188, 'App\\Models\\Car', 80, 'c0e0751e-ac85-4501-8add-71db33817eeb', 'cars', 'Toyota_Yaris_1', 'Toyota_Yaris_1.jpg', 'image/jpeg', 'public', 'public', 488708, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2023-12-29 20:20:02', '2023-12-29 20:20:02'),
(189, 'App\\Models\\Car', 80, '6cea93e2-7770-4b66-9a4d-59a7a2042137', 'cars', 'Toyota_Yaris_2', 'Toyota_Yaris_2.jpg', 'image/jpeg', 'public', 'public', 443859, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-12-29 20:20:02', '2023-12-29 20:20:03'),
(190, 'App\\Models\\Car', 80, 'd385b4d2-83d6-4bfc-89f2-71b2b9fa6935', 'cars', 'Toyota_Yaris_3', 'Toyota_Yaris_3.jpg', 'image/jpeg', 'public', 'public', 246764, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-12-29 20:20:03', '2023-12-29 20:20:04'),
(191, 'App\\Models\\Car', 81, '04d7e8e6-b4f1-4c49-a32a-1b5c0245727d', 'cars', 'Chevrolet_Onix_1', 'Chevrolet_Onix_1.jpg', 'image/jpeg', 'public', 'public', 336431, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2023-12-29 20:27:51', '2023-12-29 20:27:52'),
(192, 'App\\Models\\Car', 81, '6f542f0c-30ca-4e50-8e73-c93951756108', 'cars', 'Chevrolet_Onix_2', 'Chevrolet_Onix_2.jpg', 'image/jpeg', 'public', 'public', 340279, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-12-29 20:27:52', '2023-12-29 20:27:52'),
(193, 'App\\Models\\Car', 81, 'a70a15f5-2679-4583-8ec2-bbd85de1a177', 'cars', 'Chevrolet_Onix_3', 'Chevrolet_Onix_3.jpg', 'image/jpeg', 'public', 'public', 332585, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-12-29 20:27:52', '2023-12-29 20:27:53'),
(194, 'App\\Models\\Car', 81, '00f9ef11-3b0a-4833-aaf1-21dbc06d3a4d', 'cars', 'Chevrolet_Onix_4', 'Chevrolet_Onix_4.jpg', 'image/jpeg', 'public', 'public', 332199, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2023-12-29 20:27:53', '2023-12-29 20:27:54'),
(195, 'App\\Models\\Car', 81, '627ee8ee-bd63-42e7-819a-d909784da9c7', 'cars', 'Chevrolet_Onix_5', 'Chevrolet_Onix_5.jpg', 'image/jpeg', 'public', 'public', 294921, '[]', '[]', '{\"thumb\": true}', '[]', 5, '2023-12-29 20:27:54', '2023-12-29 20:27:54'),
(197, 'App\\Models\\Car', 82, 'e52fe15a-f007-4f90-a557-ae60726cfb82', 'cars', 'Fiat_Chronos_1', 'Fiat_Chronos_1.webp', 'image/webp', 'public', 'public', 164318, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2023-12-29 20:32:17', '2023-12-29 20:32:18'),
(198, 'App\\Models\\Car', 82, '5c882385-b9b3-4081-be1c-995a6b29ad74', 'cars', 'Fiat_Chronos_2', 'Fiat_Chronos_2.webp', 'image/webp', 'public', 'public', 66328, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-12-29 20:32:18', '2023-12-29 20:32:18'),
(199, 'App\\Models\\Car', 82, '330a6e98-4f0c-4e38-b02f-14ecd95858fc', 'cars', 'Fiat_Chronos_3', 'Fiat_Chronos_3.webp', 'image/webp', 'public', 'public', 115386, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-12-29 20:32:18', '2023-12-29 20:32:19'),
(200, 'App\\Models\\Car', 83, 'aeb06abb-ed78-4a52-b407-bdd3440e8c35', 'cars', 'Chevrolet_Corsa_1', 'Chevrolet_Corsa_1.webp', 'image/webp', 'public', 'public', 112086, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2023-12-29 20:32:53', '2023-12-29 20:32:54'),
(201, 'App\\Models\\Car', 83, '87e74ab5-b3b1-4997-b73f-b05c283001d8', 'cars', 'Chevrolet_Corsa_2', 'Chevrolet_Corsa_2.webp', 'image/webp', 'public', 'public', 91258, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-12-29 20:32:54', '2023-12-29 20:32:54'),
(202, 'App\\Models\\Car', 83, '1b8de1a3-7090-47e0-ba1b-21bb0998d886', 'cars', 'Chevrolet_Corsa_3', 'Chevrolet_Corsa_3.webp', 'image/webp', 'public', 'public', 91222, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-12-29 20:32:54', '2023-12-29 20:32:55'),
(203, 'App\\Models\\Car', 83, '454c9346-96a0-41cb-b1cb-951abd17760a', 'cars', 'Chevrolet_Corsa_4', 'Chevrolet_Corsa_4.webp', 'image/webp', 'public', 'public', 122086, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2023-12-29 20:32:55', '2023-12-29 20:32:55'),
(204, 'App\\Models\\Car', 83, 'afca53db-f825-4163-9098-6b4f24d2f15f', 'cars', 'Chevrolet_Corsa_5', 'Chevrolet_Corsa_5.webp', 'image/webp', 'public', 'public', 85422, '[]', '[]', '{\"thumb\": true}', '[]', 5, '2023-12-29 20:32:55', '2023-12-29 20:32:56'),
(207, 'App\\Models\\Car', 89, '105e0b1b-88c2-4407-8304-573551b12b61', 'cars', 'mustnag', 'mustnag.jpg', 'image/jpeg', 'public', 'public', 111722, '[]', '[]', '[]', '[]', 1, '2024-02-19 03:37:47', '2024-02-19 03:37:47'),
(208, 'App\\Models\\Car', 90, '9c1100cd-46d2-48d6-bb2c-a4a91b638a25', 'cars', 'mustnag', 'mustnag.jpg', 'image/jpeg', 'public', 'public', 111722, '[]', '[]', '[]', '[]', 1, '2024-02-19 03:56:00', '2024-02-19 03:56:00'),
(213, 'App\\Models\\Car', 91, '39dd0bde-0248-48c0-9300-f8664abd7023', 'cars', '4', '4.jpeg', 'image/webp', 'public', 'public', 28310, '[]', '[]', '[]', '[]', 1, '2024-02-19 04:08:50', '2024-02-19 04:08:50'),
(214, 'App\\Models\\Car', 92, '6744807e-e03b-4100-8864-ad7d79ffb8c4', 'cars', '2', '2.jpg', 'image/jpeg', 'public', 'public', 85523, '[]', '[]', '[]', '[]', 1, '2024-02-19 04:19:45', '2024-02-19 04:19:45'),
(215, 'App\\Models\\Car', 93, '1e27b663-f451-478c-8a74-ddafa65725c3', 'cars', 'mustnag', 'mustnag.png', 'image/jpeg', 'public', 'public', 111722, '[]', '[]', '[]', '[]', 1, '2024-02-19 04:23:09', '2024-02-19 04:23:09'),
(216, 'App\\Models\\Car', 94, '1d75d663-62ae-4543-826e-0809109aca84', 'cars', '2', '2.jpg', 'image/jpeg', 'public', 'public', 85523, '[]', '[]', '[]', '[]', 1, '2024-02-19 05:31:22', '2024-02-19 05:31:22'),
(217, 'App\\Models\\Car', 97, '49bca62b-ae2a-45a2-af07-68e1e9c2c7bd', 'cars', 'mustnag', 'mustnag.png', 'image/jpeg', 'public', 'public', 111722, '[]', '[]', '[]', '[]', 1, '2024-02-19 06:06:38', '2024-02-19 06:06:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `car_id`, `user_id`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(28, 77, 3, 6, 'Anulada', '2023-12-27 21:27:26', '2023-12-29 17:11:59'),
(29, 83, 3, 5, 'Vendido', '2023-12-29 17:52:24', '2023-12-29 17:52:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `loginCode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postalCode` varchar(15) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `loginCode`, `password`, `name`, `surname`, `dni`, `email`, `phone`, `address`, `postalCode`, `city`, `province`, `rol`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ventas', '$2y$10$E7q1.JW9jl5nzbGwWq3GkuLWHc8Yqh4MavyeppPwH66JqeHHn0R/q', 'Juan', 'perez', '546778', 'juanperez@hotmail.com.ar', '2284659432', 'Avellaneda 9562', '7400', 'Olavarria', 'Buenos Aires', 'Ventas', 'Deshabilitado', '2023-12-23 21:57:05', '2023-12-27 15:16:51'),
(3, 'pruebaVentas', '$2y$10$cnERuxGrBdoJOy6n8SGohum52GXPqQThdr3H99viGkeuZTroAX0De', 'Pedro', 'Renzar', '4568791', 'PedroRenzar@hotmail.com.ar', '2284651328', 'Sarmiento 6574', '7400', 'Olavarria', 'Buenos Aires', 'Ventas', 'Habilitado', '2023-12-23 22:14:55', '2024-02-21 00:50:47'),
(4, 'pruebaGerente', '$2y$10$cnERuxGrBdoJOy6n8SGohum52GXPqQThdr3H99viGkeuZTroAX0De', 'Matias', 'Jerez', '6512348', 'matiasJuarez@gmail.com', '2284653218', 'Junin 6582', '7400', 'Olavarria', 'Buenos Aires', 'Gerente', 'Habilitado', '2023-12-25 18:22:31', '2024-02-21 00:50:32'),
(5, 'pruebaAdmin', '$2y$10$cnERuxGrBdoJOy6n8SGohum52GXPqQThdr3H99viGkeuZTroAX0De', 'Nicolas', 'Franz', '', 'nicolasFranz@hotmail.com.ar', '2284632145', 'Alberdi 956', '7400', 'Olavarria', 'Buenos Aires', 'Administrador', 'Habilitado', '2023-12-25 18:37:34', '2024-02-21 00:50:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`) USING BTREE,
  ADD KEY `engine_id` (`engine_id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `engines`
--
ALTER TABLE `engines`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `engines`
--
ALTER TABLE `engines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`engine_id`) REFERENCES `engines` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
