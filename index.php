<?php
	session_start(); 
	date_default_timezone_set("America/Detroit");
	include "db.php";
	$err=null;
	if (!empty($_POST['submitbutton']))
	{
		validateData();		
		if (empty($err))
		{
			$myDate = date('Y-m-d H:i:s');			
			$sql = "INSERT INTO peep (ADATE,FIRSTNAME,LASTNAME,ADDRESS1,ADDRESS2,CITY,STATE,ZIP) VALUES (";
			$sql = $sql . "'" . $myDate . "',";
			$sql = $sql . "'" . myClean($_POST['firstname']) . "',";
			$sql = $sql . "'" . myClean($_POST['lastname']) . "',";
			$sql = $sql . "'" . myClean($_POST['address1']) . "',";
			$val=null;		
			if (!empty($_POST['address2']))
				$val = $_POST['address2'];
			if (empty($val) or strlen(trim($val)) < 1)
				$sql = $sql . "NULL,";
			else
				$sql = $sql . "'" . myClean($val) . "',";
			$sql = $sql . "'" . myClean($_POST['city']) . "',";
			$sql = $sql . "'" . myClean($_POST['state']) . "',";
			$sql = $sql . "'" . myClean($_POST['zip']) . "')";
			sqlResult($sql,FALSE);
			header("Location: confirmation.html");
		}
	}

	function myClean($mval)
	{
		$mval = stripslashes($mval);
		$mval = str_replace('"', "", $mval);
		$mval = str_replace("'", "", $mval);
		$mval = strtoupper($mval);
		return $mval;	
	}
	
	
	function validateData()
	{
		$val=null;		
		if (!empty($_POST['firstname']))
			$val = $_POST['firstname'];
		if (empty($val) or strlen(trim($val)) < 1)
		{
			$err = "<font color = 'darkred'>Please enter a first name.</font>";	
			return;
		}
		$val=null;		
		if (!empty($_POST['lastname']))
			$val = $_POST['lastname'];
		if (empty($val) or strlen(trim($val)) < 1)
		{
			$err = "<font color = 'darkred'>Please enter a last name.</font>";	
			return;
		}
		$val=null;		
		if (!empty($_POST['address1']))
			$val = $_POST['address1'];
		if (empty($val) or strlen(trim($val)) < 1)
		{
			$err = "<font color = 'darkred'>Please enter an address.</font>";	
			return;
		}
		$val=null;		
		if (!empty($_POST['city']))
			$val = $_POST['city'];
		if (empty($val) or strlen(trim($val)) < 1)
		{
			$err = "<font color = 'darkred'>Please enter a city.</font>";	
			return;
		}
		$val=null;		
		if (!empty($_POST['state']))
			$val = $_POST['state'];
		if (empty($val) or strlen(trim($val)) != 2)
		{
			$err = "<font color = 'darkred'>Please enter a valid state.</font>";	
			return;
		}
		$val=null;		
		if (!empty($_POST['zip']))
			$val = $_POST['zip'];
		if (empty($val) or !ctype_digit($val) or (strlen(trim($val)) != 5 and strlen(trim($val)) != 9))
		{
			$err = "<font color = 'darkred'>Please enter a valid zip code.</font>";	
			return;
		}
	}
?>
<html><title>Hello World</title>
	<script type="text/javascript" src = "validate.js"></script>
	<form action="index.php" name = "myForm" method="post">
		<table border = "0" cellspacing = "0" cellpadding = "1">
			<tr>
				<td><input type="submit" value="Submit" name="submitbutton" onclick="return validateForm();"></td>
				<td width = "15" />
				<td>
					<?php
						if (!empty($err))
							echo($err);
					?>
				</td>
			</tr>
		</table>
		<hr size = "1" />
		<table border = "0" cellspacing = "0" cellpadding = "0">
			<tr>
				<td>First Name</td>
				<td width = "10" />
				<td><input type="text" name="firstname" size = "35" maxLength = "100"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td/>
				<td><input type="text" name="lastname" size = "35" maxLength = "100"></td>
			</tr>
			<tr>
				<td>Address Line 1</td>
				<td/>
				<td><input type="text" name="address1" size = "35" maxLength = "100"></td>
			</tr>
			<tr>
				<td>Address Line 2</td>
				<td/>
				<td><input type="text" name="address2" size = "35" maxLength = "100"></td>
			</tr>
			<tr>
				<td>City</td>
				<td/>
				<td><input type="text" name="city" size = "35" maxLength = "100"></td>
			</tr>
			<tr>
				<td>State</td>
				<td/>
				<td><input type="text" name="state" size = "10" maxLength = "2"></td>
			</tr>
			<tr>
				<td>Zip</td>
				<td/>
				<td><input type="text" name="zip" size = "10" maxLength = "9"></td>
			</tr>
		</table>
	</form>
	<hr size = "1" />
	<a href="display.php">Click Here</a> to view previously entered information.
</html>



