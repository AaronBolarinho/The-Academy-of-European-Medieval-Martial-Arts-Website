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

	<body align="center" valign="top" bgcolor="white">
		<table align="center" cellpadding="0" cellspacing="0">
		<tr>
			<?php
			$full_date= date("d-m-Y");	
			$year = substr($full_date, 6, 4); 
			$year_short = substr($full_date, 8, 2); 
			$month = substr($full_date, 3, 2); 
			$lastYear = $year - 1;
			$lastYear_short = substr($lastYear, 2, 2); 
			echo ('<td><font face="arial,helvetica" size=2><b>Academy of European Medieval Martial Arts<br>Membership Summary as of  <font color="red">'.$full_date.'</font></b><br>&nbsp;</td>');
			?>
		</tr>
		</table>
		<table align="center" cellpadding="2" cellspacing="0" border=1 width=90%>
		<tr bgcolor="#003366">
			<?php
			echo ('<td colspan=2><font face="arial,helvetica" size=-2 color="white"><b>HISTORICAL MEMBERSHIP STATUS AS OF '.$lastYear.'</b></td>');
			?>
		</tr>
		<tr>
			<?php
			echo ('<td><font face="arial,helvetica" size=-2>Active Members</td>');
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT H.Year, H.Regular, H.Student, H.LifeHon, H.Institute, H.Institute_Ex, H.NewMembers, H.NonRenewals from History H';
			$SQL .= ' WHERE H.Year = '.$lastYear.'';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$his_Reg = $Line->Regular;
				$his_Stud = $Line->Student;
				$his_Life = $Line->LifeHon;
				$his_Ins = $Line->Institute;
				$his_InsEx = $Line->Institute_Ex;
				$New = $Line->NewMembers;
				$Non = $Line->NonRenewals; 
				}
			dbClose($LinkID);

				echo ('<td width="104"><center><font face="arial,helvetica" size=-2>' .$his_Reg. '</font></center></td>');
				echo ('</tr>');
				echo ('<tr>');
				echo ('<td><font face="arial,helvetica" size=-2>Student Members</td>');
				echo ('<td><center><font face="arial,helvetica" size=-2>' .$his_Stud. '</font></center></td>');
				echo ('</tr>');
				echo ('<tr>');
				echo ('<td><font face="arial,helvetica" size=-2>Life and Honorary Members</td>');
				echo ('<td><center><font face="arial,helvetica" size=-2>' .$his_Life. '</font></center></td>');
				echo ('</tr>');
				echo ('<tr>');
				echo ('<td><font face="arial,helvetica" size=-2>Institutional Members</td>');
				echo ('<td><center><font face="arial,helvetica" size=-2>' .$his_Ins. '</font></center></td>');
				echo ('</tr>');
				echo ('<tr>');
				echo ('<td><font face="arial,helvetica" size=-2>Institutional Members Exchange</td>');
				echo ('<td><center><font face="arial,helvetica" size=-2>' .$his_InsEx. '</font></center></td>');
				echo ('</tr>');
				echo ('<tr>');
				echo ('<td><font face="arial,helvetica" size=-2><b>Enrolled Membership</b> (membership base for '.$year.')</td>');

				$TotalBase = $his_Reg + $his_Stud + $his_Life + $his_Ins + $his_InsEx;

				echo ('<td><center><font face="arial,helvetica" size=-2><b>' .$TotalBase. '</b></font></center></td>');
				echo ('</tr>');
				echo ('<tr>');
				echo ('<td><font face="arial,helvetica" size=-2>New Members in '.$lastYear.'</td>');
				echo ('<td><center><font face="arial,helvetica" size=-2>' .$New. '</font></center></td>');
				echo ('</tr>');
				echo ('<tr>');
				echo ('<td><font face="arial,helvetica" size=-2>Non-renewals in '.$lastYear.'</td>');
				echo ('<td><center><font face="arial,helvetica" size=-2>' .$Non. '</font></center></td>');
				echo ('</tr>');
				echo ('<tr>');
				echo ('<td><font face="arial,helvetica" size=-2>&nbsp;&nbsp;&nbsp;&nbsp;Net Gain (Loss) in '.$lastYear.'</td>');
				$Total = $New - $Non;
				echo ('<td><center><font face="arial,helvetica" size=-2>' .$Total. '</font></center></td>');
				echo ('</tr>');
				?>
		</table>
		
		<table align="center" cellpadding="2" cellspacing="0" border=1 width=90%>
		<tr bgcolor="#003366">
			<td colspan=5><font face="arial,helvetica" size=-2 color="white"><b>MEMBERSHIP ACTIVITY TO DATE</b></td>
		</tr>
		<tr>
			<?php
			echo ('<td colspan=3><font face="arial,helvetica" size=-2><b>Membership Base, as of December 31, '.$lastYear.'</b></td>');
			echo ('<td width="50"><center><font face="arial,helvetica" size=-2><b>' .$TotalBase. '</b></font></center></td>');
			?>
			<td width="50" rowspan="4">&nbsp;</td>
		</tr>


		<tr>
			<td rowspan=3><font face="arial,helvetica" size=-2>Delete from base</td>
			<td><font face="arial,helvetica" size=-2>Deceased members</td>
			<td><font face="arial,helvetica" size=-2><i>
			<?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P, MemberType M';
			$SQL .= ' WHERE P.MemberType_ID = M.ID and (P.Deceased = 1 and P.Effective >= '.$lastYear.')';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) 
				{
				$count = $Line->Count;
				}

			$SQL  = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, M.Description FROM People P, MemberType M';
			$SQL .= ' WHERE P.MemberType_ID = M.ID and (P.Deceased = 1 and P.Effective >= '.$lastYear.')';
			$SQL .= ' ORDER BY P.LastName';
			$SQL = mysql_query($SQL, $LinkID);
			$loop_count = 1;
			while ($Line = mysql_fetch_object($SQL))
				{
				if ($loop_count <> $count)
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.' '.'(<b>'.$Line->Description.'</b>), ');
					$loop_count++;
					}
				else
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.' '.'(<b>'.$Line->Description.'</b>)');
					}
				}

			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.Deceased = 1 and P.Effective >= '.$lastYear;
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_deceased = $Line->Count;
			}

			// figure out recent deceased amongst the regular membership, if any
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.Effective >= '.$lastYear.' and P.Deceased = 1 and P.MemberType_ID = 1';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_reg_deceased = $Line->Count;
			}
			$curr_Reg = $his_Reg - $count_reg_deceased;
	
			// figure out resigned or lost amongst the regular membership, if any
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.Effective >= '.$lastYear.' and P.MemberType_ID = 1 and (P.MemberStatus_ID = 4 or P.MemberStatus_ID = 5)';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_reg_lost = $Line->Count;
			}
			$curr_Reg = $curr_Reg - $count_reg_lost;


			// figure out the distribution of deceased amongst the student membership, if any
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.Effective >= '.$lastYear.' and P.Deceased = 1 and P.MemberType_ID = 6';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_stud_deceased = $Line->Count;
			}
			$curr_Stud = $his_Stud - $count_stud_deceased;

 			// figure out resigned or lost amongst the student membership, if any
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.Effective >= '.$lastYear.' and P.MemberType_ID = 6 and (P.MemberStatus_ID = 4 or P.MemberStatus_ID = 5)';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_stud_lost = $Line->Count;
			}
			$curr_Stud = $curr_Stud - $count_stud_lost;

			// figure out the distribution of deceased amongst the honorary/life membership, if any
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.Deceased = 1 and  P.Effective >= '.$lastYear.' and  (P.MemberType_ID = 4 or P.MemberType_ID = 5)';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_life_deceased = $Line->Count;
			}
			$curr_Life = $his_Life - $count_life_deceased;

			// figure out resigned or lost amongst the honorary/life membership, if any
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE (P.MemberType_ID = 4 or P.MemberType_ID = 5) and (P.MemberStatus_ID = 4 or P.MemberStatus_ID = 5) and P.Deceased = 0';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_life_lost = $Line->Count;
			}
			$curr_Life = $curr_Life - $count_life_lost;


			// figure out resigned or lost amongst the institutional membership, if any
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.Effective >= '.$lastYear.' and P.MemberType_ID = 2 and (P.MemberStatus_ID = 4 or P.MemberStatus_ID = 5)';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_ins_lost = $Line->Count;
			}
			$curr_Ins = $his_Ins - $count_ins_lost;
			
			// figure out resigned or lost amongst the institutional-exchange membership, if any
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.Effective >= '.$lastYear.' and P.MemberType_ID = 3 and (P.MemberStatus_ID = 4 or P.MemberStatus_ID = 5)';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_insEx_lost = $Line->Count;
			}
			$curr_InsEx = $his_InsEx - $count_insEx_lost;
			
			dbClose($LinkID);
			echo ('</i></font></td><td><center><font face="arial,helvetica" size=-2>-' .$count_deceased. '</font></center>');
			$TotalNeg = $count_deceased;			
			?>
			</td>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Resigned</td>
			<td><font face="arial,helvetica" size=-2><i>
			<?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P, MemberType M ';
			$SQL .= ' WHERE P.MemberType_ID = M.ID and (P.Effective >= '.$lastYear.' and P.MemberStatus_ID = 4)';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) 
				{
				$count = $Line->Count;
				}

			$SQL  = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, M.Description FROM People P, MemberType M ';
			$SQL .= ' WHERE P.MemberType_ID = M.ID and (P.Effective >= '.$lastYear.' and P.MemberStatus_ID = 4)';
			$SQL .= ' ORDER BY P.LastName';
			$SQL = mysql_query($SQL, $LinkID);
			$loop_count = 1;
			while ($Line = mysql_fetch_object($SQL))
				{
				if ($loop_count <> $count)
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.' '.'(<b>'.$Line->Description.'</b>), ');
					$loop_count++;
					}
				else
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.' '.'(<b>'.$Line->Description.'</b>)');
					}
				}

			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.Effective >= '.$lastYear.' and P.MemberStatus_ID = 4';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_resigned = $Line->Count;
			}	
			dbClose($LinkID);
			echo ('</i></font></td><td><center><font face="arial,helvetica" size=-2>-' .$count_resigned.'</font></center>');
			$TotalNeg = $TotalNeg + $count_resigned;			
			?>
			</td>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Lost</td>
			<td><font face="arial,helvetica" size=-2><i>
			<?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName, M.Description FROM People P, MemberType M ';
			$SQL .= ' WHERE P.MemberType_ID = M.ID and (P.Effective >= '.$lastYear.' and P.MemberStatus_ID = 5)';
			$SQL .= ' ORDER BY P.LastName';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.' (<b>'.$Line->Description.'</b>)');
			}
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.Effective >= '.$lastYear.' and P.MemberStatus_ID = 5';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				$count_lost = $Line->Count;
			}	
			dbClose($LinkID);
			echo ('</i></font></td><td><center><font face="arial,helvetica" size=-2>-' .$count_lost. '</font></center>');
			$TotalNeg = $TotalNeg + $count_lost;			
			?>
			</td>
		</tr>
		<tr bgcolor="#FFFFCC">
			<td colspan=3><?php
			echo ('<font face="arial,helvetica" size=-2><b>Adjusted Renewable Members to Date</b>');
			?></td>
			<td><?php
			$TotalBase = $TotalBase - $TotalNeg;
			echo ('<center><font face="arial,helvetica" size=-2>'.$TotalBase.'</font></center></td><td><center><font face="arial,helvetica" size=-2><b>' .$TotalBase. '</b></font></center></td>');
			?>
		</tr>
		<tr>
			<!-- identify the regular "new" members -->
			<td rowspan="5"><?php
			echo ('<font face="arial,helvetica" size=-2>New members '.$year);
			?></td>
			<td><font face="arial,helvetica" size=-2>Regular</td>
			<td><font face="arial,helvetica" size=-2><i><?php
			$LinkID=dbConnect('d60476654');

			// setup the month array
			$mnth[0] = "January";
			$mnth[1] = "February";
			$mnth[2] = "March";
			$mnth[3] = "April";
			$mnth[4] = "May";
			$mnth[5] = "June";
			$mnth[6] = "July";
			$mnth[7] = "August";
			$mnth[8] = "September";
			$mnth[9] = "October";
			$mnth[10] = "November";
			$mnth[11] = "December";

			$month_now = $month;
			$year_loop = $year;
			$month_loop = $month;
			$monthless = 0;

			for ($i = 0; $i <=5; $i++) 
				{	 
				if ($month_now > 1)
					{
					$shortyr = $year_short;
					$year_now = $year_loop;
					$month_now = $month_loop - $monthless;
					$monthless++;
					}
				else
					{
					$year_short = $lastYear_short;
					$year_loop = $lastYear;
					$month_loop = 12;
					$month_now = $month_loop;
					$monthless = 1;
					$shortyr = $year_short;
					$year_now = $year_loop;
					}

				$SQL  = 'SELECT count(*) Count FROM People P';
				$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 1 and P.Effective >= '.$year_now.' and MONTH(P.PaymentReceived) = '.$month_now;
				$SQL = mysql_query($SQL, $LinkID);
				while ($Line = mysql_fetch_object($SQL)) 
					{
					$count = $Line->Count;
					}

				if ($count > 0)
					{
					$loop_count = 1;
					$SQL  = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName FROM People P';
					$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 1 and P.Effective >= '.$year_now.' and MONTH(P.PaymentReceived) = '.$month_now;
					$SQL .= ' ORDER BY  P.LastName';
					$SQL = mysql_query($SQL, $LinkID);
					echo ('<b>'.$mnth[$month_now - 1].' '.$shortyr.': </b>');
					while ($Line = mysql_fetch_object($SQL))
						{
						if ($loop_count <> $count)
							{
							echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.', ');
							$loop_count++;
							}
						else
							{
							echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName);
							}
						}
					echo ("<br>");
					}		
				}
			
			dbClose($LinkID);
			?></i></font>
			</td>
			<td><?php
			$TotalRenew = 0;
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 1 and P.Effective >= '.$year.'';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<center><font face="arial,helvetica" size=-2>' . $Line->Count . '</font></center>');
				$NewReg = $Line->Count;		
				$TotalRenew = $NewReg;	
			}
			
			dbClose($LinkID);
			?>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Student</td>
			<td><font face="arial,helvetica" size=-2><i><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 6 and P.Effective >= '.$year.'';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) 
				{
				$count = $Line->Count;
				}
			
			$SQL  = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName FROM People P ';
			$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 6 and P.Effective >= '.$year.'';
			$SQL .= ' ORDER BY P.LastName';
			$SQL = mysql_query($SQL, $LinkID);
			$loop_count = 1;
			while ($Line = mysql_fetch_object($SQL))
				{
				if ($loop_count <> $count & $count > 0)
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.', ');
					$loop_count++;
					}
				else
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.'');
					}
				}

			dbClose($LinkID);
			?></i></font>
			</td>
			<td><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 6 and P.Effective >= '.$year.'';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<center><font face="arial,helvetica" size=-2>' . $Line->Count . '</font></center>');
				$NewStud = $Line->Count;	
				$TotalRenew = $TotalRenew + $NewStud;			
			}
			
			dbClose($LinkID);
			?>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<!-- honorary members do not need to "renew" their membership. Their numbers only change if new members are
			identified as honorary, or they have deceased -->

			<td><font face="arial,helvetica" size=-2>Hon/Life</td>
			<td><font face="arial,helvetica" size=-2><i><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE (P.MemberType_ID = 5 or P.MemberType_ID = 4) and P.Deceased = 0 and P.MemberStatus_ID = 1';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) 				
				{
				$count = $Line->Count;
				}

			$SQL  = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName FROM People P ';
			$SQL .= ' WHERE (P.MemberType_ID = 5 or P.MemberType_ID = 4) and P.Deceased = 0 and P.MemberStatus_ID = 1';
			$SQL .= ' ORDER BY P.LastName';
			$SQL = mysql_query($SQL, $LinkID);
			$loop_count = 1;
			while ($Line = mysql_fetch_object($SQL)) 
				{
				if ($loop_count <> $count & $count > 0)
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.', ');
					$loop_count++;
					}
				else
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.'');
					}
				}

			dbClose($LinkID);
			?></i></font>
			</td>
			<td><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE (P.MemberType_ID = 5 or P.MemberType_ID = 4) and P.Deceased = 0 and P.MemberStatus_ID = 1';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<center><font face="arial,helvetica" size=-2>' . $Line->Count . '</font></center>');
				$NewHon = $Line->Count;	
				$TotalRenew = $TotalRenew + $NewHon;			
			}
			
			dbClose($LinkID);
			?>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Institutional</td>
			<td><font face="arial,helvetica" size=-2><i><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 2 and P.Effective >= '.$year.'';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) 
				{
				$count = $Line->Count;
				}

			$SQL  = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName FROM People P ';
			$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 2 and P.Effective >= '.$year.'';
			$SQL .= ' ORDER BY P.LastName';
			$SQL = mysql_query($SQL, $LinkID);
			$loop_count = 1;
			while ($Line = mysql_fetch_object($SQL))		
				{
				if ($loop_count <> $count & $count > 0)
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.', ');
					$loop_count++;
					}
				else
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.'');
					}
				}

			dbClose($LinkID);
			?></i></font>
			</td>
			<td><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 2 and P.Effective >= '.$year.'';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<center><font face="arial,helvetica" size=-2>' . $Line->Count . '</font></center>');
				$NewIns = $Line->Count;	
				$TotalRenew = $TotalRenew + $NewIns;			
			}
			
			dbClose($LinkID);
			?>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Institutional - Exchange</td>
			<td><font face="arial,helvetica" size=-2><i><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 3 and P.Effective >= '.$year.'';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL))
				{
				$count = $Line->Count;
				}

			$SQL  = 'SELECT P.ID, P.FirstName, P.MiddleInitial, P.LastName FROM People P ';
			$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 3 and P.Effective >= '.$year.'';
			$SQL .= ' ORDER BY P.LastName';
			$SQL = mysql_query($SQL, $LinkID);
			$loop_count = 1;
			while ($Line = mysql_fetch_object($SQL))		
				{
				if ($loop_count <> $count & $count > 0)
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.', ');
					$loop_count++;
					}
				else
					{
					echo ($Line->FirstName .' '.$Line->MiddleInitial.' '.$Line->LastName.'');
					}
				}

			dbClose($LinkID);
			?></i></font>
			</td>
			<td><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE P.MemberStatus_ID = 1 and P.MemberType_ID = 3 and P.Effective >= '.$year.'';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<center><font face="arial,helvetica" size=-2>' . $Line->Count . '</font></center>');
				$NewInsEx = $Line->Count;	
				$TotalRenew = $TotalRenew + $NewInsEx;			
			}
			
			dbClose($LinkID);
			?>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<?php
			echo ('<td colspan=3><font face="arial,helvetica" size=-2><b>New Members to Date (Effective Year >= '.$year.')</b></td>');
			?>
			<td><?php
			echo ('<center><font face="arial,helvetica" size=-2>'.$TotalRenew.'</font></center></td><td><center><font face="arial,helvetica" size=-2><b>'.$TotalRenew.'</b></font></center></td>');
			?>
		</tr>
		<tr bgcolor="#99ff99">
			<td colspan=4><font face="arial,helvetica" size=-2><b>Current Membership Base to Date</b></td>
			<td><?php
			$Count_CM = $TotalBase + $TotalRenew;
			echo ('<center><font face="arial,helvetica" size=-2><b>'.$Count_CM.'</b></font></center></td>');
			?>
		</tr>
		</table>
		
		<table align="center" cellpadding="2" cellspacing="0" border=1 width=90%>
		<tr bgcolor="#003366">
			<td colspan=7><font face="arial,helvetica" size=-2 color="white"><b>MEMBERSHIP ACTIVITY DISTRIBUTION</b></td>
		</tr>
		<tr>
			<td align="center" width="14%" valign="top"><font face="arial,helvetica" size=-2><b>1<br>Membership Category</b></font></td>
			<td align="center" width="14%" valign="top"><font face="arial,helvetica" size=-2><b>2<br>Renewable Members</b></font></td>
			<?php
			echo ('<td align="center" width="14%" valign="top"><font face="arial,helvetica" size=-2><b>3<br>Renewed<br>for '.$year.'</b></font></td>');
			?>
			<td align="center" width="14%" valign="top"><font face="arial,helvetica" size=-2><b>4<br>New Members</b></font></td>
			<td align="center" width="14%" valign="top"><font face="arial,helvetica" size=-2><b>5</b>  (3+4)<br><b>Total Enrolled<br>to Date</b></font></td>
			<td align="center" width="14%" valign="top"><font face="arial,helvetica" size=-2><b>6</b> (2-3)<br><b>Not Renewed<br>to Date</b></font></td>
			<td align="center" width="14%" valign="top"><font face="arial,helvetica" size=-2><b>7</b> (5+6)<br><b>Current Membership Base</b></font></td>	
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Regular</font></tb>
			<!-- renewable regular members to date - col 2 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$curr_Reg.'</font></td>');
			?>

			<!-- regular members renewed to date - col 3 -->
			<?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE Effective >= 2006 and P.MemberStatus_ID = 2 and P.MemberType_ID = 1';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Line->Count.'</font></td>');
				$RwdReg = $Line->Count;	
			}
			dbClose($LinkID);
			?>

			<!-- new regular members to date - col 4 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$NewReg.'</font></td>');
			?>

			<!-- total regular members enrolled to date - col 5 -->
			<?php
			$Total5_Reg = $RwdReg + $NewReg;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total5_Reg.'</font></td>');
			?>

			<!-- total regular members not renewed to date - col 6 -->
			<?php
			$Total6_Reg = $curr_Reg - $RwdReg;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total6_Reg.'</font></td>');
			?>

			<!-- total current regular members count - col 7 -->
			<?php
			$Total7_Reg = $Total5_Reg + $Total6_Reg;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total7_Reg.'</font></td>');
			?>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Student</font></tb>
			<!-- renewable student members to date - col 2 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$curr_Stud.'</font></td>');
			?>

			<!-- student members renewed to date - col 3 -->
			<?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE Effective >= 2006 and P.MemberStatus_ID = 2 and P.MemberType_ID = 6';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Line->Count.'</font></td>');
				$RwdStud = $Line->Count;	
			}
			dbClose($LinkID);
			?>

			<!-- new student members to date - col 4 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$NewStud.'</font></td>');
			?>

			<!-- total student members enrolled to date - col 5 -->
			<?php
			$Total5_Stud = $RwdStud + $NewStud;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total5_Stud.'</font></td>');
			?>

			<!-- total regular students not renewed to date - col 6 -->
			<?php
			$Total6_Stud = $curr_Stud - $RwdStud;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total6_Stud.'</font></td>');
			?>

			<!-- total current students members count - col 7 -->
			<?php
			$Total7_Stud = $Total5_Stud + $Total6_Stud;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total7_Stud.'</font></td>');
			?>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Honorary/Life</font></tb>
			<!-- honorary/life members to date (hon/life members do not renew) - col 2 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$curr_Life.'</font></td>');
			?>
			<!-- honorary/life members renewed to date - col 3 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$curr_Life.'</font></td>');
			?>

			<!-- new hon/life members to date - col 4 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$NewHon.'</font></td>');
			?>
			<!-- total hon/life members - col 5 -->
			<?php
			$Total5_Hon = $curr_Life + $NewHon;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total5_Hon.'</font></td>');
			?>

			<!-- total hon/life - col 6 -->
			<?php
			$Total6_Hon = $curr_Life - $curr_Life;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total6_Hon.'</font></td>');
			?>

			<!-- total current hon/life members count - col 7 -->
			<?php
			$Total7_Hon = $Total5_Hon + $Total6_Hon;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total7_Hon.'</font></td>');
			?>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Institutional</font></tb>
			<!-- renewable institutional members to date - col 2 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$curr_Ins.'</font></td>');
			?>
			<!-- institutional members renewed to date - col 3 -->
			<?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count FROM People P ';
			$SQL .= ' WHERE Effective >= 2006 and P.MemberStatus_ID = 2 and P.MemberType_ID = 2';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Line->Count.'</font></td>');
				$RwdIns = $Line->Count;	
			}
			dbClose($LinkID);
			?>

			<!-- new institutional members to date - col 4 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$NewIns.'</font></td>');
			?>

			<!-- total institutional members enrolled to date - col 5 -->
			<?php
			$Total5_Ins = $RwdIns + $NewIns;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total5_Ins.'</font></td>');
			?>

			<!-- total institutional not renewed to date - col 6 -->
			<?php
			$Total6_Ins = $curr_Ins - $RwdIns;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total6_Ins.'</font></td>');
			?>

			<!-- total institutional members count - col 7 -->
			<?php
			$Total7_Ins = $Total5_Ins + $Total6_Ins;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total7_Ins.'</font></td>');
			?>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Institutional - Ex.</font></tb>
			<!-- renewable institutional-exchange members to date - col 2 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$curr_InsEx.'</font></td>');
			?>
			<!-- institutional-exchange members renewed to date - col 3 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$curr_InsEx.'</font></td>');
			?>

			<!-- new institutional-exchange members to date - col 4 -->
			<?php
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$NewInsEx.'</font></td>');
			?>

			<!-- total institutional-exchange members enrolled to date - col 5 -->
			<?php
			$Total5_InsEx = $curr_InsEx + $NewInsEx;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total5_InsEx.'</font></td>');
			?>

			<!-- total institutional-exchange not renewed to date - col 6 -->
			<?php
			$Total6_InsEx = $curr_InsEx - $curr_InsEx;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total6_InsEx.'</font></td>');
			?>

			<!-- total institutional-exchange members count - col 7 -->
			<?php
			$Total7_InsEx = $Total5_InsEx + $Total6_InsEx;
			echo ('<td align="center"><font face="arial,helvetica" size=-2>'.$Total7_InsEx.'</font></td>');
			?>
		</tr>

		<tr>
			<td><font face="arial,helvetica" size=-2><b>Totals</b></font></tb>
			<?php
			$Total = $curr_Reg + $curr_Stud + $curr_Life + $curr_Ins + $curr_InsEx;
			echo ('<td align="center" bgcolor="#FFFFCC"><font face="arial,helvetica" size=-2><b>'.$Total.'</b></font></td>');
			?>
			<?php
			$Total = $RwdReg + $RwdStud + $curr_Life + $RwdIns + $curr_InsEx;
			echo ('<td align="center"><font face="arial,helvetica" size=-2><b>'.$Total.'</b></font></td>');
			?>
			<?php
			$Total = $NewReg + $NewStud + $NewHon + $NewIns + $NewInsEx;
			echo ('<td align="center"><font face="arial,helvetica" size=-2><b>'.$Total.'</b></font></td>');
			?>
			<?php
			$Total = $Total5_Reg + $Total5_Stud + $Total5_Hon + $Total5_Ins + $Total5_InsEx;
			echo ('<td align="center"><font face="arial,helvetica" size=-2><b>'.$Total.'</b></font></td>');
			?>
			<?php
			$Total = $Total6_Reg + $Total6_Stud + $Total6_Hon + $Total6_Ins + $Total6_InsEx;
			echo ('<td align="center"><font face="arial,helvetica" size=-2><b>'.$Total.'</b></font></td>');
			?>
			<?php
			$Total = $Total7_Reg + $Total7_Stud + $Total7_Hon + $Total7_Ins + $Total7_InsEx;
			echo ('<td align="center" bgcolor="#99ff99"><font face="arial,helvetica" size=-2><b>'.$Total.'</b></font></td>');
			?>
		</tr>
		</table>

		<table align="center" cellpadding="2" cellspacing="0" border=1 width=90%>
		<tr bgcolor="#003366">
			<td colspan=5><font face="arial,helvetica" size=-2 color="white"><b>PAYMENT ACTIVITY TO DATE</b></td>
		</tr>
		<tr>
			<td colspan=2 rowspan=4>&nbsp;</td>
			<td><font face="arial,helvetica" size=-2>Cash Payments</td>
			<td width="50"><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count_C FROM People P ';
			$SQL .= ' WHERE P.PayMethod_ID = 2 and P.Effective >= 2006';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<center><font face="arial,helvetica" size=-2>' . $Line->Count_C . '</font></center>');
			}
			dbClose($LinkID);
			?>
			</td>
			<td width="50" rowspan=4>&nbsp;</td>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Cheque Payments</td>
			<td><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count_C FROM People P ';
			$SQL .= ' WHERE P.PayMethod_ID = 3 and P.Effective >= 2006';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<center><font face="arial,helvetica" size=-2>' . $Line->Count_C . '</font></center>');
			}
			dbClose($LinkID);
			?>
			</td>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Money Order</td>
			<td><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count_M FROM People P ';
			$SQL .= ' WHERE P.PayMethod_ID = 5 and P.Effective >= 2006';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<center><font face="arial,helvetica" size=-2>' . $Line->Count_M . '</font></center>');
			}
			dbClose($LinkID);
			?>
			</td>
		</tr>
		<tr>
			<td><font face="arial,helvetica" size=-2>Online Payments</td>
			<td><?php
			$LinkID=dbConnect('d60476654');
			$SQL  = 'SELECT count(*) Count_O FROM People P ';
			$SQL .= ' WHERE P.PayMethod_ID = 6 and P.Effective >= 2006';
			$SQL = mysql_query($SQL, $LinkID);
			while ($Line = mysql_fetch_object($SQL)) {
				echo ('<center><font face="arial,helvetica" size=-2>' . $Line->Count_O . '</font></center>');
			}
			dbClose($LinkID);
			?>
			</td>
		</tr>

		</table>
<p><center><form action="0"><input type="button" value="Print This Report" onClick="window.print()" name="button"></form></center>
	</body>
</html>
