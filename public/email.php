<?php

	/***********************************		email.php		***********************************
		Stores emails recieved from the SendGrid Parse Webhook and responds with their URL. 
	 **********************************************************************************************/

	// Require the Configuration file that sets up the database and default timezones.
	require("../config/config.php");

	/*** STORE THE EMAIL ***/
	// Prepare the database statement used to create a new email.
	$email_insert = $db->prepare("INSERT INTO `emails` (`to`, `from`, `date`, `email`) VALUES(?,?,?,?)");
	// Filter out all but basic formatting tags from the HTML email.
	$email = strip_tags($_POST['html'], '<p><a><b><strong><i><em><code><pre><br><div><ul><ol><li><small><large>');
	// Insert the email into the database.
	$email_insert->execute(array($_POST['to'], $_POST['from'], time(), $email));

	/*** CREATE THE REFERENCE URL ***/
	// Get the record's ID, this will be used to reference the email to displaying it.
	$email_id = $db->lastInsertId();
	// Get the hostname of the instance. As Engine Yard is built on Amazon Web Services, we can use the AWS internal endpoint to get an instance's public hostname
	$hostname = file_get_contents("http://169.254.169.254/latest/meta-data/public-hostname");
	// From the hostname and ID, make a reference url
	$url = "http://" . $hostname . "/read.php?id=" . $email_id;

	/*** RESPOND TO THE SENDER ***/
	// Initialize SendGrid, using custom enviroment variables (https://support.cloud.engineyard.com/entries/23505431-Deploy-Your-PHP-Application-on-Engine-Yard-Cloud#variables)
	$sendgrid = new SendGrid($_SERVER['SENDGRID_USERNAME'], $_SERVER['SENDGRID_PASSWORD']);
	// Create a new SendGrid Mail object
	$mail = new SendGrid\Mail();
	$mail->addTo($_POST['from'])->
	       setFrom('nick@sendgrid.com')->
	       setSubject('re: ' . $_POST['from'])->
	       setHtml('Hi-- <p>Thanks for using Open Emails! You can now find your open letter on <a href="' . $url . '">the web</a>.</p>');

	// Send the email through SendGrid's SMTP server
	$sendgrid->smtp->send($mail);

?>