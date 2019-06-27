-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.25 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп данных таблицы firmadovogor.archive: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `archive` DISABLE KEYS */;
INSERT INTO `archive` (`id_dogovor`, `status`, `data`) VALUES
	(12, 2, '2019-04-28'),
	(14, 1, '2019-05-01'),
	(7, 1, '2019-05-01'),
	(12, 1, '2019-05-01'),
	(15, 2, '2019-05-01'),
	(38, 3, '0000-00-00');
/*!40000 ALTER TABLE `archive` ENABLE KEYS */;

-- Дамп данных таблицы firmadovogor.dogovor: ~13 rows (приблизительно)
/*!40000 ALTER TABLE `dogovor` DISABLE KEYS */;
INSERT INTO `dogovor` (`id_d`, `id_firm`, `numberd`, `named`, `sumd`, `datastart`, `datafinish`, `avans`) VALUES
	(4, 9, 2, 'Telephone', 150000, '2019-04-01', '2019-04-30', 200),
	(6, 9, 4, 'Water', 50000, '2019-04-03', '2019-04-29', 500),
	(7, 13, 5, 'Gun', 500, '2019-04-05', '2019-05-04', 10),
	(12, 13, 6, 'Car', 100000, '2019-04-24', '2019-04-26', 200),
	(13, 11, 7, 'Moto', 150000, '2019-04-30', '2019-05-31', 200),
	(14, 1, 8, 'Name', 5000, '2019-05-01', '2019-05-08', 50),
	(15, 16, 9, 'Name', 50000, '2019-05-01', '2019-05-16', 50),
	(36, 17, 10, 'Name', 2000, '2019-05-09', '2019-05-10', 20),
	(37, 14, 11, 'Name', 20000, '2019-05-10', '2019-05-24', 20),
	(38, 2, 12, 'Name', 20000, '2019-05-09', '2019-05-17', 20340),
	(39, 2, 13, 'Name', 50000, '2019-05-09', '2019-05-16', 50),
	(40, 2, 14, 'Name', 2000, '2019-05-09', '2019-05-14', 10),
	(41, 2, 15, 'Name', 200000, '2019-05-11', '2019-05-31', 20);
/*!40000 ALTER TABLE `dogovor` ENABLE KEYS */;

-- Дамп данных таблицы firmadovogor.firm: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `firm` DISABLE KEYS */;
INSERT INTO `firm` (`id_firm`, `name`, `shef`, `address`, `status`) VALUES
	(1, 'dsf', 'sdfds', 'sdd', 0),
	(2, 'triolan', 'shoful kiril', 'kharkiv', 1),
	(9, 'Epam', 'Kirill', 'KhPI', 1),
	(10, 'Names', 'Name', 'Addres', 0),
	(11, 'Name', 'Director', 'Address', 1),
	(12, 'Name', 'Igor', 'Address', 1),
	(13, 'Vodafone', 'Bond', 'Groove Str', 0),
	(14, 'vvvvvv', 'nnnnn', 'bbbbb', 1),
	(15, 'Name', 'Director', 'Address', 1),
	(16, 'N', 'D', 'A', 1),
	(17, 'Name', 'Director', 'Address', 1),
	(18, 'Nam', 'Dir', 'Add', 1);
/*!40000 ALTER TABLE `firm` ENABLE KEYS */;

-- Дамп данных таблицы firmadovogor.stages: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `stages` DISABLE KEYS */;
INSERT INTO `stages` (`id_stages`, `id_dogovor`, `data`, `sum`, `number`, `finish`) VALUES
	(9, 40, '2019-05-09', 2000, 1, '2019-05-14'),
	(23, 41, '2019-05-11', 200000, 1, '0000-00-00'),
	(24, 41, '2019-05-11', 200, 2, '2019-05-16'),
	(25, 41, '2019-05-11', 200, 3, '2019-05-12');
/*!40000 ALTER TABLE `stages` ENABLE KEYS */;

-- Дамп данных таблицы firmadovogor.status: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id_status`, `name`) VALUES
	(1, 'deleted'),
	(2, 'finished'),
	(3, 'divorced');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Дамп данных таблицы firmadovogor.test: ~19 rows (приблизительно)
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` (`id`) VALUES
	(NULL),
	(NULL),
	(NULL),
	(2),
	(NULL),
	(NULL),
	(NULL),
	(9),
	(NULL),
	(9),
	(NULL),
	(4),
	(NULL),
	(NULL),
	(4),
	(NULL),
	(NULL),
	(NULL),
	(2);
/*!40000 ALTER TABLE `test` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
