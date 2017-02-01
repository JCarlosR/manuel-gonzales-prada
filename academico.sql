-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2017 a las 22:03:20
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE `careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Computación e informática', '', '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(2, 'Contabilidad', '', '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(3, 'Mecánica', '', '2017-01-31 20:11:35', '2017-01-31 20:11:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Matemáticas', 'Curso de matemáticas básicas.', '2017-01-31 20:11:35', '2017-01-31 20:11:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_handbooks`
--

CREATE TABLE `course_handbooks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `course_handbooks`
--

INSERT INTO `course_handbooks` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Malla curricular 2016', 'Malla curricular actual de la institución educativa.', '2017-01-31 20:11:35', '2017-01-31 20:11:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `school_year_id` int(10) UNSIGNED NOT NULL,
  `career_id` int(10) UNSIGNED NOT NULL,
  `academic_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `observations` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `school_year_id`, `career_id`, `academic_year`, `status`, `amount`, `observations`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, 1, 0, 250.00, '', '2017-01-31 20:13:43', '2017-01-31 20:13:43'),
(2, 5, 2, 2, 6, 1, 300.00, '', '2017-01-31 20:36:00', '2017-01-31 20:36:00'),
(3, 6, 2, 3, 4, 0, 200.00, '', '2017-01-31 20:42:05', '2017-01-31 20:42:05'),
(4, 7, 2, 2, 3, 0, 200.00, '', '2017-01-31 21:40:12', '2017-01-31 21:40:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enrollment_fees`
--

CREATE TABLE `enrollment_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `enrollment_id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general_parameters`
--

CREATE TABLE `general_parameters` (
  `id` int(10) UNSIGNED NOT NULL,
  `registration_fee` double(8,2) NOT NULL,
  `monthly_payment` double(8,2) NOT NULL,
  `coin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coin_symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `periods_per_year` smallint(6) NOT NULL,
  `units_per_period` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institution_datas`
--

CREATE TABLE `institution_datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catchword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resolution` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cellphone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_01_05_000000_create_roles_table', 1),
('2016_01_05_000001_create_users_table', 1),
('2016_01_05_000002_create_password_resets_table', 1),
('2016_01_06_000000_create_institution_datas_table', 1),
('2016_01_06_000001_create_general_parameters_table', 1),
('2016_01_06_200002_create_courses_table', 1),
('2016_01_10_000000_create_course_handbooks_table', 1),
('2016_01_15_100000_create_school_years_table', 1),
('2016_01_15_100001_create_periods_table', 1),
('2016_01_15_100002_create_units_table', 1),
('2016_01_16_000000_create_enrollments_table', 1),
('2016_01_26_184208_create_enrollment_fees_table', 1),
('2016_10_05_154856_create_careers_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periods`
--

CREATE TABLE `periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `school_year_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(2, 'Alumno', NULL, '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(3, 'Docente', NULL, '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(4, 'Administrativo', NULL, '2017-01-31 20:11:35', '2017-01-31 20:11:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `school_years`
--

CREATE TABLE `school_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `course_handbook_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `school_years`
--

INSERT INTO `school_years` (`id`, `name`, `start`, `end`, `course_handbook_id`, `created_at`, `updated_at`) VALUES
(1, '2016-II', '2016-01-01', '2016-12-31', 1, '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(2, '2017-I', '2017-01-01', '2017-12-31', 1, '2017-01-31 20:11:35', '2017-01-31 20:11:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `period_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identity_card` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Hombre','Mujer') COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `identity_card`, `gender`, `birth_date`, `photo`, `remark`, `phone`, `cellphone`, `address`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@manuelgonzalesprada.com', '$2y$10$N00ENynft9YAEcMM6L1CyOWraeIy9QlpF.khwHyREgFwLcuHWl6OW', 'Angel', 'Mantilla', '76474871', 'Hombre', NULL, NULL, NULL, NULL, '966 543 777', 'Trujillo - Perú', 1, NULL, '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(2, 'hhand@torphy.org', '$2y$10$tBAmSEbFSNbNMtNFqaejJO1r/G1qET9l8JGY9WH0zqjauzkEP8qQW', 'Lincoln', 'Parker', '50431038', 'Mujer', NULL, NULL, NULL, NULL, '654.944.6224', '87454 Kertzmann Motorway Apt. 978', 2, NULL, '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(3, 'domenick.hegmann@gmail.com', '$2y$10$s.hE5D8fFnE6O272q/EMjez/4IJIGn2uN3uT2TuVCI/E72ORaOpMK', 'Marley', 'Lubowitz', '84650614', 'Mujer', NULL, NULL, NULL, NULL, '370.247.7293x36980', '61685 Watsica Canyon Apt. 909', 2, NULL, '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(4, 'kilback.emilia@jones.com', '$2y$10$tC8inyUUBnhES1hVyxtiVu35HhGRe0/Erd4NhmcIzpkGKblHNl60O', 'Nathan', 'Buckridge', '73156455', 'Hombre', NULL, NULL, NULL, NULL, '792-973-9608x376', '282 Thompson Burgs Apt. 832', 2, NULL, '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(5, 'grady.kattie@balistreri.info', '$2y$10$Kc02odgnZ5a2U7rCblne5OBKN6yLwTGXOp1DqpAQNG5WsIiWQIYR.', 'Collin', 'Huel', '60692541', 'Mujer', NULL, NULL, NULL, NULL, '595-094-3607x9790', '43702 Ortiz Manors Suite 302', 2, NULL, '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(6, 'kasandra.altenwerth@hotmail.com', '$2y$10$Yd1x6fJAa2Z9nwDHnKcX/Ock56G3HICQLFnNAs51RbNS5okneUOzm', 'Angus', 'Rogahn', '65867543', 'Hombre', NULL, NULL, NULL, NULL, '1-639-305-8786x280', '91201 Hamill View', 2, NULL, '2017-01-31 20:11:35', '2017-01-31 20:11:35'),
(7, 'prueba@gmail.com', '$2y$10$WBp18IA4Df0.R99AIPCxgucmd/Bu5clIRyWrOeTdupzIQSNTb7TB6', 'Datos', 'DE PRUEBA', '74855244', 'Hombre', '0000-00-00', NULL, NULL, '', '741369147', '', 2, NULL, '2017-01-31 21:36:02', '2017-01-31 21:36:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `course_handbooks`
--
ALTER TABLE `course_handbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollments_user_id_foreign` (`user_id`),
  ADD KEY `enrollments_school_year_id_foreign` (`school_year_id`),
  ADD KEY `enrollments_career_id_foreign` (`career_id`);

--
-- Indices de la tabla `enrollment_fees`
--
ALTER TABLE `enrollment_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollment_fees_enrollment_id_foreign` (`enrollment_id`);

--
-- Indices de la tabla `general_parameters`
--
ALTER TABLE `general_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `institution_datas`
--
ALTER TABLE `institution_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periods_school_year_id_foreign` (`school_year_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_years_course_handbook_id_foreign` (`course_handbook_id`);

--
-- Indices de la tabla `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_period_id_foreign` (`period_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `course_handbooks`
--
ALTER TABLE `course_handbooks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `enrollment_fees`
--
ALTER TABLE `enrollment_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `general_parameters`
--
ALTER TABLE `general_parameters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `institution_datas`
--
ALTER TABLE `institution_datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
