-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.3.22-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5958
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица sport.dolzhnost
CREATE TABLE IF NOT EXISTS `dolzhnost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Должность тренера';

-- Дамп данных таблицы sport.dolzhnost: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `dolzhnost` DISABLE KEYS */;
INSERT INTO `dolzhnost` (`id`, `name`) VALUES
	(1, 'Тренер'),
	(2, 'Жетекші'),
	(3, 'Куратор'),
	(4, 'Директор'),
	(5, 'Директор орынбасары'),
	(6, 'Жетекшінің көмекшісі');
/*!40000 ALTER TABLE `dolzhnost` ENABLE KEYS */;

-- Дамп структуры для таблица sport.history
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) DEFAULT NULL COMMENT '1 - вход в систему, 2 - выход из системы, 3 - создание папки, 4 - удаление папки, 5 - создание файла',
  `comment` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='История';

-- Дамп данных таблицы sport.history: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;

-- Дамп структуры для таблица sport.pol
CREATE TABLE IF NOT EXISTS `pol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- Дамп данных таблицы sport.pol: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `pol` DISABLE KEYS */;
INSERT INTO `pol` (`id`, `name`) VALUES
	(1, 'Ер'),
	(2, 'Әйел');
/*!40000 ALTER TABLE `pol` ENABLE KEYS */;

-- Дамп структуры для таблица sport.rang
CREATE TABLE IF NOT EXISTS `rang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT COMMENT='Ранг соревнования';

-- Дамп данных таблицы sport.rang: ~13 rows (приблизительно)
/*!40000 ALTER TABLE `rang` DISABLE KEYS */;
INSERT INTO `rang` (`id`, `name`) VALUES
	(1, 'Муниципалитеттің ресми спорттық жарыстары'),
	(5, 'ҚР субъектісінің ресми спорт жарыстары'),
	(6, 'ҚР субъект біріншілігі'),
	(7, 'ҚР субъект кубогі'),
	(8, 'ҚР субъект чемпионаты'),
	(9, 'Облыс біріншілігі'),
	(11, 'ETUC құрамына кіретін басқа да спорттық жарыстар'),
	(12, 'Қазақстан чемпионаты'),
	(13, 'Қазақстан кубогы'),
	(14, 'Қазақстан біріншілігі'),
	(15, 'Олимпиядалық ойындар'),
	(16, 'Европа чемпионаты'),
	(17, 'Әлем чемпионаты');
/*!40000 ALTER TABLE `rang` ENABLE KEYS */;

-- Дамп структуры для таблица sport.razryad
CREATE TABLE IF NOT EXISTS `razryad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT COMMENT='Разряд тренера';

-- Дамп данных таблицы sport.razryad: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `razryad` DISABLE KEYS */;
INSERT INTO `razryad` (`id`, `name`) VALUES
	(1, '1-ші жастар санаты'),
	(2, '2-ші жастар санаты'),
	(3, '3-ші жастар санаты'),
	(4, '3-ші спорттық'),
	(5, '2-ші спорттық'),
	(6, '1-ші спорттық'),
	(7, 'Спорт шеберлігіне үміткер'),
	(8, 'Спорт шебері'),
	(9, 'Халықаралық спорт шебері'),
	(10, 'Еңбек сіңірген спорт шебері');
/*!40000 ALTER TABLE `razryad` ENABLE KEYS */;

-- Дамп структуры для таблица sport.sostav
CREATE TABLE IF NOT EXISTS `sostav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inn` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_rozhdenia` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adres` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shkola` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `klass` int(2) DEFAULT NULL,
  `pol` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ves` int(3) DEFAULT NULL,
  `data_zachisleniya` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razryad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medosmostr` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primechanie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- Дамп данных таблицы sport.sostav: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `sostav` DISABLE KEYS */;
INSERT INTO `sostav` (`id`, `fio`, `inn`, `data_rozhdenia`, `telefon`, `adres`, `shkola`, `klass`, `pol`, `ves`, `data_zachisleniya`, `razryad`, `sport`, `medosmostr`, `primechanie`, `created_at`, `updated_at`) VALUES
	(3, 'Аманжолов Болат Тимурұлы', '010301500111', '01.03.2001', '+77774055881', 'Нұр-Сұлтан қаласы', '-', 4, 'Ер', 67, '06.02.2022', '1-ші спорттық', 'Жүзу', '01.02.2022', '-', 1649307013, 1649307013),
	(4, 'Аралбай Әлихан Сәкенұлы', '010502500608', '02.05.2001', '+77477504277', 'Нұр-Сұлтан қаласы', '-', 4, 'Ер', 55, '05.09.2021', 'Спорт шеберлігіне үміткер', 'Үлкен теннис', '25.08.2021', '-', 1649309200, 1649309200),
	(5, 'Есетов Бернар Жанатұлы', '010827500734', '27.08.2001', '+77777976601', 'Нұр-Сұлтан қаласы', '-', 4, 'Ер', 81, '17.10.2021', '2-ші спорттық', 'Ауыр атлетика', '05.10.2021', '-', 1649309252, 1649309252),
	(6, 'Әбілқасым Нұрдәулет Ғаниұлы', '001128550940', '28.11.2000', '+77003627176', 'Нұр-Сұлтан қаласы', '-', 4, 'Ер', 57, '08.02.2022', 'Спорт шебері', 'Футбол', '03.02.2022', '-', 1649309236, 1649309236),
	(7, 'Сәтбек Медеу Бақытбекұлы', '010301500111', '01.03.2001', '+77779965797', 'Нұр-Сұлтан қаласы', '-', 4, 'Ер', 79, '30.03.2022', '1-ші жастар санаты', 'Хоккей', '27.03.2022', '-', 1649306889, 1649306889),
	(8, 'Тоқтарбай Диас Талғатұлы', '010414500025', '14.04.2001', '+77472649553', 'Нұр-Сұлтан қаласы', '-', 4, 'Ер', 69, '19.07.2021', 'Спорт шебері', 'Жеңіл атлетика', '11.07.2021', '-', 1649309316, 1649309316),
	(9, 'Аяпбергенов Рустам Болатбекұлы', '010811500320', '11.08.2001', '+77752079217', 'Нұр-Сұлтан қаласы', '-', 4, 'Ер', 52, '22.07.2020', '1-ші жастар санаты', 'Баскетбол', '11.01.2022', '-', 1649309215, 1649309215),
	(10, 'Саттаров Арлан Русланұлы', '000216501181', '16.02.2000', '+77074377477', 'Нұр-Сұлтан қаласы', '-', 4, 'Ер', 80, '20.01.2022', 'Халықаралық спорт шебері', 'Жауынгерлік самбо', '12.01.2022', '-', 1649309301, 1649309301),
	(11, 'Жүнісов Темірлан Азаматұлы', '010609550993', '09.06.2001', '+77074841941', 'Нұр-Сұлтан қаласы', '-', 4, 'Ер', 64, '01.08.2021', '2-ші жастар санаты', 'Дзюдо', '28.07.2021', '-', 1649309270, 1649309270),
	(12, 'Ыдырысов Елдар Нұрединұлы', '001122501213', '22.11.2000', '+77473405782', 'Нұр-Сұлтан қаласы', '-', 4, 'Ер', 63, '20.03.2022', '2-ші жастар санаты', 'Тхэквондо', '17.03.2022', '-', 1649309331, 1649309331);
/*!40000 ALTER TABLE `sostav` ENABLE KEYS */;

-- Дамп структуры для таблица sport.sovernovaniya
CREATE TABLE IF NOT EXISTS `sovernovaniya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_nachala` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_okonchaniya` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naimenovanie` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mesto_provedeniya` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolichestvo_uchastnikov` int(3) DEFAULT NULL,
  `vid_sporta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rang_sorevnovaniya` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primechanie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- Дамп данных таблицы sport.sovernovaniya: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `sovernovaniya` DISABLE KEYS */;
INSERT INTO `sovernovaniya` (`id`, `data_nachala`, `data_okonchaniya`, `naimenovanie`, `mesto_provedeniya`, `kolichestvo_uchastnikov`, `vid_sporta`, `rang_sorevnovaniya`, `primechanie`, `created_at`, `updated_at`) VALUES
	(2, '17.07.2022', '28.07.2022', 'Ауыр атлетика бойынша Қарағанды облыс біріншілігі', 'Қарағанды қаласы', 250, 'Ауыр атлетика', 'Облыс біріншілігі', '-', 1649309587, 1649309587),
	(3, '29.05.2022', '02.06.2022', 'Тхэквандо бойынша ҚР чемпионаты', 'Ақтөбе қаласы', 50, 'Тхэквондо', 'Қазақстан чемпионаты', '-', 1649309530, 1649309530),
	(4, '07.08.2022', '25.08.2022', 'Жүзу бойынша ҚР кубогі', 'Алматы қаласы', 100, 'Жүзу', 'Қазақстан кубогы', '-', 1649309625, 1649309625),
	(5, '02.10.2022', '27.10.2022', 'Футбол бойынша ҚР чемпионаты', 'Семей қаласы', 350, 'Футбол', 'Қазақстан чемпионаты', '-', 1649309684, 1649309684),
	(6, '19.06.2022', '30.06.2022', 'Үлкен теннис бойынша ҚР біріншілігі', 'Нұр-Сұлтан қаласы', 160, 'Үлкен теннис', 'Қазақстан біріншілігі', '-', 1649309731, 1649309731),
	(7, '06.03.2022', '17.03.2022', 'Баскетбол бойынша Ақтау облысының біріншілігі', 'Ақтау қаласы', 100, 'Баскетбол', 'Облыс біріншілігі', '-', 1649309794, 1649309794),
	(8, '02.05.2022', '12.05.2022', 'Самбо бойынша ҚР субъект кубогі', 'Нұр-Сұлтан қаласы', 100, 'Самбо', 'ҚР субъект кубогі', '-', 1649309474, 1649309474);
/*!40000 ALTER TABLE `sovernovaniya` ENABLE KEYS */;

-- Дамп структуры для таблица sport.sport
CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT COMMENT='Вид спорта';

-- Дамп данных таблицы sport.sport: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `sport` DISABLE KEYS */;
INSERT INTO `sport` (`id`, `name`) VALUES
	(1, 'Жауынгерлік самбо'),
	(2, 'Дзюдо'),
	(3, 'Полиатлон'),
	(4, 'Самбо'),
	(5, 'Тхэквондо'),
	(6, 'Хоккей'),
	(7, 'Көркем гимнастика'),
	(8, 'Футбол'),
	(9, 'Баскетбол'),
	(10, 'Үлкен теннис'),
	(11, 'Үстел теннисі'),
	(12, 'Жеңіл атлетика'),
	(13, 'Ауыр атлетика'),
	(14, 'Жүзу');
/*!40000 ALTER TABLE `sport` ENABLE KEYS */;

-- Дамп структуры для таблица sport.tiptrenera
CREATE TABLE IF NOT EXISTS `tiptrenera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- Дамп данных таблицы sport.tiptrenera: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `tiptrenera` DISABLE KEYS */;
INSERT INTO `tiptrenera` (`id`, `name`) VALUES
	(1, 'Жауынгерлік самбо тренері'),
	(2, 'Самбо тренері'),
	(11, 'Полиатлон тренері'),
	(12, 'Хоккей тренері'),
	(13, 'Тхэквондо тренері'),
	(14, 'Көркем гимнастика тренері'),
	(15, 'Дзюдо тренері'),
	(16, 'Ауыр атлетика тренері'),
	(17, 'Футбол тренері'),
	(18, 'Жүзу тренері');
/*!40000 ALTER TABLE `tiptrenera` ENABLE KEYS */;

-- Дамп структуры для таблица sport.trener
CREATE TABLE IF NOT EXISTS `trener` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inn` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_rozhdenia` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stazh` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adres` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tip_trenera` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dolzhnost` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razryad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primechanie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы sport.trener: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `trener` DISABLE KEYS */;
INSERT INTO `trener` (`id`, `fio`, `inn`, `data_rozhdenia`, `stazh`, `telefon`, `adres`, `tip_trenera`, `dolzhnost`, `sport`, `razryad`, `primechanie`, `created_at`, `updated_at`) VALUES
	(2, 'Бакишев Олжас Талғатұлы', '790720350508', '20.07.1979', '18.11.2008', '+77472675373', 'Нұр-Сұлтан қаласы', 'Дзюдо тренері', 'Тренер', 'Дзюдо', 'Спорт шебері', '-', 1649304088, 1649304088),
	(3, 'Хамзин Дәулет Азатұлы', '850307319112', '07.03.1985', '27.02.2012', '+77078649618', 'Нұр-Сұлтан қаласы', 'Жүзу тренері', 'Куратор', 'Жүзу', 'Спорт шеберлігіне үміткер', '-', 1649304587, 1649304587),
	(4, 'Жұмағұлов Айбол Есболұлы', '760429325601', '29.04.1976', '20.03.2002', '+77082291716', 'Нұр-Сұлтан қаласы', 'Тхэквондо тренері', 'Тренер', 'Тхэквондо', 'Еңбек сіңірген спорт шебері', '-', 1649304634, 1649304634),
	(5, 'Оразбаев Мади Талғатұлы', '870105318495', '05.01.1987', '24.09.2012', '+77025003653', 'Нұр-Сұлтан қаласы', 'Самбо тренері', 'Жетекші', 'Самбо', '3-ші спорттық', '-', 1649304694, 1649304694),
	(6, 'Жарболов Дәурен Маратұлы', '830831320972', '31.08.1983', '11.06.2015', '+77756191383', 'Нұр-Сұлтан қаласы', 'Жауынгерлік самбо тренері', 'Тренер', 'Жауынгерлік самбо', 'Еңбек сіңірген спорт шебері', '-', 1649304923, 1649304923),
	(7, 'Жақсыбаев Тагир Саматұлы', '790313350218', '13.03.1979', '04.07.2011', '+77071465203', 'Нұр-Сұлтан қаласы', 'Ауыр атлетика тренері', 'Директор', 'Ауыр атлетика', 'Халықаралық спорт шебері', '-', 1649305841, 1649305841),
	(8, 'Оспанов Ербол Абылайұлы', '851008351216', '08.10.1985', '25.03.2014', '+77086847783', 'Нұр-Сұлтан қаласы', 'Полиатлон тренері', 'Тренер', 'Полиатлон', 'Спорт шеберлігіне үміткер', '-', 1649305002, 1649305002);
/*!40000 ALTER TABLE `trener` ENABLE KEYS */;

-- Дамп структуры для таблица sport.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT 1,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `fio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `avatar_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  UNIQUE KEY `password_reset_token` (`password_reset_token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Пользователи';

-- Дамп данных таблицы sport.user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `fio`, `is_admin`, `avatar_path`) VALUES
	(1, 'admin', '8xEYBzQtfUclipwcuWwI92bcO6A2w6T_', '$2y$13$CnqAQjCAwMHJwdxh9hG7GuPiax1W7hRhSB8pOjPT/4i0IBOlrHeiO', 'rUyjsfNPaRnPQp4IlWE2f3Znu4VwMwRb_1512444966', 'a@mail.ru', 1, 1649305002, 1649305002, 'Даужанов Арман', 1, '/uploads/avatars/canva-robot-electric-avatar-icon-MAB6v043Ud8.png');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
