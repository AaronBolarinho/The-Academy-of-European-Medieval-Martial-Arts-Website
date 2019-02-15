<?php
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';
?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
		<script type="text/javascript" src="main.js"></script>
	</head>

	<body align="center" valign="top">
		<table align="center" cellpadding="0" cellspacing="0">
		<tr>
			<?php
			$full_date= date("d-m-Y");	
			$year = substr($full_date, 6, 4); 
			echo ('<td><font face="arial,helvetica" size=2><b>The Royal Heraldry Society of Canada<br>Annual Statistics Analysis as of  <font color="red">'.$full_date.'</font></b><br>&nbsp;</td>');
			?>
		</tr>
		</table>

<p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>
	</body>
</html>
