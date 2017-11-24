# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.0.32-MariaDB-0+deb8u1)
# Datenbank: wmde_site
# Erstellt am: 2017-11-24 13:35:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) unsigned NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `url` varchar(250) NOT NULL DEFAULT '',
  `type` varchar(100) NOT NULL,
  `mime_type` varchar(100) NOT NULL,
  `checksum` char(32) DEFAULT '',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Unique index set on user_id+checksum instead of user_id+dirn';



# Export von Tabelle media_attachments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media_attachments`;

CREATE TABLE `media_attachments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `media_id` int(11) unsigned NOT NULL,
  `model` varchar(50) NOT NULL,
  `foreign_key` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `poly` (`model`,`foreign_key`),
  KEY `media_file` (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Export von Tabelle media_versions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media_versions`;

CREATE TABLE `media_versions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `media_id` int(11) unsigned NOT NULL,
  `url` varchar(250) NOT NULL DEFAULT '',
  `version` varchar(10) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `mime_type` varchar(100) NOT NULL,
  `checksum` char(32) DEFAULT '',
  `status` varchar(20) NOT NULL DEFAULT 'unknown',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`media_id`),
  KEY `media_id` (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Unique index set on user_id+checksum instead of user_id+dirn';



# Export von Tabelle team_members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team_members`;

CREATE TABLE `team_members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) unsigned NOT NULL,
  `order` int(11) unsigned DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `vita` text,
  `i18n_vita_en` text,
  `portrait_media_id` int(11) unsigned DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT NULL,
  `urls` varchar(250) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Export von Tabelle users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL DEFAULT '',
  `number` varchar(100) NOT NULL DEFAULT '',
  `session_key` varchar(250) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `auth_token` varchar(250) DEFAULT NULL,
  `reset_answer` varchar(250) DEFAULT NULL,
  `reset_token` varchar(250) DEFAULT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'user',
  `locale` varchar(5) DEFAULT 'de',
  `timezone` varchar(100) NOT NULL DEFAULT 'UTC',
  `country` char(2) DEFAULT NULL,
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_locked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_notified` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `number` (`number`),
  KEY `session_key` (`session_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
