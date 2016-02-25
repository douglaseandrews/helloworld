<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1DTD/xhtml-strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
		<meta name = "format-detection" content = "telephone=yes">
		<title>Hello World Error</title>
	</head>
	<body>
		An error occured.<br><br>
		<?php
		if (!empty($_GET['error']))
		{
			echo"<hr>";
			$err=stripslashes($_GET['error']);	
			echo "<font color = 'darkred'>" . $err . "</font>";
		}
		?>
	</body>
</html>

