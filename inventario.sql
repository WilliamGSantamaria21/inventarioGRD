-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2024 a las 16:32:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actives`
--

CREATE TABLE `actives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(255) NOT NULL,
  `placaInt` varchar(255) NOT NULL,
  `ubication_id` bigint(20) UNSIGNED NOT NULL,
  `clasification_id` bigint(20) UNSIGNED NOT NULL,
  `confidentiality_id` bigint(20) UNSIGNED NOT NULL,
  `integrity_id` bigint(20) UNSIGNED NOT NULL,
  `disponibility_id` bigint(20) UNSIGNED NOT NULL,
  `justification_id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `access_id` bigint(20) UNSIGNED NOT NULL,
  `dateAdmission` date NOT NULL,
  `departureDate` date DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `actualizacion` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL DEFAULT 64,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domains`
--

CREATE TABLE `domains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `domains`
--

INSERT INTO `domains` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'area', '2023-09-22 14:58:33', NULL),
(2, 'ubicaciones', '2024-01-23 15:29:12', NULL),
(3, 'acceso', '2024-01-23 15:29:16', NULL),
(4, 'categorias', '2024-01-23 15:29:19', NULL),
(5, 'estados_generales', '2024-01-23 15:30:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_28_205836_actives', 1),
(7, '2023_09_07_035213_create_domains_table', 1),
(8, '2023_09_07_035812_create_subdomains_table', 1),
(9, '2023_09_17_192946_create_permission_tables', 1),
(10, '2023_09_20_215247_mejora_tabla_users', 2),
(11, '2023_09_22_170922_update_actives_table', 3),
(12, '2023_09_22_172226_update_2_actives_table', 4),
(13, '2023_10_03_223759_create_images_table', 5),
(14, '2023_10_03_225750_create_images_table2', 6),
(15, '2014_10_12_200000_add_two_factor_columns_to_users_table', 7),
(16, '2023_11_15_115708_create_sessions_table', 8),
(17, '2023_08_28_173237_create_images_table', 9),
(18, '2023_11_15_212328_usersnew15112023', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 109),
(5, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 34),
(5, 'App\\Models\\User', 107);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(11, 'home', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31'),
(12, 'actives.index', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31'),
(13, 'actives.create', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31'),
(14, 'actives.edit', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31'),
(15, 'actives.delete', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31'),
(16, 'users.index', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31'),
(17, 'users.create', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31'),
(18, 'users.edit', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31'),
(19, 'users.delete', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31'),
(20, 'actives', 'web', NULL, NULL),
(21, 'home.stadistics', 'web', NULL, NULL),
(22, 'users.button', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31'),
(5, 'poseedor', 'web', '2023-11-18 00:06:31', '2023-11-18 00:06:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(11, 4),
(12, 4),
(12, 5),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 5),
(21, 4),
(22, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8gAbag4zjHyod0VfvQCmKXt9cp3k9XtfLR3L2y5H', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSlBpc3lFa1BacmlDZWREY2VFQXl5ZlI5MUNjN2dmdWlZakROd3hNeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MDI0ODQxMTQ7fX0=', 1702484115),
('FtFvfqQXzDSBva3skknGzPTHfjtpIqYnBTJdwbLs', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNjJaOUo5dmh4eDVLSUZHNWxHODQxV3J2TXF3M0lETjJjanVIdWFFbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3QvaW52ZW50YXJpby9wdWJsaWMvYWN0aXZlcy9jcmVhdGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcwNjAyMjgxOTt9fQ==', 1706023272),
('OIb3XJgnr3gJSz3PcTT0qFTES5ypR5qTD9rvW7MB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:120.0) Gecko/20100101 Firefox/120.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzNZSGZpZ3RBNm9MR1doNkNxbDIzUGtPakU3ZmsyUFZTcWJ5UnkwVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1702484550),
('ppZ8UtUprJpcZjJq1xCSzO2uf28s2QaKTuxpxjtg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3JLbkI5UmxNekp2ZUlqYThVYndIN1I4bTJBRzQ0MTJGQUlMY1J0WCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1702487505),
('vp9F6vsXbvoZx1n40oHKUeNzVDKCYLzGAWNgil9q', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTQ5NHhXSEVSWkpxSmxPMWJqanlwS29SQ2ZycUNScVI3SnVYNTQzYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3QvaW52ZW50YXJpby9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1706021738),
('xSZRrQ2lDoG6qd44REe2meMmpTmluMEAyCnn45sJ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDVtazNSdmZ3eDFXWHVpWDh0M29SWXlBY2JDSXVVb3dxR09VaUMwSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3QvaW52ZW50YXJpby9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1706021938);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subdomains`
--

CREATE TABLE `subdomains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_domain` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subdomains`
--

INSERT INTO `subdomains` (`id`, `id_domain`, `description`, `created_at`, `updated_at`) VALUES
(1, 5, 'activo', '2024-01-23 15:31:36', NULL),
(2, 5, 'inactivo', '2024-01-23 15:31:08', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `identification_number` bigint(20) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL DEFAULT 64,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `identification_number`, `phone_number`, `state_id`, `start_date`, `end_date`) VALUES
(1, 'Juan Pablo Agredo Castaño', 'juagre@gmail.com', NULL, '$2y$13$r5dE.nweqXouXdpfCLESNulXCUmO4Z6vhj/X2ephy8Bh.K.yoXniC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-16 02:30:06', '2024-01-23 20:13:16', 44445414, '323555', 1, '2023-11-15', '2023-12-15'),
(2, 'Gustavo Adolfo Diaz Rojas', 'gad@misena.edu.co', NULL, '$2y$13$E2CwygFa0JvZaSl/3IT5/eJMk1/EgHncNRN2XvxD71ydHySokNcaW', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-23 20:15:30', '2024-01-23 20:15:30', 16640114, NULL, 1, NULL, NULL),
(3, 'Gustavo Adolfo Rodríguez Salinas', 'grodriguez@misena.edu.co', NULL, '$2y$13$PLaPL9ZFDo3pOSQdb0ZctOxCHw.E2oMeIFWzwzGcecwjw/Tx9I.R2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-23 20:16:30', '2024-01-23 20:16:30', 12345678, NULL, 1, NULL, NULL),
(4, 'Diego Fernando Rodríguez Mapallo', 'diegofer74@gmail.com', NULL, '$2y$13$zyJdvzgGr9yP5E1BDt6MmeJtg1iQPMmL4ycKd9AksVGp.LlBdar9i', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-23 20:20:11', '2024-01-23 20:20:11', 123456789, NULL, 1, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actives`
--
ALTER TABLE `actives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actives_area_id_foreign` (`area_id`),
  ADD KEY `actives_type_id_foreign` (`type_id`),
  ADD KEY `actives_ubication_id_foreign` (`ubication_id`),
  ADD KEY `actives_clasification_id_foreign` (`clasification_id`),
  ADD KEY `actives_confidentiality_id_foreign` (`confidentiality_id`),
  ADD KEY `actives_integrity_id_foreign` (`integrity_id`),
  ADD KEY `actives_disponibility_id_foreign` (`disponibility_id`),
  ADD KEY `actives_justification_id_foreign` (`justification_id`),
  ADD KEY `actives_owner_id_foreign` (`owner_id`),
  ADD KEY `actives_access_id_foreign` (`access_id`),
  ADD KEY `actives_status_id_foreign` (`status_id`),
  ADD KEY `fk_category_id` (`category_id`),
  ADD KEY `fk_state_id:state_id` (`state_id`);

--
-- Indices de la tabla `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `subdomains`
--
ALTER TABLE `subdomains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subdomains_id_domain_foreign` (`id_domain`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_fk_state_id` (`state_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actives`
--
ALTER TABLE `actives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `domains`
--
ALTER TABLE `domains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subdomains`
--
ALTER TABLE `subdomains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actives`
--
ALTER TABLE `actives`
  ADD CONSTRAINT `actives_access_id_foreign` FOREIGN KEY (`access_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `actives_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `actives_category_id` FOREIGN KEY (`category_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `actives_clasification_id_foreign` FOREIGN KEY (`clasification_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `actives_confidentiality_id_foreign` FOREIGN KEY (`confidentiality_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `actives_disponibility_id_foreign` FOREIGN KEY (`disponibility_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `actives_integrity_id_foreign` FOREIGN KEY (`integrity_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `actives_justification_id_foreign` FOREIGN KEY (`justification_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `actives_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `actives_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `actives_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `actives_ubication_id_foreign` FOREIGN KEY (`ubication_id`) REFERENCES `subdomains` (`id`),
  ADD CONSTRAINT `fk_state_id` FOREIGN KEY (`state_id`) REFERENCES `subdomains` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `subdomains`
--
ALTER TABLE `subdomains`
  ADD CONSTRAINT `subdomains_id_domain_foreign` FOREIGN KEY (`id_domain`) REFERENCES `domains` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk_state_id` FOREIGN KEY (`state_id`) REFERENCES `subdomains` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
