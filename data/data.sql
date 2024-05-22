-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2024 a las 00:30:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `data`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `trajectID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `totalTime` time NOT NULL,
  `batterieFin` float NOT NULL,
  `remarques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trajets`
--

CREATE TABLE `trajets` (
  `trajecID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateInit` datetime NOT NULL,
  `dateEnd` datetime NOT NULL,
  `batterieNecesaire` float NOT NULL,
  `coordsInit` int(11) NOT NULL,
  `Titre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `nom` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `prenom` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `datenaissance` date NOT NULL,
  `numetudiant` int(8) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nbrUtilisations` int(11) NOT NULL DEFAULT 0,
  `formation` tinyint(1) DEFAULT NULL,
  `heureOperation` time DEFAULT NULL,
  `emailVerification` tinyint(1) DEFAULT NULL,
  `lastLogin` datetime NOT NULL,
  `dateCreation` datetime NOT NULL,
  `avatar` int(11) NOT NULL DEFAULT 1,
  `numeroTel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userID`, `nom`, `prenom`, `datenaissance`, `numetudiant`, `email`, `password`, `nbrUtilisations`, `formation`, `heureOperation`, `emailVerification`, `lastLogin`, `dateCreation`, `avatar`, `numeroTel`) VALUES
(1, 'Alexandru', 'Carp', '2005-10-25', 22301574, 'acarpmihai2005@gmail.com', '$2y$10$aGtpEPemU5EPIdJoKgqoyeM.Q9m52ruDPep/jdty52WjmDW5et/n6', 0, NULL, NULL, NULL, '2024-05-23 00:26:15', '2024-05-23 00:24:56', 1, '0670496227');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `trajets`
--
ALTER TABLE `trajets`
  ADD UNIQUE KEY `trajectID` (`trajecID`,`coordsInit`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_numetudiant` (`numetudiant`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
