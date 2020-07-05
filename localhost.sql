-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `db_quiz3` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_quiz3`;

DROP TABLE IF EXISTS `artikel`;
CREATE TABLE `artikel` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `artikel_user_id_foreign` (`user_id`),
  CONSTRAINT `artikel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `artikel` (`id`, `judul`, `isi`, `slug`, `tag`, `user_id`) VALUES
(2,	'Kucing Garong',	'Kenapa kucing harus garong, jika garong harus jadi kucing. apakah kucing harus jadi garong?',	'kucing-garong',	'kucing, garong, sekali, lagi',	1),
(7,	'Buaya Darat',	'Kenapa buaya ada didarat, sedangkan darat belum tentu buaaya',	'buaya-darat',	'ikan, kodok, beruduk',	1),
(8,	'Kucing Garong',	'Asdfasfd',	'kucing-garong',	'a,b,c,d',	1);

DROP TABLE IF EXISTS `folower`;
CREATE TABLE `folower` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `folow_user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `folower_user_id_foreign` (`user_id`),
  KEY `folower_folow_user_id_foreign` (`folow_user_id`),
  CONSTRAINT `folower_folow_user_id_foreign` FOREIGN KEY (`folow_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `folower_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2020_07_05_032005_create_users_table',	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1,	'Delphi Babel',	'delphibabel@gmail.com',	'12345678');

-- 2020-07-05 10:47:44
