-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2018 a las 20:25:59
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marmoleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canal_de_venta`
--

CREATE TABLE `canal_de_venta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `entrecalles` varchar(50) DEFAULT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  `localidad` varchar(50) NOT NULL,
  `partido` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) NOT NULL,
  `telefono1` varchar(50) NOT NULL,
  `telefono2` varchar(50) DEFAULT NULL,
  `factura` varchar(10) DEFAULT NULL,
  `cuit` varchar(50) DEFAULT NULL,
  `razonsocial` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `direccion`, `entrecalles`, `observaciones`, `localidad`, `partido`, `provincia`, `telefono1`, `telefono2`, `factura`, `cuit`, `razonsocial`) VALUES
(1, 'Carlos Lio', 'jose de la peña 375', NULL, NULL, 'adrogue', 'almirante brown', 'buenos aires', '35359666', '1560420375', 'si', NULL, NULL),
(2, 'Constructora', '1321321 almirante', NULL, NULL, 'adrogue', 'lomas de zamora', 'buenos aires', '32132', NULL, 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('joaquinlio97@gmail.com', '$2y$10$WaEo1LA5PP/Hsj/lduHm4uihXbHwdYk2m6Wn24fMf08CQQKeuK.iG', '2018-11-29 18:24:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pdo_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` int(11) NOT NULL,
  `profecional` int(11) DEFAULT NULL,
  `vendedor` int(11) NOT NULL,
  `productos` varchar(2000) NOT NULL,
  `totalPed` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `senia` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `despacho` varchar(20) NOT NULL,
  `canaldeventa` varchar(20) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `subEstado` varchar(200) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pdo_id`, `fecha`, `cliente`, `profecional`, `vendedor`, `productos`, `totalPed`, `descuento`, `senia`, `saldo`, `despacho`, `canaldeventa`, `estado`, `subEstado`, `imagen`) VALUES
(1, '2018-11-17', 1, 1, 1, 'Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente 8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Ajuste y Colocacion,12000,1,12000,,opcion1,/Ajuste y Colocacion,12000,1,12000,,opcion2,/Ajuste y Colocacion,12000,1,12000,,opcion3,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos', 12000, 10, 300, 10500, 'Retirar', 'adrogue', 'espera', 'medidas', 'http://localhost/marmoleria/public/imagen/jsTnXFedAgdQaNTWGg4uAbq2UxHwMWbE7j75PRh6.jpeg'),
(5, '2018-11-22', 1, 1, 1, 'Ajuste y Colocacion,12000,1,12000,,Todos', 12000, NULL, NULL, NULL, '', 'adrogue', 'espera', 'asignaciondemateriaprima,Medidas,Materiales Por Parte Del Cliente', NULL),
(6, '2018-11-26', 1, 1, 1, 'Ajuste y Colocacion,12000,1,12000,,Todos', 12000, 15, 155, 10045, 'Retirar', 'adrogue', 'espera', 'Asignacion De Materia Prima', NULL),
(7, '2018-11-26', 1, 1, 1, 'Ajuste y Colocacion,12000,1,12000,,Todos', 12000, 15, 155, 10045, 'Retirar', 'adrogue', 'espera', 'Asignacion De Materia Prima', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `pto_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` int(11) NOT NULL,
  `profecional` int(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `productos` varchar(1500) NOT NULL,
  `canaldeventa` varchar(20) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `presupuestos`
--

INSERT INTO `presupuestos` (`pto_id`, `fecha`, `cliente`, `profecional`, `vendedor`, `productos`, `canaldeventa`, `estado`) VALUES
(38, '2018-11-19', 1, 1, 1, 'Ajuste y Colocacion,12000,1,12000,,Todos', 'adrogue', 'a confirmar'),
(39, '2018-11-19', 1, 1, 1, 'Ajuste y Colocacion,12000,1,12000,,Todos/Ajuste y Colocacion,12000,1,12000,,Todos', 'adrogue', 'a confirmar'),
(40, '2018-11-19', 1, 1, 1, 'Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Ajuste y Colocacion,12000,1,12000,,opcion1,/Ajuste y Colocacion,12000,1,12000,,opcion2,/Ajuste y Colocacion,12000,1,12000,,opcion3,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos,/Granito-Blanco-20mm,1500,3,4500,8 mesadas segun plano tener en cuenta el pedido del cliente,Todos', 'adrogue', 'a confirmar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos/extras`
--

CREATE TABLE `productos/extras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos/extras`
--

INSERT INTO `productos/extras` (`id`, `nombre`, `precio`) VALUES
(12, 'Marmol-Gris Mara-20mm', 1500),
(13, 'Granito-Blanco-20mm', 2000),
(14, 'Pileta - Oval - Medidas', 3200),
(15, 'Pileta 443', 3000),
(16, 'Trasforo', 1800),
(17, 'Ajuste y Colocacion', 12000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profecionales`
--

CREATE TABLE `profecionales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profecionales`
--

INSERT INTO `profecionales` (`id`, `nombre`, `telefono`, `email`) VALUES
(1, 'alberto', 1562569875, 'alberto@gmail.com'),
(2, 'Jose Armando', 1148956663, 'josearmando@gmail.com'),
(3, 'Ramirez Pedro', 1524697842, 'ramirezpedrohotmail');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `sol_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` int(11) NOT NULL,
  `profecional` int(11) DEFAULT NULL,
  `vendedor` int(11) NOT NULL,
  `productos` varchar(2000) NOT NULL,
  `totalPed` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `senia` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `despacho` varchar(20) DEFAULT NULL,
  `canaldeventa` varchar(20) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `subEstado` varchar(200) DEFAULT NULL,
  `finalizado` varchar(20) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`sol_id`, `fecha`, `cliente`, `profecional`, `vendedor`, `productos`, `totalPed`, `descuento`, `senia`, `saldo`, `despacho`, `canaldeventa`, `estado`, `subEstado`, `finalizado`, `imagen`, `tipo`) VALUES
(23, '2018-11-27', 2, 1, 1, 'Granito-Blanco-20mm,1500,3,4500,,Todos,/Ajuste y Colocacion,12000,1,12000,,opcion1', 16500, 15, 155, 10045, 'entregar', 'adrogue', 'espera', 'Asignacion De Materia Prima', 'avisado', 'http://localhost/marmoleria/public/imagen/SYfuCPqJeJJaff0JLDgmyBepd9hQq87Dy97fo6Pq.jpeg', 'Pedido'),
(25, '2018-11-27', 1, 1, 1, 'Granito-Blanco-20mm,1500,3,4500,,opcion1,/Ajuste y Colocacion,12000,1,12000,,Todos', 16500, NULL, NULL, 4500, 'entregado', 'adrogue', 'a confirmar', NULL, '', NULL, 'Presupuesto'),
(27, '2018-11-27', 1, 1, 1, 'Ajuste y Colocacion,12000,1,12000,,Todos', NULL, NULL, NULL, NULL, NULL, 'adrogue', 'archivado', NULL, '', NULL, 'Presupuesto'),
(29, '2018-11-29', 1, 1, 1, 'Granito-Blanco-20mm,1500,3,4500,,opcion1,/Ajuste y Colocacion,12000,1,12000,,Todos,/Granito-Blanco-20mm,1500,3,4500,,opcion1,/Granito-Blanco-20mm,1500,3,4500,,opcion1,/Granito-Blanco-20mm,1500,3,4500,,opcion1', 36000, 15, 300, 30300, 'entregar', 'adrogue', 'produccion', 'Pulidos y Pegados', 'avisar', NULL, 'Pedido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'joaquinlio', 'joaquinlio97@gmail.com', NULL, '$2y$10$NFj/VB2UVUlXCtKBYkm8w.6g4FaTb6nvKD8ZKmAoSzfDfssRDQVJm', 'NHkqmGLfHVW2BQDJRv9YLD4YNdc2TFJadf9Tb3DGJD6marBvT7UGxuiadVm7', '2018-11-29 18:24:29', '2018-11-29 18:24:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id`, `nombre`, `telefono`) VALUES
(1, 'Marcela', 1165986565);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canal_de_venta`
--
ALTER TABLE `canal_de_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pdo_id`),
  ADD KEY `producto-fk` (`productos`(767)),
  ADD KEY `cliente-fk` (`cliente`),
  ADD KEY `profecional-fk` (`profecional`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`pto_id`),
  ADD KEY `producto-fk` (`productos`(767)),
  ADD KEY `cliente-fk` (`cliente`),
  ADD KEY `profecional-fk` (`profecional`);

--
-- Indices de la tabla `productos/extras`
--
ALTER TABLE `productos/extras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profecionales`
--
ALTER TABLE `profecionales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`sol_id`),
  ADD KEY `producto-fk` (`productos`(767)),
  ADD KEY `cliente-fk` (`cliente`),
  ADD KEY `profecional-fk` (`profecional`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canal_de_venta`
--
ALTER TABLE `canal_de_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pdo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  MODIFY `pto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `productos/extras`
--
ALTER TABLE `productos/extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `profecionales`
--
ALTER TABLE `profecionales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `sol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
