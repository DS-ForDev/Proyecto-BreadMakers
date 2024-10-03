-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2024 a las 03:13:44
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `id` int(11) NOT NULL,
  `primernombre` varchar(250) NOT NULL,
  `segundonombre` varchar(250) NOT NULL,
  `primerapellido` varchar(250) NOT NULL,
  `segundoapellido` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `cv` varchar(250) NOT NULL,
  `idpuesto` int(11) NOT NULL,
  `fechaingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`id`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `foto`, `cv`, `idpuesto`, `fechaingreso`) VALUES
(16, 'Sandra', 'Milena', 'Castro', 'Clavijo', '1710902514_Sandra.png', '1710902514_cv-sandra.pdf', 1, '2019-03-06'),
(17, 'Wilmer', 'Andres', 'Zarate', 'Ortiz', '1710902587_Wilmer.png', '1710902587_cv-wilmer.pdf', 11, '2020-03-07'),
(19, 'Nicolas', 'Andres', 'Jimenez', 'Parada', '1710902751_Nicolas.png', '1710902751_cv-nicolas.pdf', 12, '2020-03-06'),
(20, 'Claudia', 'Elena', 'Salas', 'Pulido', '1710902842_Maria.png', '1710902842_cv-maria.pdf', 15, '2022-01-03'),
(21, 'Jose', 'Alberto', 'Quijano', 'Diaz', '1710902975_jose.png', '1710902975_cv-jose.pdf', 14, '2022-01-18'),
(22, 'Johan', 'David', 'Vargas', 'Sanchez', '1710903085_Johan.png', '1710903085_cv-johan.pdf', 15, '2022-02-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eventos`
--

CREATE TABLE `tbl_eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(45) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_eventos`
--

INSERT INTO `tbl_eventos` (`id`, `title`, `color`, `start`, `end`) VALUES
(102, 'Nueva Rutina', 'yellow', '2024-09-08 13:30:00', '2024-09-08 18:30:00'),
(103, '', 'orange', '2024-09-07 13:03:00', '2024-09-07 20:30:00'),
(104, 'Nuevo Evento', 'indigo', '2024-09-06 15:20:00', '2024-09-06 20:20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_inventario`
--

CREATE TABLE `tbl_inventario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `unidad` varchar(255) NOT NULL,
  `fechaingreso` date NOT NULL,
  `fechacaducidad` date NOT NULL,
  `costo` int(100) NOT NULL,
  `precio` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_inventario`
--

INSERT INTO `tbl_inventario` (`id`, `nombre`, `categoria`, `descripcion`, `cantidad`, `unidad`, `fechaingreso`, `fechacaducidad`, `costo`, `precio`) VALUES
(1, 'Pan Rollo', 'Panes', 'Pan Rollo 50g', 100, 'unidad', '2024-05-24', '2024-05-25', 250, 500),
(3, 'Pan Frances Pequeño', 'Panes', 'Pan frances pequeño 50g', 70, 'unidad', '2024-05-24', '2024-05-27', 250, 700),
(4, 'Mogolla', 'Panes', 'Mogolla Integral 50g', 60, 'unidad', '2024-05-24', '2024-05-27', 200, 500),
(5, 'Pan Pera', 'Panes', 'Pan Pera Pequeño 50g', 60, 'unidad', '2024-05-24', '2024-05-27', 250, 600),
(6, 'Pan Almohabanado', 'Panes', 'Pan Almohabanado 200g ', 15, 'unidad', '2024-05-24', '2024-05-27', 1800, 3500),
(7, 'Pan De Chocolate', 'Panes', 'Pan De Chocolate 200g', 10, 'unidad', '2024-05-24', '2024-05-27', 3000, 5000),
(8, 'Pan Tajado', 'Panes', 'Pan Tajado Integral 125g', 20, 'unidad', '2024-05-25', '2024-05-31', 2000, 4500),
(9, 'Fresa', 'Frutas', 'Fresa Lavada', 20, 'kg', '2024-05-25', '2024-06-01', 9500, 16000),
(10, 'Maracuya', 'Frutas', 'Maracuya Por Unidad', 20, 'kg', '2024-05-25', '2024-06-01', 9500, 16000),
(11, 'Queso Doble Crema', 'Lacteos', 'Queso Doble Crema Deslactosado', 10, 'kg', '2024-05-25', '2024-06-25', 60000, 11000),
(12, 'Cafe', 'Ingredientes', 'Cafe Alta Pureza', 20, 'kg', '2024-05-25', '2024-07-25', 110000, 160000),
(13, 'Milo', 'Ingredientes', 'Milo Granulado', 5, 'kg', '2024-05-25', '2024-08-25', 60000, 100000),
(14, 'Pan Rollo', 'Panes', '', 0, 'unidad', '2024-09-14', '2024-09-17', 58, 5528),
(15, 'Mogolla', 'Panes', 'Mogolla Integral 50g', 600, 'unidad', '2024-09-14', '2024-09-21', 250, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_materiaprima`
--

CREATE TABLE `tbl_materiaprima` (
  `id` int(11) NOT NULL,
  `nombremateriaprima` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_materiaprima`
--

INSERT INTO `tbl_materiaprima` (`id`, `nombremateriaprima`) VALUES
(21, 'Leche'),
(22, 'Quesos'),
(23, 'Harina'),
(24, 'Azucar'),
(25, 'Sal'),
(26, 'Levadura'),
(27, 'Bocadillo'),
(28, 'Arequipe'),
(29, 'Cafe - Chocolate'),
(30, 'Saborisantes'),
(31, 'Arequipe'),
(33, 'Carne'),
(34, 'Pollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ingredientes` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `nombre`, `ingredientes`, `foto`, `precio`) VALUES
(46, 'Jugo De Naranja', 'Extracto de fruta', '1715430124_naranja.jpg', '2000'),
(47, 'Masato', 'A base de Arroz', '1715430179_masato.jpg', '4000'),
(48, 'Jugos Naturales (Agua)', 'Extracto de fruta', '1715430210_fruta.jpg', '5000'),
(49, 'Jugos Naturales (Leche)', 'Extracto de fruta', '1715431273_leche.jpg', '6000'),
(50, 'Tinto Americano', 'Cafe Juan Valdes Premium', '1715786941_bebida3.webp', '3500'),
(51, 'Aromatica Frutal', 'Esencia de limon, Fruta Fresca', '1715787164_bebida2.webp', '4000'),
(52, 'Milo Caliente', 'Milo, Leche', '1715787287_bebida1.webp', '5000'),
(53, 'Cold Brew', 'Cafe Frio Destilado En Goteo', '1715788655_bebida7.webp', '13500'),
(54, 'Capuchino Baileys', 'Cafe, Adicion De Baileys', '1715794315_1714784826_bebida4.webp', '11500'),
(55, 'Capuchino Fantasia', 'Cafe, Crema Chantilly', '1715794401_bebida5.webp', '8500'),
(56, 'Milo Masmello', 'Milo, Mamellos, Crema Chantilly', '1715794485_bebida6.webp', '9500'),
(57, 'Capuchino Rosabella', 'Cafe, Dulce De Mora, Brillantina Comestible', '1715794640_bebida9.webp', '10500'),
(58, 'Mantecada', 'Vainilla', '1715815608_antojo1.jpg', '1500'),
(59, 'Milhoja', 'Crema Chantilly, Arequipe', '1715815737_antojo2.jpg', '3000'),
(60, 'Palito De Queso', 'Queso Doble Crema', '1715815826_antojo3.jpg', '1500'),
(61, 'Brownie ', 'Chocolate, Arequipe', '1715815909_antojo4.jpg', '2000'),
(62, 'Sandwich De Jamon Y Queso', 'Pan Hojaldre, Jamon, Queso', '1715815989_antojo5.jpg', '2500'),
(63, 'Fresa Con Crema', 'Fesas, Leche Condensada, Crema De Leche', '1715816247_antojo6.jpg', '2500'),
(64, 'Arroz Con Leche', 'Coco, Canela, Crema De Leche', '1715816302_antojo7.jpg', '2000'),
(65, 'Pastel Pollo Con Champiñones', 'Pollo, Champiñones', '1715816364_antojo8.jpg', '2500'),
(66, 'Pan Tajado', 'Mantequilla, Queso', '1715816483_pan9.jpg', '3000'),
(67, 'Pan De Chocolate', 'Chocolate, Chips De Chocolate', '1715816529_pan7.jpg', '5000'),
(68, 'Pan Frances', 'Queso ', '1715816570_pan4.jpg', '2500'),
(69, 'Pan Almohabanado', 'Queso, Aliño', '1715816617_pan5.jpg', '3500'),
(70, 'Pan Rollo', 'Hojaldre, Mantequilla', '1715816674_pan10.jpg', '500'),
(71, 'Mogolla', 'Integral', '1715816723_pan11.jpg', '500'),
(72, 'Pan Pera', 'Mantequilla', '1715816762_pan14.jpg', '500'),
(73, 'Pan Frances Pequeño', 'Queso, Mantequilla', '1715816805_pan13.jpg', '500'),
(74, 'Desayuno Americano', 'Huevos, Tocino, Pancakes, Porcion De Fruta, Bebida Fria', '1715817426_desayuno3.jpg', '15000'),
(75, 'Caldo De Costilla', 'Huevo, Papa, Costilla', '1715817501_desayuno4.jpg', '8000'),
(76, 'Bowl De Fruta', 'Papaya, Fresa, Banano, Kiwi, Manzana', '1715817589_desayuno5.jpg', '11000'),
(77, 'Calentado Paisa', 'Chicarron, Maiz Tierno, Arroz, Frijol, Huevo', '1715817698_desayuno7.jpg', '11000'),
(79, 'Arepa Con Huevo', 'Arepa De Choclo, Huevo Frito, Aguacate', '1715817945_desayuno9.jpg', '10000'),
(80, 'Omelette Natural ', 'Huevos, Jamon, Queso, Pan', '1715818098_desayuno1.jpg', '10000'),
(81, 'Huevos Crunch', 'Huevos Con Arepa Y Tocineta', '1715818282_desayuno2.jpg', '11500'),
(82, 'Changua Bogotana', 'Caldo A Base De Leche, Tostada Y Huevos', '1716856865_desayuno10.jpg', '6000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedores`
--

CREATE TABLE `tbl_proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `info` varchar(250) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `fechaingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_proveedores`
--

INSERT INTO `tbl_proveedores` (`id`, `nombre`, `foto`, `info`, `idmateria`, `fechaingreso`) VALUES
(8, 'Colanta S.A.S', '1710907739_colanta1.png', '1710907417_Colanta.pdf', 31, '2020-02-22'),
(9, 'Haz', '1710907690_hazdeoros.jpg', '1710907690_Hazdeoros.pdf', 23, '2018-03-15'),
(10, 'Incauca morena', '1710908020_Incauca.png', '1710908020_Incauca.pdf', 21, '2020-02-13'),
(11, 'Refisal Del sena', '1710908140_refisal.png', '1710908140_refisal.pdf', 21, '2018-03-06'),
(12, 'Levapan', '1710908301_Levapan.jpg', '1710908301_Levapan.pdf', 26, '2022-12-08'),
(13, 'Alpina S.A.', '1710908475_Alpina.png', '1710908475_Alpina.pdf', 22, '2018-03-21'),
(14, 'San Juan', '1710908725_SanJuan.png', '1710908725_SanJuan.pdf', 31, '2022-03-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_puestos`
--

CREATE TABLE `tbl_puestos` (
  `id` int(11) NOT NULL,
  `nombre_puesto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_puestos`
--

INSERT INTO `tbl_puestos` (`id`, `nombre_puesto`) VALUES
(1, 'Administrador'),
(11, 'Panaderos'),
(12, 'Contador'),
(13, 'Auxiliar'),
(14, 'Mojador'),
(15, 'Mesero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `correo`) VALUES
(16, 'Forero12', '$2y$10$1fSai6b3n6nDE/wIyA5o6OSvqwrDV7AEtt2a0rt.RohDo42gGJ.uO', 'dfv12@hotmail.com'),
(17, 'Sena12', '$2y$10$TWMKkQQy1NI8Dk/c70KA2OsGPPxRrIVj6sYRPNB7qzJVvzrwnVe..', 'sena12@misena.edu.co');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpuesto` (`idpuesto`);

--
-- Indices de la tabla `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_materiaprima`
--
ALTER TABLE `tbl_materiaprima`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmateria` (`idmateria`);

--
-- Indices de la tabla `tbl_puestos`
--
ALTER TABLE `tbl_puestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_materiaprima`
--
ALTER TABLE `tbl_materiaprima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_puestos`
--
ALTER TABLE `tbl_puestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD CONSTRAINT `tbl_empleados_ibfk_1` FOREIGN KEY (`idpuesto`) REFERENCES `tbl_puestos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  ADD CONSTRAINT `tbl_proveedores_ibfk_1` FOREIGN KEY (`idmateria`) REFERENCES `tbl_materiaprima` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
