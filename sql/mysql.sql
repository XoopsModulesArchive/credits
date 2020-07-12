-- Tabulky ------------------------------------------------

CREATE TABLE `credits` (
  `id` int(1) NOT NULL ,
  `header` text,
  `text` text,
  `date` varchar(10),
	`html` varchar(1) NOT NULL default '0',
	`smiley` varchar(1) NOT NULL default '1',
	`xcodes` varchar(1) NOT NULL default '1',
	`breaks` varchar(1) NOT NULL default '1',
	`images` varchar(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

-- Naplneni tabulek daty ----------------------------------

INSERT INTO `credits` VALUES ('1' ,'O webu','Sem napište povídání o tom, co je váš web zač, proč vznikl a tak podobně.', '0','1','1','1','1','1');
INSERT INTO `credits` VALUES ('2' ,'Použité technologie','Sem napište povídání o tom, jaké technologie váš web používá.', '0','1','1','1','1','1');
INSERT INTO `credits` VALUES ('3' ,'Další informace','Sem napiště nějaké další informace o svém webu.', '0','1','1','1','1','1');