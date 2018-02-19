-- Create syntax for TABLE 'content_blocks'
CREATE TABLE `content_blocks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) unsigned NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT '',
  `region` varchar(100) NOT NULL DEFAULT '',
  `value_text` text,
  `value_number` int(20) DEFAULT NULL,
  `value_money` int(20) DEFAULT NULL,
  `value_media_id` int(11) unsigned DEFAULT NULL,
  `is_published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `i18n_value_text_en` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'pages'
CREATE TABLE `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) unsigned NOT NULL,
  `site` varchar(50) DEFAULT NULL,
  `title` varchar(250) DEFAULT '',
  `body` text,
  `is_published` tinyint(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `i18n_title_en` varchar(250) DEFAULT '',
  `i18n_body_en` text,
  PRIMARY KEY (`id`),
  KEY `is_published` (`is_published`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `content_blocks` (`id`, `owner_id`, `type`, `region`, `value_text`, `value_number`, `value_money`, `value_media_id`, `is_published`, `created`, `modified`, `i18n_value_text_en`)
VALUES
	(1, 1, 'richtext', 'home.fields.support', '							<p>\n								Die freie Enzyklopädie Wikipedia wird von ehrenamtlichen Autorinnen und Autoren\n								geschrieben. Da es keine hauptamtliche Redaktion gibt, lebt die Wikipedia von der\n								Mitarbeit möglichst vieler Menschen. Aber die Zahl der aktiven Autorinnen und Autoren\n								geht zurück. Wenn sich auch in Zukunft immer weniger Menschen engagieren, könnten\n								Artikel nicht mehr aktuell gehalten werden – oder keine neuen entstehen.\n							</p>\n							<p>\n								Wir setzen uns deshalb dafür ein, dass die Wikipedia auch in Zukunft verlässlich,\n								umfassend und aktuell ist. Wir machen Menschen darauf aufmerksam, dass sie sich an der\n								Wikipedia beteiligen können und bieten Interessierten Hilfe und Einstiegsmöglichkeiten.\n							</p>\n							<p>\n								Alle Autorinnen und Autoren – ob neu oder schon langjährig aktiv – bestärken wir in\n								ihrem Engagement und stehen ihnen zur Seite, wenn es darum geht, ihre Pläne in die\n								Tat umzusetzen. Wir vergeben zum Beispiel Stipendien, helfen bei der Durchführung\n								von Workshops und Wettbewerben oder bieten technische Unterstützung.\n							</p>', NULL, NULL, NULL, 1, '2018-02-19 13:24:27', '2018-02-19 13:24:27', '<p>ads</p>'),
	(2, 1, 'richtext', 'home.fields.dev', '\n							<p>\n								Wenn wir heute etwas wissen wollen, schauen wir einfach im Internet nach. Anders als bei\n								einem gedruckten Lexikon brauchen wir für das Internet Software, damit dieses Wissen\n								überhaupt vernünftig angezeigt werden kann. Aber die digitale Umgebung entwickelt sich\n								rasant weiter.\n							</p>\n							<p>\n								Damit die Wikipedia auch in Zukunft benutzerfreundlich und für alle digital zugänglich\n								bleibt, bauen wir MediaWiki, die Software hinter der Wikipedia, immer weiter aus.\n							</p>\n							<p>\n								Außerdem entwickeln wir unsere freie Datenbank Wikidata, die Menschen auf der ganzen\n								Welt zum Beispiel an die fast 300 verschiedenen Sprachversionen von Wikipedia anbinden\n								können. Die Software hinter Wikidata ist so konzipiert, dass sie jederzeit und von allen\n								Interessierten auch außerhalb der Wikimedia-Welt Zugang zu unserer Datenbank bietet.\n							</p>\n', NULL, NULL, NULL, 1, '2018-02-19 13:24:35', '2018-02-19 13:24:35', ''),
	(3, 1, 'richtext', 'home.fields.know', '\n							<p>\n								Die Welt ist reich an Kulturgütern wie Büchern, Gemälden oder wissenschaftlichen\n								Arbeiten. Sie können von der Öffentlichkeit meist angesehen, aber nicht genutzt werden.\n								Selbst wenn sie beispielsweise in einem Museum ausgestellt sind, dürfen wir sie oft\n								nicht fotografieren und verwenden.\n							</p>\n							<p>\n								Öffentliche Güter gehören aus unserer Sicht in die Öffentlichkeit. Wir arbeiten daher mit\n								Bildungs-, Wissenschafts- und Kulturinstitutionen zusammen und befähigen sie, ihre Inhalte\n								unter eine freie Lizenz zu stellen. So können all diese Schätze frei weiterverwendet\n								werden – etwa für Unterrichtsmaterialien oder einen Blog.\n							</p>\n							<p>\n								Dafür braucht es einen geeigneten rechtlichen Rahmen. Wir wollen erreichen, dass Menschen\n								so leicht wie möglich ihr Wissen teilen können und es gemeinschaftlich genutzt werden\n								kann. Wir setzen uns aus diesem Grund für ein zeitgemäßes Urheberrecht ein, das die\n								Möglichkeiten des Internets nutzt, um Wissen zu verbreiten und zu vermehren.\n							</p>\n		', NULL, NULL, NULL, 1, '2018-02-19 13:24:38', '2018-02-19 13:24:38', '');

	INSERT INTO `content_blocks` (`id`, `owner_id`, `type`, `region`, `value_text`, `value_number`, `value_money`, `value_media_id`, `is_published`, `created`, `modified`, `i18n_value_text_en`)
VALUES
	(4, 1, 'richtext', 'home.vision', '				Unsere <strong>Vision</strong> ist eine Welt, in der\n				jeder Mensch am Wissen der Mensch­heit teilhaben, es nutzen und mehren\n				kann.\n', NULL, NULL, NULL, 1, '2018-02-19 13:56:53', '2018-02-19 13:56:53', ''),
	(5, 1, 'richtext', 'home.mission', '\n				Wir setzen uns für Freies Wissen ein, um die Chancen­gleichheit beim Zu­gang zu Wissen\n				und Bildung zu fördern.\n', NULL, NULL, NULL, 1, '2018-02-19 14:02:46', '2018-02-19 14:02:49', '');
