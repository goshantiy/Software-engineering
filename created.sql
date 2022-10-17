-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 17 2022 г., 14:31
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `created`
--

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE `content` (
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `release_name` varchar(200) DEFAULT NULL,
  `song_name` varchar(200) NOT NULL,
  `cover_path` varchar(200) DEFAULT NULL,
  `audio_path` varchar(200) NOT NULL DEFAULT '/created/default/default_cover.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`user_id`, `content_id`, `author`, `release_name`, `song_name`, `cover_path`, `audio_path`) VALUES
(16, 33, 'Rammstein', 'Reise, Reise', '05 - Rammstein - Los.mp3', '/created/music/author/Rammstein/Front.jpg', '/created/music/author/Rammstein/05 - Rammstein - Los.mp3'),
(16, 34, 'Rammstein', 'Reise, Reise', '00 - Rammstein - Boeing 747 .mp3', '/created/music/author/Rammstein/Front.jpg', '/created/music/author/Rammstein/00 - Rammstein - Boeing 747 (Japan Airlines Flight 123) (Hidden Intro).mp3'),
(16, 35, 'Rammstein', 'Reise, Reise', '01 - Rammstein - Reise, Reise.mp3', '/created/music/author/Rammstein/Front.jpg', '/created/music/author/Rammstein/01 - Rammstein - Reise, Reise.mp3'),
(16, 36, 'Rammstein', 'Reise, Reise', '02 - Rammstein - Mein Teil.mp3', '/created/music/author/Rammstein/Front.jpg', '/created/music/author/Rammstein/02 - Rammstein - Mein Teil.mp3'),
(16, 37, 'Rammstein', 'Reise, Reise', '03 - Rammstein - Dalai Lama.mp3', '/created/music/author/Rammstein/Front.jpg', '/created/music/author/Rammstein/03 - Rammstein - Dalai Lama.mp3'),
(16, 38, 'Rammstein', 'Reise, Reise', '04 - Rammstein - Keine Lust.mp3', '/created/music/author/Rammstein/Front.jpg', '/created/music/author/Rammstein/04 - Rammstein - Keine Lust.mp3'),
(16, 39, 'Rammstein', 'Rosenrot', '01 - Rammstein - Benzin.mp3', '/created/music/author/Rammstein/Front..jpg', '/created/music/author/Rammstein/01 - Rammstein - Benzin.mp3'),
(16, 40, 'Rammstein', 'Rosenrot', '02 - Rammstein - Mann Gegen Mann.mp3', '/created/music/author/Rammstein/Front..jpg', '/created/music/author/Rammstein/02 - Rammstein - Mann Gegen Mann.mp3'),
(16, 41, 'Rammstein', 'Rosenrot', '03 - Rammstein - Rosenrot.mp3', '/created/music/author/Rammstein/Front..jpg', '/created/music/author/Rammstein/03 - Rammstein - Rosenrot.mp3'),
(16, 42, 'Rammstein', 'Rosenrot', '04 - Rammstein - Spring.mp3', '/created/music/author/Rammstein/Front..jpg', '/created/music/author/Rammstein/04 - Rammstein - Spring.mp3'),
(16, 43, 'Rammstein', 'Rosenrot', '05 - Rammstein - Wo Bist Du.mp3', '/created/music/author/Rammstein/Front..jpg', '/created/music/author/Rammstein/05 - Rammstein - Wo Bist Du.mp3'),
(16, 44, 'System of a Down', 'Toxicity', '01 - System of a Down - Prison Song.mp3', '/created/music/author/System of a Down/Cover.jpg', '/created/music/author/System of a Down/01 - System of a Down - Prison Song.mp3'),
(16, 45, 'System of a Down', 'Toxicity', '02 - System of a Down - Needles.mp3', '/created/music/author/System of a Down/Cover.jpg', '/created/music/author/System of a Down/02 - System of a Down - Needles.mp3'),
(16, 46, 'System of a Down', 'Toxicity', '03 - System of a Down - Deer Dance.mp3', '/created/music/author/System of a Down/Cover.jpg', '/created/music/author/System of a Down/03 - System of a Down - Deer Dance.mp3'),
(16, 47, 'System of a Down', 'Toxicity', '04 - System of a Down - Jet Pilot.mp3', '/created/music/author/System of a Down/Cover.jpg', '/created/music/author/System of a Down/04 - System of a Down - Jet Pilot.mp3'),
(16, 48, 'System of a Down', 'Toxicity', '05 - System of a Down - X.mp3', '/created/music/author/System of a Down/Cover.jpg', '/created/music/author/System of a Down/05 - System of a Down - X.mp3'),
(16, 49, 'System of a Down', 'Toxicity', '06 - System of a Down - Chop Suey!.mp3', '/created/music/author/System of a Down/Cover.jpg', '/created/music/author/System of a Down/06 - System of a Down - Chop Suey!.mp3'),
(16, 55, 'Crystal Castles', 'Crystal Castles', '01 - Crystal Castles - Untrust Us.mp3', '/created/music/author/Crystal Castles/cover.jpg', '/created/music/author/Crystal Castles/01 - Crystal Castles - Untrust Us.mp3'),
(16, 56, 'Crystal Castles', 'Crystal Castles', '02 - Crystal Castles - Alice Practice.mp3', '/created/music/author/Crystal Castles/cover.jpg', '/created/music/author/Crystal Castles/02 - Crystal Castles - Alice Practice.mp3'),
(16, 57, 'Crystal Castles', 'Crystal Castles', '03 - Crystal Castles - Crimewave.mp3', '/created/music/author/Crystal Castles/cover.jpg', '/created/music/author/Crystal Castles/03 - Crystal Castles - Crimewave (Crystal Castles Vs. Health).mp3'),
(16, 58, 'Crystal Castles', 'Crystal Castles', '04 - Crystal Castles - Magic Spells.mp3', '/created/music/author/Crystal Castles/cover.jpg', '/created/music/author/Crystal Castles/04 - Crystal Castles - Magic Spells.mp3'),
(16, 59, 'Crystal Castles', 'Crystal Castles', '05 - Crystal Castles - XXZXCUZX Me.mp3', '/created/music/author/Crystal Castles/cover.jpg', '/created/music/author/Crystal Castles/05 - Crystal Castles - XXZXCUZX Me.mp3'),
(16, 60, 'Crystal Castles', 'Crystal Castles', '06 - Crystal Castles - Air War.mp3', '/created/music/author/Crystal Castles/cover.jpg', '/created/music/author/Crystal Castles/06 - Crystal Castles - Air War.mp3'),
(16, 61, 'Suuns', 'Hold/Still', '01 - Suuns - Fall.mp3', NULL, '/created/music/author/asdasdsa/01 - Suuns - Fall.mp3'),
(16, 63, 'Limp Bizkit', 'STILL SUCKS', 'Limp_Bizkit_Dad_Vibes.mp3', NULL, '/created/music/author/Limp Bizkit/Limp_Bizkit_Dad_Vibes.mp3');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `role_id` tinyint(4) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Пользователь'),
(2, 'Модератор'),
(3, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_email`, `user_name`, `password`, `role`) VALUES
(15, 'qweqwe', 'qwe@qwe.ru', 'qweqwe', 'qweqwe', 1),
(16, 'administrator', 'admin@admin.com', 'admin', 'administrator', 3),
(18, 'asdadsa', 'admin1@admin.com', 'asdadsa', 'asdadsa', 1),
(19, 'qweasd', 'qwe@qwe.ru', '', 'qweqwe', 1),
(22, 'iall4444', 'ex@gmail.com', 'ыаффаыфаы фаыфаыфаы афыфаы', '444444', 1),

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `role_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
