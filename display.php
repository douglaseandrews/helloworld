<?php
	session_start(); 
	date_default_timezone_set("America/Detroit");
	include "db.php";
	$results = sqlResult("SELECT ADATE,FIRSTNAME,LASTNAME,ADDRESS1,ADDRESS2,CITY,STATE,ZIP FROM peep ORDER BY ADATE DESC",TRUE);	
	echo("<html><title>Hello World</title>");
	if (sizeof($results) < 1)
		echo("No results found.");
	else
	{
		echo("<table border = '1', cellspacing = '0', cellpadding = '2'>");
		 	echo("<tr><td NOWRAP>Date</td><td NOWRAP>First Name</td><td NOWRAP>Last Name</td><td NOWRAP>Address 1</td><td NOWRAP>Address 2</td><td NOWRAP>City</td><td NOWRAP>State</td><td NOWRAP>Zip</td></tr>");
			foreach ($results as $oneData)		 	
			{
				echo "<tr>";
				$val = $oneData[0];
				echo "<td NOWRAP valign='top'><font size=2>";
				echo date("m/d/y - h:i a", strtotime($val));
				echo "</font></td>";

				for ($counter = 1;$counter <= 7;$counter++)
				{
					$val = $oneData[$counter];
					echo "<td NOWRAP><font size=2>" . $val . "</font></td>";
				}			
				echo "</tr>";
			}
		echo("</table>");
	}
	echo("<br><br><a href='index.php'>Click Here</a> to enter more information.");
	echo("</html>");
?>




