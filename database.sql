-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Апр 21 2025 г., 22:15
-- Версия сервера: 8.2.0
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chart_type`
--

CREATE TABLE `chart_type` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `chart_type`
--

INSERT INTO `chart_type` (`id`, `name`) VALUES
(1, 'аннуитетный'),
(2, 'дифференцированный');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `client_type_id` int NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `client_type`
--

CREATE TABLE `client_type` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `entity` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `client_type`
--

INSERT INTO `client_type` (`id`, `name`, `entity`) VALUES
(1, 'физическое лицо', 'user'),
(2, 'юридическое лицо', 'legal_entities');

-- --------------------------------------------------------

--
-- Структура таблицы `credit`
--

CREATE TABLE `credit` (
  `client_id` int NOT NULL,
  `open` date NOT NULL,
  `close` date NOT NULL,
  `chart_type_id` int NOT NULL,
  `amount` float NOT NULL,
  `credit_period` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `deposits`
--

CREATE TABLE `deposits` (
  `client_id` int NOT NULL,
  `open` date NOT NULL,
  `close` date NOT NULL,
  `deposit_period` int NOT NULL,
  `bit` float NOT NULL,
  `сapitalization_type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `head_company`
--

CREATE TABLE `head_company` (
  `id` int NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `inn` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `legal_entities`
--

CREATE TABLE `legal_entities` (
  `client_id` int NOT NULL,
  `head_company_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `ogrn` bigint NOT NULL,
  `inn` bigint NOT NULL,
  `kpp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `natural_person`
--

CREATE TABLE `natural_person` (
  `client_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `product_type`
--

CREATE TABLE `product_type` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `entity` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `entity`) VALUES
(1, 'кредит', 'credit'),
(2, 'вклад', 'deposits');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `inn` bigint NOT NULL,
  `date_birth` date NOT NULL,
  `passport_series` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passport_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passport_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `сapitalization_type`
--

CREATE TABLE `сapitalization_type` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `сapitalization_type`
--

INSERT INTO `сapitalization_type` (`id`, `name`) VALUES
(1, 'в конце срока'),
(2, 'ежемесячно');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chart_type`
--
ALTER TABLE `chart_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_id` (`id`),
  ADD UNIQUE KEY `client_id_2` (`id`),
  ADD KEY `client_type_id` (`client_type_id`);

--
-- Индексы таблицы `client_type`
--
ALTER TABLE `client_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entity` (`entity`);

--
-- Индексы таблицы `credit`
--
ALTER TABLE `credit`
  ADD UNIQUE KEY `client_id` (`client_id`),
  ADD KEY `payment_type_id` (`chart_type_id`);

--
-- Индексы таблицы `deposits`
--
ALTER TABLE `deposits`
  ADD UNIQUE KEY `client_id` (`client_id`),
  ADD KEY `сapitalization_type_id` (`сapitalization_type_id`);

--
-- Индексы таблицы `head_company`
--
ALTER TABLE `head_company`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `legal_entities`
--
ALTER TABLE `legal_entities`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `ogrn` (`ogrn`),
  ADD UNIQUE KEY `inn` (`inn`),
  ADD UNIQUE KEY `client_id` (`client_id`),
  ADD KEY `head_company_id` (`head_company_id`);

--
-- Индексы таблицы `natural_person`
--
ALTER TABLE `natural_person`
  ADD UNIQUE KEY `client_id` (`client_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entity` (`entity`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inn` (`inn`);

--
-- Индексы таблицы `сapitalization_type`
--
ALTER TABLE `сapitalization_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chart_type`
--
ALTER TABLE `chart_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `client_type`
--
ALTER TABLE `client_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `head_company`
--
ALTER TABLE `head_company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `сapitalization_type`
--
ALTER TABLE `сapitalization_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`client_type_id`) REFERENCES `client_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `credit_ibfk_1` FOREIGN KEY (`chart_type_id`) REFERENCES `chart_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`сapitalization_type_id`) REFERENCES `сapitalization_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `legal_entities`
--
ALTER TABLE `legal_entities`
  ADD CONSTRAINT `legal_entities_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `legal_entities_ibfk_3` FOREIGN KEY (`head_company_id`) REFERENCES `head_company` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `natural_person`
--
ALTER TABLE `natural_person`
  ADD CONSTRAINT `natural_person_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `natural_person_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
