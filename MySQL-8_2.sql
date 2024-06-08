-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Июн 06 2024 г., 00:40
-- Версия сервера: 8.2.0
-- Версия PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `room-bd`
--
CREATE DATABASE IF NOT EXISTS `room-bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `room-bd`;

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` varchar(20) NOT NULL,
  `members` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD UNIQUE KEY `id` (`id`);
--
-- База данных: `users-bd`
--
CREATE DATABASE IF NOT EXISTS `users-bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `users-bd`;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `login`) VALUES
(14, 'Аянами Рей2', '15b85247dd93a9fd7b792f718e7f9daf6d32a46fd2067dab65f6d7a92f36ccee', 'ayanami2'),
(13, 'Аянами Рей1', '15b85247dd93a9fd7b792f718e7f9daf6d32a46fd2067dab65f6d7a92f36ccee', 'ayanami1'),
(12, 'Аянами Рей', '15b85247dd93a9fd7b792f718e7f9daf6d32a46fd2067dab65f6d7a92f36ccee', 'ayanami'),
(15, 'Аянами Рей3', '15b85247dd93a9fd7b792f718e7f9daf6d32a46fd2067dab65f6d7a92f36ccee', 'ayanami3'),
(16, 'Аянами Рей4', '15b85247dd93a9fd7b792f718e7f9daf6d32a46fd2067dab65f6d7a92f36ccee', 'ayanami4'),
(17, 'Аянами Рей5', '15b85247dd93a9fd7b792f718e7f9daf6d32a46fd2067dab65f6d7a92f36ccee', 'ayanami5');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
