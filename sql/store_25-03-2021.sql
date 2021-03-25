-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2021 a las 13:55:08
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `store`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`) VALUES
(1, 'Electronics', 1),
(2, 'Computers', 1),
(3, 'Smart Home', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `details` longtext NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`image`)),
  `model` varchar(30) NOT NULL,
  `color` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` float NOT NULL,
  `last_price` float NOT NULL,
  `discount` float NOT NULL,
  `discount_status` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `fk_department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `details`, `image`, `model`, `color`, `quantity`, `price`, `last_price`, `discount`, `discount_status`, `status`, `fk_department_id`) VALUES
(1, 'Product 01', 'This is the first product', '<div class=\"col-12\">                 <h6 class=\"text-decoration-underline\">Haz una declaración de intenciones</h6>                 <p>Personaliza el Forerunner 45 para que sea un reflejo de ti. Es compatible con las pantallas de reloj gratuitas de nuestra tienda Connect IQ™. Elige entre miles de pantallas de reloj para descargar o crea una personalizada utilizando tus propias fotos.</p>                 <iframe class=\"w-100\" height=\"345\" src=\"https://www.youtube.com/embed/tgbNymZ7vqY\"></iframe>             </div>             <div class=\"col-12 mt-3\">                 <h6 class=\"text-decoration-underline\">Comparte y compite</h6>                 <p>Al sincronizar tus actividades con Garmin Connect, harás mucho más que guardar tus datos. Garmin Connect es una comunidad virtual de éxito a la que los usuarios pueden conectarse desde cualquier lugar y en la que pueden competir participando en desafíos, animarse unos a otros e incluso compartir sus triunfos en las redes sociales.</p>                 <p>Garmin Connect es gratuita y está disponible para ordenadores y smartphones.</p>             </div>', '', 'M1', 'Black', 10, 699.99, 789.99, 28, 1, 1, 1),
(2, 'Product 02', 'This is the second product', '<div class=\"col-12\">                 <h6 class=\"text-decoration-underline\">Haz una declaración de intenciones</h6>                 <p>Personaliza el Forerunner 45 para que sea un reflejo de ti. Es compatible con las pantallas de reloj gratuitas de nuestra tienda Connect IQ™. Elige entre miles de pantallas de reloj para descargar o crea una personalizada utilizando tus propias fotos.</p>                 <iframe class=\"w-100\" height=\"345\" src=\"https://www.youtube.com/embed/tgbNymZ7vqY\"></iframe>             </div>             <div class=\"col-12 mt-3\">                 <h6 class=\"text-decoration-underline\">Comparte y compite</h6>                 <p>Al sincronizar tus actividades con Garmin Connect, harás mucho más que guardar tus datos. Garmin Connect es una comunidad virtual de éxito a la que los usuarios pueden conectarse desde cualquier lugar y en la que pueden competir participando en desafíos, animarse unos a otros e incluso compartir sus triunfos en las redes sociales.</p>                 <p>Garmin Connect es gratuita y está disponible para ordenadores y smartphones.</p>             </div>', '', 'M2', 'Yellow', 7, 599.99, 649.99, 45, 1, 1, 1),
(3, 'Product 03', 'This is the third product', '', '', 'M3', 'Green', 10, 399.99, 399.99, 0, 0, 1, 1),
(4, 'Producto 4', 'Description product 4', 'This is a detail product 4', '{     \"glossary\": {         \"title\": \"example glossary\", 		\"GlossDiv\": {             \"title\": \"S\", 			\"GlossList\": {                 \"GlossEntry\": {                     \"ID\": \"SGML\", 					\"SortAs\": \"SGML\", 					\"GlossTerm\": \"Standard Generalized Markup Language\", 					\"Acronym\": \"SGML\", 					\"Abbrev\": \"ISO 8879:1986\", 					\"GlossDef\": {                         \"para\": \"A meta-markup language, used to create markup languages such as DocBook.\", 						\"GlossSeeAlso\": [\"GML\", \"XML\"]                     }, 					\"GlossSee\": \"markup\"                 }             }         }     } }', 'sadfasfd', 'Black', 5, 110.99, 0, 11, 0, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Consumer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(400) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `fk_role_id` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `fk_role_id`) VALUES
(3, 'Admin', 'admin@prueba.com', '$2y$10$ZrERiH9c5vI2FWE5QJzxG.Duc9owwDqqp5GWogS8I2DAdgrlAQRS.', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_department_id` (`fk_department_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_id` (`fk_role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`fk_department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
