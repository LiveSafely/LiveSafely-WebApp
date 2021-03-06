-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2021 a las 20:29:04
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `livesafely`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `descr` text NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `id_recipe` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `dosis` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `descr` text NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `id_doctor` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `diagnosis` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `descr` text NOT NULL,
  `date` date NOT NULL,
  `username` varchar(25) NOT NULL,
  `id_doctor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sickness`
--

CREATE TABLE `sickness` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `id_diseases` int(11) NOT NULL,
  `id_doctor` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `id_doctor` varchar(25) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(175) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `noJunta` varchar(50) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`name`, `lastname`, `username`, `id_doctor`, `password`, `email`, `dui`, `noJunta`, `age`, `type`, `status`) VALUES
('Esther', 'Lara', 'admin', NULL, '12345', 'esther@gmail.com', '78945612-3', NULL, 21, 0, 1),
('Brenda', 'Guerrero', 'brendaguerrero9', 'dagrg27', '12345', 'brendague9@gmail.com', '32165498-7', NULL, 20, 2, 1),
('Daniel', 'Gomez', 'dagrg27', NULL, '12345', 'dagrg27@gmail.com', '12345678-9', NULL, 29, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recip` (`id_recipe`);

--
-- Indices de la tabla `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_places` (`username`);

--
-- Indices de la tabla `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pac` (`username`),
  ADD KEY `fk_doc` (`id_doctor`);

--
-- Indices de la tabla `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username` (`username`),
  ADD KEY `fk_iddoctor` (`id_doctor`);

--
-- Indices de la tabla `sickness`
--
ALTER TABLE `sickness`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`username`),
  ADD KEY `fk_id_diseases` (`id_diseases`),
  ADD KEY `fk_id_doctorS` (`id_doctor`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_doctor` (`id_doctor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sickness`
--
ALTER TABLE `sickness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `fk_recip` FOREIGN KEY (`id_recipe`) REFERENCES `recipe` (`id`);

--
-- Filtros para la tabla `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `fk_places` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Filtros para la tabla `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_doc` FOREIGN KEY (`id_doctor`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `fk_pac` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Filtros para la tabla `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `fk_iddoctor` FOREIGN KEY (`id_doctor`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Filtros para la tabla `sickness`
--
ALTER TABLE `sickness`
  ADD CONSTRAINT `fk_id_diseases` FOREIGN KEY (`id_diseases`) REFERENCES `diseases` (`id`),
  ADD CONSTRAINT `fk_id_doctorS` FOREIGN KEY (`id_doctor`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_doctor` FOREIGN KEY (`id_doctor`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
