ALTER TABLE `team_members` CHANGE `portrait_media_id` `cover_media_id` INT(11)  UNSIGNED  NULL  DEFAULT NULL;
CREATE TABLE `vacant_team_positions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) unsigned NOT NULL,
  `order` int(11) unsigned DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `locations` varchar(250) DEFAULT NULL,
  `teaser` text,
  `body` text,
  `is_published` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
