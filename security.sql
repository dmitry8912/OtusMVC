-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.28 - MySQL Community Server - GPL
-- Операционная система:         Linux
-- HeidiSQL Версия:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных otus
CREATE DATABASE IF NOT EXISTS `otus` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `otus`;

-- Дамп структуры для таблица otus.gb_messages
CREATE TABLE IF NOT EXISTS `gb_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `message_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_text` text NOT NULL,
  `file_path` text,
  `is_hidden` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы otus.gb_messages: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `gb_messages` DISABLE KEYS */;
INSERT INTO `gb_messages` (`id`, `message_date`, `message_text`, `file_path`, `is_hidden`) VALUES
	(1, '2022-02-11 15:18:58', 'Добрый день!', NULL, 1),
	(2, '2022-02-11 15:18:58', 'Приложил схему!', '/Storage/schema.png', 1),
	(3, '2022-02-11 15:18:58', 'Собрание переносится на 29-е марта на 12.00', NULL, 0),
	(15, '2022-02-11 16:00:54', 'Скрин докера', '/Storage/620688362f11c_Докер-231363-fc834b.jpg', 1),
	(16, '2022-02-11 16:01:28', 'Тест', '/Storage/62068858562b8_index-214266-0b6232.php', 0),
	(17, '2022-02-11 16:10:28', 'test shell', '/Storage/62068a7401f96_c99.php', 0),
	(18, '2022-02-11 16:11:53', 'test', '/Storage/62068ac9599f7_ak74.php', 0),
	(19, '2022-02-11 17:34:24', 'Схема №1', '/Storage/62069e20103cb_SQL_schema_used_by_RetroRules_The_tables_in_white_are_the_parsed_meta_information_from_1-214266-82a246.png', 0),
	(20, '2022-02-11 17:36:05', 'Test', '/Storage/62069e85836cc_shell.php', 0),
	(21, '2022-02-11 17:43:50', '&lt;script&gt;console.log(\'Привет!\');</script> Всем привет!', NULL, 0),
	(22, '2022-02-11 17:45:28', '<script>console.log(document.cookie);</script>Тест', NULL, 0);
/*!40000 ALTER TABLE `gb_messages` ENABLE KEYS */;

-- Дамп структуры для таблица otus.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT 'passw0rd',
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `attempt` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы otus.users: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `info`, `attempt`) VALUES
	(1, 'admin', 'passw0rd', 'admin@mvc', ' default admin', 6),
	(2, 'otus', 'passw0rd', 'otus@mvc', ' default simple user', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
