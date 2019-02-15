<?php
include 'ss_path.stuff';
//include_once 'IDValid.php';
include 'sub_header.php';
$LinkID=dbConnect($DB);
$date	= date("Y-m-d");

// build array of Rec_IDs and attendance check values for committed (ID=1)
AttendanceLog($_POST['SQL1'],1,$_POST['ClassType'],$_POST['MartialStyle'],$_POST['FirstInstructor'],$_POST['AssistInstructor_1'],$_POST['AssistInstructor_2'],$_POST['AssistInstructor_3'],$date);
// build array of Rec_IDs and attendance check values for casual (ID=2)
//AttendanceLog($_POST['SQL2'],2);
// build array of Rec_IDs and attendance check values for occassional (ID=3)
//AttendanceLog($_POST['SQL3'],3);
// build array of Rec_IDs and attendance check values for instructor (ID=5)
//AttendanceLog($_POST['SQL57'],5);
// build array of Rec_IDs and attendance check values for exec (ID=7)
//AttendanceLog($_POST['SQL57'],7);


Function AttendanceLog($SQL,$type,$class_type,$martial_style,$instructor_ID,$assistant_1,$assistant_2,$assistant_3,$date)
	{
	// build the arrays which will contain the Rec_ID of each student and their attendance check value
	// the SQL is based on the SQL used to generate the listing
	
	// build array of Rec_IDs and attendance check values for committed (ID=1), casual (ID=2), occassional (ID=3) and instructors (ID=5 or 7)
	$i = 0;
	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result))
		{
		$rec_ID_array[$i] = $Line->Rec_ID;
		$attend_array[$i] = $_POST['recID_' . str_replace(' ', '', $Line->Rec_ID)];
		$i++;
		}
	$array_size = count($rec_ID_array);
echo ('debug: attendance_process:44:SQL="'.$SQL.'",    $martial_style="'.$martial_style.'"');

	for ($i=0; $i<$array_size; $i++)
		{
		// insert a new row into the  Attendance_log table whenever the check value for the student == 1
		if ($attend_array[$i] == 1)
			{
			$SQL    = 'INSERT INTO Attendance_log VALUES ('.$rec_ID_array[$i].',"'.$date.'","'.$class_type.'","'.$martial_style.'",'.$instructor_ID.','.$assistant_1.','.$assistant_2.','.$assistant_3.')';

echo ('debug: attendance_process:52:SQL="'.$SQL.'"');

			$Result = mysql_query($SQL, $LinkID);
			}
		}
	} // end Function : AttendanceLog
?>
