DROP TABLE IF EXISTS `dictionary`;

CREATE TABLE `dictionary` (
  `dict_string` varchar(255) NOT NULL,
  `dict_hash` char(32) NOT NULL,
  `dict_datecreated` datetime NOT NULL,
  `dict_hashes` int(8) unsigned NOT NULL DEFAULT '0',
  `dict_cracks` int(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`dict_string`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
