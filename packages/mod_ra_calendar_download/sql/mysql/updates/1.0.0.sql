DROP TABLE IF EXISTS `#__ra_groups`;

CREATE TABLE IF NOT EXISTS `#__ra_groups` (
	`id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`code` char(4) NOT NULL ,
	`name` char(80) NOT NULL ,
	`description` varchar(100) AS (CONCAT(TRIM(code), ':', TRIM(name)))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


