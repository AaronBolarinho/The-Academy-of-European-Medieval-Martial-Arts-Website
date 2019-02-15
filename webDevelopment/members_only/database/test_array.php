<?php
ini_set('display_errors', 'On');

echo('
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="author" content="D.M.Cvet" />
   <title>AEMMA Database Management Administration</title>
</head>
<body>
');

$test[0]="this is a dog";
$test[1]="it is a good day to die";
$test[2]="show me the money";
$test[3]="this had better work!";

printdata($test);

function printdata ($test){

for ($num=0; $num<sizeof($test); $num++)
{echo "$test[$num]"."<br>";}

}
echo ('</body></html>');
?>
