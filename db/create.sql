/***********************************			create.sql			***********************************
	Creates database tables if they do not already exist.
 ******************************************************************************************************/
CREATE TABLE IF NOT EXISTS
	emails
	(
		`to` TINYTEXT,
		`from` TINYTEXT,
		`date` int(11),
		`email` TEXT,
		`id` int(11) NOT NULL auto_increment,
		primary KEY (`id`)
	);