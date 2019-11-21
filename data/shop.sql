-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 21 2019 г., 18:36
-- Версия сервера: 8.0.15
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`) VALUES
(155, 'aok3d80enfslu35p6rub8f3785rdohi3', 5),
(156, 'lv89v5e61bqv71dc32e8o59o6c9mvlqh', 6),
(157, 'lv89v5e61bqv71dc32e8o59o6c9mvlqh', 6),
(158, 'a1j87jnm967rhjon29clq7asmmls84ld', 5),
(159, 'a1j87jnm967rhjon29clq7asmmls84ld', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_shop`
--

CREATE TABLE `orders_shop` (
  `id` int(64) NOT NULL,
  `session_id` varchar(64) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(64) NOT NULL,
  `status_order` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'В обработке'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders_shop`
--

INSERT INTO `orders_shop` (`id`, `session_id`, `name`, `phone`, `status_order`) VALUES
(13, 'aok3d80enfslu35p6rub8f3785rdohi3', 'a', 'a', 'Собирается'),
(14, 'lv89v5e61bqv71dc32e8o59o6c9mvlqh', 's', 's', 'Выполнен'),
(15, 'a1j87jnm967rhjon29clq7asmmls84ld', 'a', 'd', 'Собирается');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(5, 'Спички', 'Отличные охотничьи спички', 12, 'matches.png'),
(6, 'Метла', 'Метла обыкновенная', 32, 'metla.png'),
(7, 'Ведро', 'Ведро пластиковое', 5, 'vedro-plastik.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'admin', '123'),
(2, 'user', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders_shop`
--
ALTER TABLE `orders_shop`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT для таблицы `orders_shop`
--
ALTER TABLE `orders_shop`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
