-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2024 a las 08:41:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_habitacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `cantidad`, `comentario`, `fecha`, `id_habitacion`, `id_usuario`) VALUES
(3, 4, 'Excelente atencion, la pase de maravilla con mi familia', '2024-07-05 07:49:43', 10, 9),
(4, 5, 'La pase super en mi estadia del hotel, recomiendo esta habitacion', '2024-07-05 08:02:26', 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `estado`) VALUES
(1, 'Habitación Estándar', 1),
(2, 'Habitación Familiar', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `num_identidad` varchar(50) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `mensaje` text NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `num_identidad`, `nombre`, `telefono`, `direccion`, `correo`, `mensaje`, `facebook`, `twitter`, `instagram`, `whatsapp`) VALUES
(1, '71221616', 'Arnold Macuri Vargas', '977786234', 'PIURA - PIURA', 'arnold.macuri@gmail.com', 'Donde cada momento se transforma en una experiencia memorable. Disfruta de nuestra hospitalidad excepcional, comodidades de primer nivel y servicio impecable. ¡Tu escapada perfecta comienza aquí!', 'https://es-la.facebook.com/', 'https://twitter.com/?lang=es', 'https://www.instagram.com/', 'https://twitter.com/?lang=es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `foto` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `categorias` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `estilo` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `estilo`, `numero`, `capacidad`, `slug`, `foto`, `video`, `descripcion`, `precio`, `estado`, `fecha`) VALUES
(1, 'Habitación Serenidad', 10, 3, 'habitacion-serenidad', '1.jpg', NULL, 'Un refugio tranquilo y relajante, perfecto para aquellos que buscan escapar del ajetreo y el bullicio de la vida cotidiana.', 50.00, 1, '2024-03-16 15:18:09'),
(2, 'Suite Ejecutiva', 150, 3, 'suite-ejecutiva', '2.jpg', NULL, 'Un espacio elegante y funcional diseñado para viajeros de negocios que valoran la comodidad y la eficiencia durante su estancia.', 50.00, 1, '2024-03-16 15:19:33'),
(3, 'Habitación Familiar', 50, 4, 'habitacion-familiar', '3.jpg', NULL, 'Amplia y acogedora, esta habitación es ideal para familias que desean compartir momentos especiales juntos mientras disfrutan de todas las comodidades del hogar.', 100.00, 1, '2024-07-24 23:58:51'),
(4, 'Suite Romántica', 150, 3, 'suite-romantica', '4.jpg', NULL, 'Una escapada íntima y lujosa diseñada para parejas que buscan reavivar la chispa del romance en un entorno elegante y privado.', 50.00, 1, '2024-03-16 15:22:56'),
(5, 'Habitación con Vistas al Mar', 50, 5, 'habitacion-vistas-mar', '5.jpg', NULL, 'Disfruta de impresionantes vistas al océano desde esta habitación, donde la brisa marina y el sonido de las olas crean un ambiente de tranquilidad y serenidad.', 100.00, 1, '2024-07-24 23:58:51'),
(6, 'Suite Deluxe', 150, 3, 'suite-deluxe', '6.jpg', NULL, 'Sumérgete en el lujo y la elegancia de esta suite excepcionalmente espaciosa, donde cada detalle está cuidadosamente diseñado para brindarte una experiencia inolvidable.', 50.00, 1, '2024-03-16 15:23:04'),
(7, 'Habitación Zen Garden', 50, 6, 'habitacion-zen-garden', '7.jpg', NULL, 'Encuentra paz y armonía en esta habitación inspirada en un jardín zen, donde la serenidad del entorno te invita a relajarte y renovar tus sentidos.', 100.00, 1, '2024-03-16 15:23:08'),
(8, 'Suite Presidencial', 150, 3, 'suite-presidencial', '8.jpg', NULL, 'Experimenta el máximo nivel de lujo y privacidad en esta suite exclusiva, diseñada para satisfacer incluso los gustos más exigentes de nuestros huéspedes VIP.', 50.00, 1, '2024-03-16 15:23:12'),
(9, 'Habitación Loft Urbano', 50, 5, 'habitacion-loft-urbano', '9.jpg', NULL, ' Disfruta de un estilo moderno y sofisticado en este loft urbano, donde el diseño vanguardista se combina con comodidades de primera clase para una estancia inigualable.', 100.00, 1, '2024-07-24 23:58:51'),
(10, 'Suite Skyline', 50, 6, 'suite-skyline', '10.jpg', NULL, 'Contempla las impresionantes vistas de la ciudad desde esta suite de altura, donde la elegancia se combina con panorámicas inigualables para una experiencia verdaderamente espectacular.', 100.00, 1, '2024-03-16 15:23:15'),
(11, 'habitacion eliminar', 30, 20, 'habitacion-eliminar', '20240319155234.jpg', NULL, '<p>esta se eliminara</p>', 40.00, 0, '2024-03-19 14:52:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `num_transaccion` varchar(50) NOT NULL,
  `cod_reserva` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `descripcion` text DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `metodo` varchar(50) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `monto`, `num_transaccion`, `cod_reserva`, `fecha_ingreso`, `fecha_salida`, `fecha_reserva`, `descripcion`, `estado`, `metodo`, `id_habitacion`, `id_usuario`) VALUES
(8, 500.00, '4M746392YD913602F', '6687a2faab78f', '2024-07-05', '2024-07-09', '2024-07-05 07:38:34', '', 1, 'Paypal', 10, 9),
(9, 200.00, '87A50247R2380081B', '6687a82b4e7e9', '2024-07-05', '2024-07-08', '2024-07-05 08:00:43', '<p>Espero que la estadia, en el hotel gran palma, sea la que estuve esperando</p>', 1, 'Paypal', 1, 9),
(10, 500.00, '0UG001673M462361U', '66a0190a2cf88', '2024-07-23', '2024-07-27', '2024-07-23 20:56:42', '<p>Deseas</p>', 1, 'Paypal', 10, 10),
(11, 400.00, '9C963759UA8859439', '66a044bd2457a', '2024-07-24', '2024-07-27', '2024-07-24 00:03:09', '', 1, 'Paypal', 9, 10),
(12, 300.00, '08D111107A0449002', '66a1a0bb3f9d2', '2024-07-25', '2024-07-30', '2024-07-25 00:47:55', '', 1, 'Paypal', 8, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `titulo`, `subtitulo`, `url`, `foto`, `estado`) VALUES
(1, '¡Bienvenidos al Hotel Gran Palma!', 'Donde la comodidad y el lujo se encuentran para brindarte una experiencia inolvidable.', 'http://localhost/reservas/', '20240724005423.jpg', 1),
(2, 'Habitaciones de Ensueño', 'Disfruta de la elegancia y el confort en cada rincón de nuestras exclusivas suites.', 'http://localhost/reservas/', '20240724005459.jpg', 1),
(3, 'En el Corazón del Paraíso', 'Descubre la belleza de nuestra ubicación privilegiada y su entorno espectacular.', 'http://localhost/reservas/', '20240724005515.jpg', 1),
(5, 'Con un Gran Servicio de Excelencia', 'Desde el check-in hasta el check-out, cada detalle está pensado para tu satisfacción.', 'http://localhost/reservas/', 'slider2.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `identidad` varchar(100) DEFAULT NULL,
  `num_identidad` varchar(20) DEFAULT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `clave` varchar(150) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `rol` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `identidad`, `num_identidad`, `nombre`, `apellido`, `usuario`, `correo`, `telefono`, `direccion`, `clave`, `token`, `verify`, `rol`, `foto`, `estado`, `fecha`) VALUES
(7, NULL, NULL, 'Arnold', 'Macuri', 'ArnoldMV', 'arnold.macuri@gmail.com', NULL, NULL, '$2y$10$9ucroA7TdyGHFDli391VIeke6MRq0SM4AsUPZaEbdss6H5k6xLuzq', NULL, 0, 1, NULL, 1, '2024-07-03 08:01:11'),
(8, NULL, NULL, 'Salvador', 'Macuri', 'SalvadorMV', 'salvador.macuri@gmail.com', NULL, NULL, '$2y$10$yfKvZgxhST3fzzAGdJlACevqJ7GNbPIPliUtmn0oeqvObMUqq6oue', NULL, 0, 3, NULL, 1, '2024-07-03 08:09:28'),
(9, NULL, NULL, 'Pier', 'Rojas', 'PIER123', 'pier@gmail.com', NULL, NULL, '$2y$10$EDWczfeSZtWRcKTgwKDROOVxQk/WWDgx9JqF9p1eyfl7ZtLdkProq', NULL, 0, 3, NULL, 1, '2024-07-04 00:43:32'),
(10, NULL, NULL, 'Rogger', 'Vargas', 'Rogger', 'rogger@gmail.com', NULL, NULL, '$2y$10$LQoUBhKd55rrZ2Pms4aLveuGCGVV54YIgnVDGU4V4vhjG5Ohl4jRe', NULL, 0, 3, NULL, 1, '2024-07-23 20:50:34'),
(11, 'DNI', '71221616', 'Jaime', 'Vargas', '', 'jaime@gmail.com', '977786234', 'calle meliton', '', NULL, 0, 3, NULL, 1, '2024-07-23 21:01:56'),
(12, NULL, NULL, 'pier', 'rojas', 'pier12345', 'pier123@gmail.com', NULL, NULL, '$2y$10$vPkagxfnQo6BHAB5ZjkLIeoNE0Y0SO6n9aLZgtu0ylGZl/2IhzXFe', NULL, 0, 3, NULL, 1, '2024-07-25 00:37:33'),
(13, NULL, NULL, 'Jaime', 'Vargas', 'jaime', 'jaimevargas@gmail.com', NULL, 'calle meliton', '$2y$10$vNT6spQBij/mTU3s.lWhrOqZj6kfl14OclEN34uipzzDzWoxelJwa', NULL, 0, 2, NULL, 0, '2024-07-25 00:50:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habitacion` (`id_habitacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habitacion` (`id_habitacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
