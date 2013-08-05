<?php

	/***********************************		config.php		***********************************
		Setup required by each PHP file to run.
	 **********************************************************************************************/

	// Connect to the database, using PHP PDO and the $_SERVER parameters provided by Engine Yard (https://support.cloud.engineyard.com/entries/23505431-Deploy-Your-PHP-Application-on-Engine-Yard-Cloud#variables)
	$db = new PDO('mysql:host='  . $_SERVER['DB_HOST'] . ';dbname=' . $_SERVER['DB_NAME'] , $_SERVER['DB_USER'], $_SERVER['DB_PASS'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	// Set the default timezone to avoid E_WARNINGs about using the system's default timezone.
	date_default_timezone_set("America/Los_Angeles");

	// Require the file created by Composer to load all dependencies
	require("../vendor/autoload.php");

?>