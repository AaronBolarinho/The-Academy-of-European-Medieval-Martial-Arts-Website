<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();
	include_once 'library_IDValid.php';
	include_once 'library_DB.php';

	$order = '';
	if (isset($_GET['Order']))	{ $order = $_GET['Order']; }
	if (isset($_POST['Order']))	{ $order = $_POST['Order']; }

?>

<html>
<head>
	<link rel="stylesheet" href="css/default.css" type="text/css">
	<script type="text/javascript" src="library_main.js"></script>
</head>

<body bgcolor="white">
<center><table cellpadding="0" cellspacing="0" width="700" bgcolor="white">
<?php
		$full_date= date("d-m-Y");	
		$prev_resource = "11093";
		$i = 0;

		$LinkID=dbConnect($DB);
		$SQL = 'SELECT userID, resourceAccessed, access_date, accesses';
		$SQL .= ' FROM accessLog';
		$SQL .= ' ORDER BY resourceAccessed';

		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {

			$resource = $Line->resourceAccessed;
			$accesses = $Line->accesses;

			if ($prev_resource <> $resource)
				{ 
				$resource_array[$i] = $prev_resource.",".$total_accesses;
				$i++;
				$total_accesses = 0;
				$total_accesses = $total_accesses + $accesses;
				$prev_resource = $resource;

				// this is to take care of the next record should it be the last one in the table
				$resource_array[$i] = $prev_resource.",".$total_accesses;
				}
			else
				{ $total_accesses = $total_accesses + $accesses; }
		}

		$SQL = 'SELECT count(*) Count';
		$SQL .= ' FROM accessLog';
		$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			$total_accesses_cout = $Line->Count;
		}

		$array_length = count($resource_array);
		echo ('<center><table width="300"><caption>Resource accesses statistics ('.$full_date.')</caption><tr><th>Resource Accessed</th><th>Access Count&nbsp;</th></tr>');
		if ($order == "resource")
			{
			for ($i = 0; $i <= $array_length; $i++)
				{
				list($resource_accessed, $count) = split(',', $resource_array[$i]);
				echo ('<tr><td><div id="Data" align="left">'.$resource_accessed.'</div></td><td><div id="Data" align="center">'.$count.'</div></td></tr>');
				}
			}
		else
			{
			// decompose the original array into two separate arrays
			for ($i = 0; $i <= $array_length; $i++)
				{
				list($resource_accessed, $count) = split(',', $resource_array[$i]);
				$accessed_array[$i] = $count;
				$resource_accessed_array[$i] = $resource_accessed;
				}
			// sort on the count array
			rsort($accessed_array);
//			for ($i = 0; $i <= $array_length; $i++)
//				{
//				echo ('debug: listing of sorted accesses number: '.$i.', value of '.$accessed_array[$i]);
//				}

			// re-compose the array with the sorted array and the unsorted resource array
			$j = 0;

			for ($m = 0; $m <= $array_length; $m++) // for each element in the accessed array, find its counterpart (i.e. resource access array) by matching to count in resource_array
				{
				for ($i = 0; $i <= $array_length; $i++)
					{
					list($resource_accessed, $count) = split(',', $resource_array[$i]);
					if ($accessed_array[$m] == $count and $resource_accessed_array[$i] == $resource_accessed)
						{
						$found = 0;
						$m_array_length = count($sorted_resource_array);
						for ($x = 0; $x <= $m_array_length; $x++)
							{
							if ($sorted_resource_array[$x] == $resource_accessed)
							$found = 1;
							$x = $m_array_length +1;
							}
						if ($found == 0)
							{
							$sorted_resource_array[$j] = $resource_accessed.','.$count;
							$j++;
							echo ('<tr><td><div id="Data" align="left">'.$resource_accessed.'</div></td><td><div id="Data" align="center">'.$count.'</div></td></tr>');
							}
						}
					}
				}
			}

		echo ('<tr bgcolor="gray"><td colspan="2"><font face="arial,helvetica,sans-serif" size="-2" color="white"><b>Total number of accesses to date: </b>'.$total_accesses_cout.'</td></tr></table></center>');

		mysql_free_result($Result);
		dbClose($LinkID);
	echo ('<blockquote>');
	echo ('<p><font face="arial,helvetica,sans-serif" size="-1"><b>Note #1: </b>These statistics are an accumulation of accesses, and makes no distinction if a certain number of accesses are the result of testing the system.</font></p>');
	if ($order == "resource")
		{ echo ('<p><font face="arial,helvetica,sans-serif" size="-1"><b>Note #2: </b>The ordering of the log records can be changed by order from the highest accessed resource to the least by clicking <a href="library_Report_resources_distribution.php?Order=accesses"><b>here</b></a></p>'); }
	else
		{ echo ('<p><font face="arial,helvetica,sans-serif" size="-1"><b>Note #2: </b>The ordering of the log records can be changed by order by resource name by clicking <a href="library_Report_resources_distribution.php?Order=resource"><b>here</b></a></p>'); }
?>

	<br /><p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>
	</blockquote>
</body>
</html>
