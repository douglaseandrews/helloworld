<?php
	function sqlResult($msql,$returnResult)
	{
		try
		{
			if ($returnResult == true)
				return sqlResultProcess($msql,$returnResult);
			sqlResultProcess($msql,$returnResult);
		}
		catch (Exception $e)
		{
			header("Location: error.php?error=An exception occurred.<br>Error code:<br>" . $e->getMessage());
			exit;
		}
	}

	function sqlResultProcess($msql,$returnResult)
	{
		$ip = "127.0.0.1";
	    $port =	"3306";
	    $uname = "jtest";
	    $upass = "jtest";
	    $db = "jtest";
	    
	    $DBConnect = @mysql_connect($ip . ":" . $port,$uname,$upass);		
		if($DBConnect==FALSE)
		{
			unset($_SESSION['db']);
			header("Location: error.php?error=Unable to connect to database.<br>Error code " . mysql_errno() . ": " . mysql_error());
			exit;
		}
		$result=mysql_select_db($db,$DBConnect);
		if ($result == FALSE)
		{
			unset($_SESSION['db']);
			header("Location: error.php?error=Unable to select database.<br>Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect));
			mysql_close($DBConnect);
			exit;
		}
		$ret = array();	
		$QueryResult = @mysql_query($msql,$DBConnect);
		if ($QueryResult == FALSE) 
		{	
			header("Location: error.php?error=An SQL error occured.<br>Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect));
			mysql_close($DBConnect);
			exit;
		}
		if ($returnResult == true)
		{
			if (mysql_num_rows($QueryResult) > 0)
			{
				$counter = 0;
				while (($rec = mysql_fetch_row($QueryResult)) != false)
				{
					$ret[$counter] = $rec;
					$counter = $counter + 1;
				}
			}
		}
		return $ret;
	}
	
?>