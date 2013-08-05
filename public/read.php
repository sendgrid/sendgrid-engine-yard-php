<?php

	/***********************************		read.php		***********************************
		Display the emails that have been send to the app.
	 **********************************************************************************************/

	// Require the Configuration file that sets up the database and default timezones.
	require("../config/config.php");

	/*** RETRIEVE THE EMAIL ***/
	// Prepare the database statement used to find an email.
	$email_select = $db->prepare("SELECT * FROM `emails` WHERE `id` = ?");
	// Execute the statement
	$email_select->execute(array($_GET['id']));
	// Fetch the records as a PHP Array
	$emails = $email_select->fetchAll();
	// Grab the first (and only row, this is our email)
	$email = $emails[0];

	// The rest of the PHP just echos various parts of the email.

?><html>
	<head>
		<title><?php echo $email['from']; ?> to <?php echo $email['to']; ?> | Open Emails</title>
		<link href="//fonts.googleapis.com/css?family=Averia+Serif+Libre:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<link rel="stylesheet" src="//cdnjs.cloudflare.com/ajax/libs/normalize/2.1.0/normalize.min.css" />
		<style>
			body {
				background: #ede8c0;
				font-family: 'Averia Serif Libre', serif;
				font-size: 18px;
				padding: 10px;
			}
			h1 {
				float: left;
				max-width: 200px;
				padding: 0 40px 0 20px;
				font-size: 40px;
			}
			h1 span {
				display: block;
			}
			h1 .open {
				font-size: 55px;
			}
			.info {
				padding-top: 45px;
				padding-bottom: 10px;
				border-bottom: 1px solid #ccc7a7;
			}
			.info p {
				margin: 2px 0;
			}
			article {
				float: left;
				max-width: 600px;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<h1>
				<span class="open">Open</span>
				<span class="emails">Emails</span>
			</h1>
			<article>
				<div class="info">
					<p>
						<strong>To:</strong>
						<?php echo $email['to']; ?>
					</p>
					<p>
						<strong>From:</strong>
						<?php echo $email['from']; ?>
					</p>
					<p>
						<strong>Date:</strong>
						<?php echo date("r", $email['date']); ?>
					</p>
				</div>
				<div class="email">
					<?php echo $email['email']; ?>
				</div>
			</article>
		</div>
	</body>
</html>