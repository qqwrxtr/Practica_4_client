-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 08 2023 г., 21:53
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `igor`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `password`, `admin`) VALUES
(1, 'Teodor', 'teodorghirba1@gmail.com', '$2y$10$xB.WYB6BphT2H/KgLnMCIO8DmdALr02Ur85Q4CA9gRGX5l..BNVAe', 1),
(2, 'Teodor', 'teodorghirba1@gmail.com', '$2y$10$6XonsOD9yRwgQ/53PYvQk.4XKYsXafstYJJQMGGMUE5lBd4wKaAMe', 0),
(3, 'Teodor', 'teodorghirba@gmail.com', '$2y$10$WS0eFdbyD1OigEvl9ZEhq.XUnmnAeAUG6D6NUN2UqBiBlNXUnYDfu', 0),
(4, 'Teodor', 'teodorghirba1@gmail.com', '$2y$10$pdIp78unFFZEedjl8V2Xu.ArxICotGyt/LndY92LP6J5SCsgVPCbO', 0),
(5, 'Teodor', 'teodorghirba1@gmail.com', '$2y$10$gMyGrYiM3its./In.cdcT.4L/C6nM56LfE6xg5yQqVkeuFMWJWmOS', 0),
(6, 'Teodor', 'asd@gmail.com', '$2y$10$/HdF5PFdwtNIHC/Fd03en.Ce7bzmisQWwZwxM.ciGbpvrdMidbelG', 0),
(7, 'Teodorica', 'teodorghirba1@gmail.com', '$2y$10$T/EnV7Ypn5qS6lImyPkQTOMK7MJcWPwETyAqUsW7Q.62pDHXsNCXK', 0),
(8, 'NoName', 'aaaaaa@gmail.com', '$2y$10$6j1q6nT9F4tgaFXju./CUeqRB9pHfRMwGujI.5uc6u.fPNMLgX4ze', 1),
(9, 'Bugatinca', 'asddsa@gmail.com', '$2y$10$U6Ma726dDPckf9jV4YwaJuDa0bBsog44yZWhuEqGE1pz5xfzWPyIi', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `rating`, `price`) VALUES
(1, 'Puma Model S-WOMEN', '/igor/images/products/product-1.webp', 4, 1212.50),
(2, 'Puma Model S-MEN', '/igor/images/products/product-2.webp', 5, 1420.50),
(3, 'Versace Model T-WOMEN', '/igor/images/products/product-3.webp', 3, 999.90),
(4, 'Versace Model T-MEN', '/igor/images/products/product-4.webp', 5, 1500.00),
(5, 'Jacket Nike L-WOMEN', '/igor/images/products/product-5.webp', 5, 2050.70),
(6, 'Nike Model A-WOMEN', '/igor/images/products/product-6.webp', 5, 1700.00),
(7, 'LV Model P-MEN', '/igor/images/products/product-7.webp', 5, 2000.00),
(8, 'Adidas Model B-MEN', '/igor/images/products/product-8.webp', 5, 1200.00),
(10, 'Joric ananas', '/igor/images/products/product-14.webp', 1, 3500.00);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
