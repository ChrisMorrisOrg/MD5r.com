DROP TABLE IF EXISTS `dictionary`;

CREATE TABLE `dictionary` (
  `dict_string` TEXT NOT NULL,
  `dict_hash` char(32) NOT NULL,
  `dict_datecreated` datetime NOT NULL,
  `dict_hashes` int(8) unsigned NOT NULL DEFAULT '0',
  `dict_cracks` int(8) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
