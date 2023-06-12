-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2023 г., 02:34
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `social`
--

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `name` varchar(355) NOT NULL,
  `text` varchar(355) NOT NULL,
  `img` varchar(355) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `author_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `name`, `text`, `img`, `author_id`) VALUES
(73, 'mromms', 'jkhjkhkjkhjkhjkhjk', 'img/1.jpg', 10),
(75, 'lovuitt', 'gdgdfgdfg', 'img/computer-icons-icon-design-avatar-png-favpng-X29r5WhWMXVYvNsYXkR4iBgwf.jpg', 11),
(76, 'killler', 'yoyoyyo', 'img/1.jpg', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(355) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES
(1, 'Романов Сергей Максимович', 'rmvsrg2', 'minelaunter@gmail.com', '12345', 'uploads/1686363971a.jpg'),
(2, 'Михаил Иванович Шишкин', 'misha', 'gangyyy@mail.ru', '1234', 'uploads/1686350007ривг.jpg'),
(8, 'Романов Сергей Максимович', 'killler', 'sergey@gmail.com', '123', 'uploads/1686540992computer-icons-icon-design-avatar-png-favpng-X29r5WhWMXVYvNsYXkR4iBgwf.jpg'),
(9, 'Анатолий Иванович Шишкин', 'bwc', 'hui@gmail.com', '123', 'uploads/1686352578a.jpg'),
(10, 'Романова Мария Сергеевна', 'mromms', 'bunte@mail.ru', '123445', 'uploads/168658261773306fde93058ef9fd27771ae1356d0d.jpg'),
(11, 'Жирный Владимир Владимирович', 'lovuitt', 'vovandermort&@gmail.com', '12345', 'uploads/1686540958photo_2023-06-12_03-39-52.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
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
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
