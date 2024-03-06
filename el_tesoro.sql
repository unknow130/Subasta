-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2023 a las 20:26:55
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `el_tesoro`
--
CREATE DATABASE IF NOT EXISTS `el_tesoro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `el_tesoro`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetos`
--

CREATE TABLE `objetos` (
  `id_objeto` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `historia` varchar(200) NOT NULL,
  `id_propietario` int(11) NOT NULL,
  `tipo_objeto` varchar(50) NOT NULL,
  `precio_inicial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `objetos`
--

INSERT INTO `objetos` (`id_objeto`, `nombre`, `descripcion`, `historia`, `id_propietario`, `tipo_objeto`, `precio_inicial`) VALUES
(46, 'Anillo egipcio', 'antiguo egipto', 'khqwdhedhdqh', 5, 'Anillos', 123),
(47, 'prueba', 'hjifhreh', 'ihdewiheiwh', 5, 'pruebas', 123123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `id_peticion` int(11) NOT NULL,
  `nombre_objeto` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `historia` varchar(200) NOT NULL,
  `nombre_usuario` varchar(80) NOT NULL,
  `tipo_objeto` varchar(80) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'en espera',
  `precio_inicial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`id_peticion`, `nombre_objeto`, `descripcion`, `historia`, `nombre_usuario`, `tipo_objeto`, `estado`, `precio_inicial`) VALUES
(15, 'Anillo egipcio', 'antiguo egipto', 'khqwdhedhdqh', 'admin', 'Anillos', 'aceptada', 123),
(16, 'el universo', 'muy grande', 'grande y valioso', 'admin', 'mundo', 'en espera', 1111),
(17, 'prueba', 'hjifhreh', 'ihdewiheiwh', 'admin', 'pruebas', 'aceptada', 123123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas`
--

CREATE TABLE `pujas` (
  `id_puja` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_subasta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pujas`
--

INSERT INTO `pujas` (`id_puja`, `fecha`, `monto`, `id_usuario`, `id_subasta`) VALUES
(26, '2023-06-04', 12325, 5, 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastas`
--

CREATE TABLE `subastas` (
  `id_subasta` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio_inicial` int(11) NOT NULL,
  `precio_actual` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_objeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subastas`
--

INSERT INTO `subastas` (`id_subasta`, `titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`, `precio_inicial`, `precio_actual`, `estado`, `id_usuario`, `id_objeto`) VALUES
(46, 'Anillo egipcio', 'antiguo egipto', '2023-06-04', '2023-06-04', 123, 12325, 'finalizada', 5, 46),
(47, 'prueba', 'hjifhreh', '2023-06-04', '2023-06-06', 123123, 123123, 'activa', 5, 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `contrasenia` varchar(50) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `telefono` int(9) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contrasenia`, `apellidos`, `correo`, `direccion`, `telefono`, `rol`) VALUES
(2, 'daniel', 'admin123', 'flores perez', 'danielfloresperez@gmail.com', 'Av estacion 38 4?A', 620665716, 'admin'),
(3, 'a', 'a', '', '', '', 0, ''),
(4, 'alicia', 'MIAMOR', '', '', '', 0, ''),
(5, 'admin', 'admin', '', '', '', 0, ''),
(6, 'nuevo', 'lala', '', '', '', 0, ''),
(7, 'admina', 'lala', '', '', '', 0, ''),
(8, 'pepes', 'lalas', '', '', '', 0, ''),
(9, 'abc', 'ongi', 'prueba', '', '', 0, ''),
(10, 'abc', 'ongi', 'prueba', '', '', 0, ''),
(11, 'pepis', '11', 'papa', '', '', 0, ''),
(12, 'finalUser', 'pepes', 'pepitos', 'pepitodelocos@gmail.com', 'zafra', 123123123, ''),
(13, 'prueba', 'lala', 'el ongis', 'pepitos@gmail.com', 'zafra', 620667699, ''),
(14, 'fdrfre', 'aa', 'frefre', 'fref', 'frfre', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `objetos`
--
ALTER TABLE `objetos`
  ADD PRIMARY KEY (`id_objeto`),
  ADD KEY `id_propietario` (`id_propietario`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`id_peticion`);

--
-- Indices de la tabla `pujas`
--
ALTER TABLE `pujas`
  ADD PRIMARY KEY (`id_puja`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_subasta` (`id_subasta`);

--
-- Indices de la tabla `subastas`
--
ALTER TABLE `subastas`
  ADD PRIMARY KEY (`id_subasta`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_objeto` (`id_objeto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `objetos`
--
ALTER TABLE `objetos`
  MODIFY `id_objeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id_peticion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pujas`
--
ALTER TABLE `pujas`
  MODIFY `id_puja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `subastas`
--
ALTER TABLE `subastas`
  MODIFY `id_subasta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `objetos`
--
ALTER TABLE `objetos`
  ADD CONSTRAINT `objetos_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pujas`
--
ALTER TABLE `pujas`
  ADD CONSTRAINT `pujas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pujas_ibfk_2` FOREIGN KEY (`id_subasta`) REFERENCES `subastas` (`id_subasta`);

--
-- Filtros para la tabla `subastas`
--
ALTER TABLE `subastas`
  ADD CONSTRAINT `subastas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `subastas_ibfk_2` FOREIGN KEY (`id_objeto`) REFERENCES `objetos` (`id_objeto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
