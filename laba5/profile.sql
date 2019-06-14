-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 24 2019 г., 12:31
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `profile`
--

-- --------------------------------------------------------

--
-- Структура таблицы `main`
--

CREATE TABLE `main` (
  `Number` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `main`
--

INSERT INTO `main` (`Number`, `Name`, `Date`, `Mail`) VALUES
(1, 'Сапега Дмитрий Александрович', '1999-09-12', 'sapega.99di@gmail.com'),
(2, 'Норейко Артем Алексеевич', '2000-03-31', 'noreykoartem@gmail.com'),
(3, 'Голубцов Марк Витальевич', '2000-12-18', 'glmarkgl4@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `prof_add`
--

CREATE TABLE `prof_add` (
  `Number` int(11) NOT NULL,
  `Phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prof_add`
--

INSERT INTO `prof_add` (`Number`, `Phone`) VALUES
(1, '+375(29)716-73-89 '),
(2, '+375(33)638-16-40 '),
(3, '+375(29)184-50-78 ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`Number`),
  ADD UNIQUE KEY `Number` (`Number`),
  ADD UNIQUE KEY `Number_2` (`Number`);

--
-- Индексы таблицы `prof_add`
--
ALTER TABLE `prof_add`
  ADD PRIMARY KEY (`Number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
