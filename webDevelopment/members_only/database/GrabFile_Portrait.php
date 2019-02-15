<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();
	include_once 'IDValid.php';
	include_once 'DB.php';

MemberPortraitCreate($LinkID, $ID, $Date, $Description, $Image) {

//global $fileUpload;
//global $fileUpload_name;
//global $fileUpload_size;
//global $fileUpload_type;

//<input type="text" name="myName" value="John Smith">
// Use the form in this PHP script using the post method, PHP would automatically create a variable named $myName, containing the value "John Smith". 
// Form values are also stored in arrays, depending on the method used to post the form (get/post). For forms posted using the get method, 
// they are stored in the associative array, $HTTP_GET_VARS, access to the form element using:

echo $HTTP_GET_VARS["fu_name"];
echo $HTTP_GET_VARS["fu_desc"];
echo $HTTP_GET_VARS["fu_date"];

// For forms posted using the post method, that forms elements are stored in the $HTTP_POST_VARS associative array:

echo $HTTP_POST_VARS["fu_name"];
echo $HTTP_POST_VARS["fu_desc"];
echo $HTTP_POST_VARS["fu_date"];

$fileUpload = $fu_name;

// The other four global variables that I've defined hold the details of our uploaded file. They are automatically created by PHP. Details of each of these variables are shown below:
//
//    * $fu_name: The path and the name of the file that we have uploaded, for example "/images/myimage.gif".
//    * $fileUpload_size: The size of the file that we have uploaded, in bytes.
//    * $fileUpload_type: The content type of the file that we have uploaded, such as "image/gif" for a GIF image.
//    * $fu_desc: A description of the file uploaded.
//    * $fu_date: The date of the image/portrait being uploaded.

// Next, we make sure that the user has entered both a file description and a file name (notice how the $fileUpload variable contains the value "none" when a file hasn't been uploaded):
// Make sure both a description and file have been entered

if (empty($fu_desc) || $fu_name == "none")  die ("You must enter both a description and file");

// PHP has several built-in functions that allow us to open and read files. We use the fopen and fread methods to open the uploaded file from the local directory on the web server, and then read its contents into a variable. 
// The addslashes method escapes any apostrophises and double quotes in the file:

$fileHandle = fopen($fileUpload, "r");
$fileContent = fread($fileHandle, $fileUpload_size);
$fileContent = addslashes($fileContent);

// We connect to our database using PHP's built-in MySQL functions in combination with our database connection variables that we defined above:

	$SQL = 'INSERT INTO Members_Portrait VALUES ('.$ID.', '.$fu_date.', '.$fu_desc.', '.$fileUpload.')';
	$Result = mysql_query($SQL, $LinkID);

// If the mysql_query function didn't succeed, then we our script calls the die function, which stops the execution of our script and outputs "Couldn't add file to database" to the clients browser. 
// On the other hand, if the mysql_query function succeeded, then we output the details of the uploaded file to the browser:

echo "<h1>File Uploaded</h1>";
echo "The details of the uploaded file are shown below:<br><br>";
echo "<b>File name:</b> $fileUpload <br>";
echo "<b>File type:</b> $fileUpload_type <br>";
echo "<b>File size:</b> $fileUpload_size <br>";
echo "<a href='uploadfile.php'>Add Another File</a>";

} // End Function MemberPortraitCreate


// Main Program

      if ($_SESSION["RoleID"] < 3) {
?>
<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
	</head>

	<body align="center" valign="top">
        <body>
                <p>ERROR: You do not have the necessary permissions to view / edit membership data.</p>
        </body>
</html>
<?
        }
        else 
	{

// The main program.  Call functions based on the value of $_POST["state"], which gets set
// via a hidden INPUT TYPE, or through URL parameters called by NavBar Click event.

	$ID = '';
	if (isset($_GET['ID']))	{ $ID = $_GET['ID']; }
	if (isset($_POST['ID']))	{ $ID = $_POST['ID']; }

	$LinkID = dbConnect($DB);
	
	MemberPortraitCreate($LinkID, $ID, $_POST['Date'], $_POST['Description'], $_POST['Image']);

	dbClose($LinkID);
	}
?>
