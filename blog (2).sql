-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 31 2019 г., 14:47
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `article_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `header`, `article_text`) VALUES
(1, 'Ученые нашли фрагмент письма инопланетянина', 'Ученые нашли фрагмент письма инопланетянина. Вы можете ознакомиться с ним:\r\nwereyhtjytkuyliu;oi\'p;ouligfkdjthsgrarstyduf yiy kjytretryuyiuouiyteyrytuyifutkyjthtjykui y;ilykjhrhjtkyulfy;iluktjrhrtrkytulyi;luktjthtjyktu kfydjthtjytkyjtrhrestjdjthjh,gfjtdhrghm,liyutydrhfxmhcg,h .kluktydjcfmhgj,hkhukygc hj,hlhukghm,lugyfktjdfch,j.kghj,gfjhrrjtk ydluflkdfgjhajskdlf;lk djtshajstkydlf;g;lfdksjahjskdlf;gfdjsfkdglfh;gjk.hj,mgn dfdngfmhc,gjvh.kb j/.hv,ghcmfxjklglyfyktdjrserjdkflg;ulfktdjtkflyktdjk hg,jfkhqwsdfgbnm,erftghjkl;;lkjhgfdsxcvbnmkl;\'\r\n\'lkjhgfdxc '),
(2, 'Над этой статьей я думал дольше,чем писал задачу', 'Над этой статьей я думал дольще,чем писал задачу. Но не придумал ничего лучше, чем: яяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяххххххххххххххххххххххззззззззззззззззззззз ооооооооооооооооооооооооооооооооооооооооооо\r\nчччччччччччччччеееееееееееееемммммммммммммм\r\nппппппппппппииииииииииииииисссссссссссссссааааааааааатттттттттттььььььььььь');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `article_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `email`, `text`, `time`) VALUES
(1, 1, 'feoctistov1580@yandex.ru', '200 IQ', '2019-02-24 15:29:50'),
(2, 1, 'feokt2006', 'lolo', '2019-02-24 16:19:01'),
(3, 2, 'KEK', 'ЗА ОРДУУУУУУУУ', '2019-02-24 16:20:33'),
(6, 2, 'feokt2006', 'dsfgfs', '2019-03-03 16:32:54'),
(8, 2, 'sdgfhdgjfh', 'lihjkgjfdhsgfasgshdjgfkhgjlhkfjgdhfsgafd', '2019-03-10 08:39:16'),
(9, 1, 'feokt2006', '<h1>lol</h1>', '2019-03-31 12:04:12');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
