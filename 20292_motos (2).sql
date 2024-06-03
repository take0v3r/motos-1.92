-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 02 2024 г., 17:23
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `20292_motos`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `id` int(10) NOT NULL,
  `brand` varchar(1000) NOT NULL,
  `year` year(4) NOT NULL,
  `price` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`id`, `brand`, `year`, `price`, `description`, `image`) VALUES
(1, 'Kawasaki Ninja H2R', '2021', '5100000', 'Kawasaki H2R 2022 - это вершина инженерной мастерской и скоростных мечтаний. Этот мотоцикл представляет собой гармоничное сочетание ультрасовременных технологий и агрессивного дизайна. Сверхмощный 998-кубовый мотор с турбонаддувом обеспечивает адреналиновый уровень мощности, который вас поразит. Он создан, чтобы разбудить в вас страсть к скорости и сделать каждую поездку настоящим приключением. Kawasaki H2R 2022 - мечта каждого настоящего мотоциклиста, готового покорить дороги и трассы в полной мере.', 'static/img/product-1.png'),
(2, 'Yamaha YZF-R1', '2010', '2500000', 'Yamaha YZF-R1 2010 - это искусство в мире мотоспорта. Он объединяет в себе потрясающий дизайн и передовые технологии, предлагая вам уникальное водительское испытание. С мощным 998-кубовым мотором и передовой электроникой, YZF-R1 2010 представляет собой идеальное сочетание скорости и управляемости. Этот мотоцикл создан для тех, кто ищет невероятные ощущения на трассе и готов встретить вызов скорости. Yamaha YZF-R1 2010 - это воплощение страсти к мотоспорту.', 'static/img/product-2.png'),
(3, 'Honda CBR 500R', '2016', '1150000', 'Honda CBR 500R 2016 - это истинный символ сочетания мощности и элегантности. Снабженный надежным 471-кубовым двигателем и агрессивным спортивным дизайном, этот мотоцикл предоставляет идеальный баланс между маневренностью и производительностью. Независимо от того, на какой дороге вы оказались, CBR 500R 2016 года приносит удовольствие от вождения и притягивает взгляды своим стильным обликом. Готовьтесь к увлекательным поездкам с этим мотоциклом, который дарит вам мощь и эмоции в каждой мгновении.', 'static/img/product-3.png'),
(4, 'Harley-Davidson Sportster', '2021', '1550000', 'Harley-Davidson Sportster 2021 - это легендарный мотоцикл, который вобрал в себя более семидесяти лет истории и страсти. Он представляет собой слияние классического стиля и современных технологий, предлагая непередаваемые ощущения от вождения. С мощным двигателем и аутентичным дизайном, Sportster олицетворяет дух свободы и приключений на открытой дороге. Этот мотоцикл стал частью культуры и истории мотоциклизма, и владение им - это привилегия, которая приносит уважение к наследию Harley-Davidson.', 'static/img/product-4.png'),
(5, 'Kawasaki KX 450', '2022', '950000', 'Kawasaki KX 450 2023 - это мотоцикл, созданный для победителей и амбициозных мотокроссистов. Снабженный передовыми технологиями и мощным 449-кубовым двигателем, он готов вести вас к вершинам побед и адреналиновых приключений. Этот мотоцикл отличается прочной рамой, невероятной управляемостью и инновационными подвесками, что делает его идеальным выбором для профессионалов и начинающих гонщиков. Стремитесь к выдающимся результатам на трассе? Тогда Kawasaki KX 450 2023 - ваш надежный партнер на пути к успеху.', 'static/img/product-5.png'),
(6, 'Kawasaki Z650RS', '2022', '1600000', 'Kawasaki Z650RS 2022 - это яркий представитель класса мотоциклов, вдохновленных легендарными моделями прошлых десятилетий. Он сочетает в себе элегантный дизайн советских мотоциклов с современными технологиями и производительностью. Этот мотоцикл привносит дух ретро в мир современных дорог, предоставляя комфорт и надежность для повседневной езды. Если вы ищете байк с характером, который уважает прошлое и при этом готов к будущему, то Kawasaki Z650RS 2022 - ваш идеальный выбор.', 'static/img/product-6.png'),
(7, 'Yamaha Tracer 9GT', '2019', '1300000', 'Yamaha Tracer 9GT 2019 - это мотоцикл, который обещает незабываемые приключения на дорогах. С отличной мощностью, спортивной эргономикой и передовыми технологиями, этот мотоцикл предлагает комбинацию маневренности и комфорта для долгих поездок. Система управления тягой, усовершенствованная подвеска и современные фирменные решения от Yamaha делают Tracer 9GT идеальным спутником для исследования путей и горизонтов. Этот мотоцикл готов подарить вам свободу на дороге и приручит даже самые живописные трассы.', 'static/img/product-7.png'),
(8, 'BMW M1000RR', '2020', '5200000', 'BMW M1000RR 2020 - это мотоцикл, заряженный азартом и производительностью, созданный для настоящих ценителей скорости и адреналина. Он сочетает в себе передовые инженерные решения с долей страсти, что делает его мастером дорог и королем треков. С мощным 999-кубовым мотором, выдающейся подвеской и передовыми электронными системами управления, M1000RR предоставляет вам контроль над мгновениями, где каждая секунда имеет значение. Этот мотоцикл - это искусство баланса между стилем и скоростью, готовое подарить вам удовольствие от вождения на дороге и треке. BMW M1000RR 2020 - это мотоцикл, созданный для перфекционистов, которые стремятся к безупречности в мире двух колес.', 'static/img/product-8.png'),
(9, 'Ducati Panigale V.4', '2023', '6000000', 'Ducati Panigale V4 2023 - это мотоцикл, который переписывает правила производительности и стиля на двух колесах. С технологическими инновациями, унаследованными от мира мотогонок, и красивым итальянским дизайном, он представляет собой символ эволюции. Мощный 1103-кубовый двигатель, выдающаяся подвеска и передовые электронные системы создают уникальный опыт вождения. Panigale V4 2023 приглашает вас в мир, где страсть к мотоциклам сочетается с выдающейся производительностью, оживляя каждый поворот и прямую дорогу. Этот мотоцикл - это искусство движения, предназначенное для тех, кто стремится к совершенству на трассе и на улице. Ducati Panigale V4 2023 - это мастерство в искусстве и мощность на дороге.', 'static/img/product-9.png'),
(10, 'KTM 1290 Super Duke R', '2021', '1115000', 'KTM 1290 Super Duke R 2021 - это мотоцикл, который разделяет страсть к адреналину и максимальной производительности. Снабженный могучим 1,301-кубовым двигателем, передовой электроникой и агрессивным дизайном, этот байк создан для гонок и приключений. Он обладает уникальными характеристиками, которые делают его идеальным для тех, кто ищет выдающуюся производительность и контроль в мире мотоциклов. KTM 1290 Super Duke R 2021 - это воплощение скорости и адреналина, предлагая вам опыт, который вы не забудете.', 'static/img/product-10.png'),
(11, 'Suzuki GSR 750A', '2014', '650000', 'Suzuki GSR 750A 2014 - это мотоцикл, который идеально сочетает в себе элегантный дизайн и спортивную динамику. С мощным 750-кубовым двигателем и комфортабельной посадкой, он предоставляет незабываемые моменты удовольствия от вождения как на городских улицах, так и на живописных трассах. Этот мотоцикл - это искусно сбалансированный аппарат, который готов удовлетворить ваши потребности в маневренности и производительности. Suzuki GSR 750A 2014 - это идеальный выбор для тех, кто ищет универсальный и стильный мотоцикл.и и тропы, ведущие к неизведанным горизонтам. Стабильность на дороге и маневренность в разнообразных условиях - вот кредо V-STROM. Если вы мечтаете о путешествиях и приключениях, Suzuki V-STROM 2016 - ваш верный спутник в этом путешествии.', 'static/img/product-11.png'),
(12, 'Suzuki V-STORM', '2016', '770000', 'Suzuki V-STROM 2016 - это мотоцикл, созданный для любителей приключений и путешествий. С мощным двигателем, надежной рамой и просторными боковыми сумками, он обеспечивает идеальное сочетание мощности и комфорта для долгих поездок. Этот мотоцикл спроектирован, чтобы разблокировать дороги и тропы, ведущие к неизведанным горизонтам. Стабильность на дороге и маневренность в разнообразных условиях - вот кредо V-STROM. Если вы мечтаете о путешествиях и приключениях, Suzuki V-STROM 2016 - ваш верный спутник в этом путешествии.', 'static/img/product-12.png'),
(13, 'Honda VRF 800F', '2004', '540000', 'Honda VFR 800F 2004 - это мотоцикл, который переплетает в себе дух спорта и комфорт туринга. С мощным 800-кубовым двигателем и инновационной технологией VTEC, он обеспечивает исключительную производительность и маневренность. В то же время, комфортабельная сиденья и передовая аэродинамика делают каждую поездку комфортной и приятной. Honda VFR 800F 2004 - это мотоцикл, который спроектирован для тех, кто жаждет долгих путешествий и страсти к вождению на трассе. Этот байк объединяет в себе лучшие черты спортивных и туринговых мотоциклов, создавая уникальный опыт для вас.', 'static/img/product-13.png'),
(14, 'Yamaha FJR 1300', '2002', '450000', 'Yamaha FJR 1300 2002 - это мотоцикл, предназначенный для тех, кто ценит мощь и комфорт в долгих путешествиях. С мощным 1298-кубовым мотором, надежным шасси и продуманным дизайном, этот туринговый мотоцикл готов предложить невероятные ощущения и удобство во время долгих поездок. Удобное сиденье, продуманные эргономика и высокий уровень защиты делают каждое путешествие на Yamaha FJR 1300 2002 незабываемым. Этот мотоцикл создан для тех, кто мечтает о свободе на открытой дороге и готов взять с собой комфорт своего дома в каждое приключение.', 'static/img/product-14.png'),
(15, 'Ducati Streetfighter V4', '2018', '2800000', 'Ducati Streetfighter V4 2021 - это мотоцикл, который олицетворяет собой свободу и адреналин уличных гонок. С двигателем V4 от Panigale V4, этот мотоцикл приносит ультрасовременную производительность на улицы города. Его агрессивный дизайн и уникальны', 'static/img/product-15.png'),
(16, 'Triumph Bonneville T120', '2018', '1700000', 'Triumph Bonneville T120 - это иконический мотоцикл, который сочетает в себе ностальгию по золотой эре мотоциклизма с современными технологиями и надежностью. С красивым дизайном, вдохновленным легендарной Bonneville 1959 года, он удовлетворяет глубок', 'static/img/product-16.png');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `roles_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(3, '20274', '$2y$10$IsqKRhNucNyjzmT/vt6bQ.SIjdKOT/9rYbUkfKe0aRhJio8eKuA5q', 2),
(4, '20274', '$2y$10$8x/gBAzQDE0f5SP9jdl8Ee7S9HhHDyK4P3dg5KHkvWTgRQVLlL2me', 2),
(11, 'admin', '$2y$10$0e1hp3OZxiFy81qqeWVHf.I7QL/ucdXHE6987KXm3vrMlv6MhzlBC', 1),
(12, 'arab', '$2y$10$Cogd09QwSv/AhPgXrcN7/.dczJN1dnO0unj53BAcehutX3kOiWyCG', 2),
(13, 'coin', '$2y$10$EZndUhQms1F5nZan8wRzwuDokLtSOHoHkU4C.9xwocoXcwYX91p7a', 2),
(14, 'ilya', '$2y$10$keo8qCXNh/h710TGrETHI.KYNp9ME7hze6VBo8Mot2E0i0JywP5.O', 2),
(15, 'testuser', '$2y$10$MiM71RcVDTyu1toGRTCA2e9chl8RCK/xdoVcvY2ufbbAgE44sNyWi', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
--

CREATE TABLE `zakaz` (
  `id` int(11) NOT NULL,
  `FIO` varchar(55) NOT NULL,
  `car` varchar(100) NOT NULL,
  `license` int(10) NOT NULL,
  `datetime` datetime(6) DEFAULT NULL,
  `number` varchar(19) NOT NULL,
  `status` varchar(35) DEFAULT 'ожидание',
  `comments` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `zakaz`
--

INSERT INTO `zakaz` (`id`, `FIO`, `car`, `license`, `datetime`, `number`, `status`, `comments`, `user_id`) VALUES
(17, 'Араб', 'Ducati Panigale V.4', 2147483647, '2024-06-02 15:59:00.000000', '89149127674', 'ожидание', '', 13),
(18, 'Ilya T.', 'Kawasaki Ninja H2R', 2147483647, '2024-06-08 15:13:00.000000', '89149127674', 'Отменен пользователем', '', 13),
(19, 'Тигунцев Илья Юрьевич', 'Kawasaki Ninja H2R', 1111111111, '2024-06-17 18:00:00.000000', '89834009510', 'Отменен пользователем', 'Введенный номер В/У недействителен.', 14),
(20, 'Тигунцев Илья Юрьевич', 'Yamaha YZF-R1', 2147483647, '2024-06-18 09:00:00.000000', '89834009510', 'В ожидании', '', 14);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_role_id` (`role_id`);

--
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_zakaz_users` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD CONSTRAINT `fk_zakaz_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;