<?php
ini_set('display_errors', 'On');
//  Program:    sub_upload_portrait_image.php
//  Author:     David M. Cvet
//  Created:    February 2019
//  Description:
//  This is a standard script invoked by upoad.php which is the result of a popup window allowing for the browser to upload files to their
//  respective locations on the server.


if (isset($_GET['TD']))
    {$target_dir = $_GET['TD'];}
else
    {$target_dir = "../uploads/";}
if (isset($_GET['FS']))
    {$max_file_size = $_GET['FS'];}
else
    {$max_file_size = 150000;}

$path_root          = "";
$path_members       = $path_root."../";

$file_type_ok = 1;          // if set to "0", file type is NOT OK
$file_type_ok_comment = "";
$file_exist = 0;            // if set to "1", this means that the file already exists
$file_exist_comment = "";
$file_too_big = 0;
$file_too_big_comment = "";
//$class_box = "class=\"box\"";
$class_box = "";

$file_name = basename($_FILES["file_to_upload"]["name"]);
$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
//echo ('debug:upload:4:$target_file="'.$target_file.'"<br /><br />');
$upload_ok = 1;
$image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);
//echo ('debug:upload:7:$image_file_type="'.$image_file_type.'"<br /><br />');
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
    {
    $check = getimagesize($_FILES["file_to_upload"]["tmp_name"]);
//    echo ('debug:upload:11:mime type="'.$check["mime"].'"<br /><br />');
    if($check !== false) 
        {
        $file_mime_comment = $check["mime"];
//      echo "The file you picked is an image - " . $check["mime"] . ".";
        $upload_ok = $file_mime = 1;
        }
    else
        {
        $file_mime_comment = "The file you selected is NOT an image.";
        $file_not_loaded_comment = "The file you selected is NOT an image.";
        $upload_ok = $file_mime = 0;
        }
    }
// Check if file already exists
if (file_exists($target_file))
    {
//  echo "File already present.";
    $file_exist_comment = "File already present.";
    $file_not_loaded_comment = "File already present.";
    $upload_ok = $file_exist = 1;
    }
// Check file size
$file_size = $_FILES["file_to_upload"]["size"];
//echo ('debug:upload:27:$file_size="'.$file_size.'"<br /><br />');
if ($_FILES["file_to_upload"]["size"] > $max_file_size)
    {
//    echo "File too big.";
    $file_too_big = 1;
    $file_too_big_comment = "File selected is larger than the maximum size of ".$max_file_size." bytes.";
    $file_not_loaded_comment = "File selected is larger than the maximum size of ".$max_file_size." bytes.";
    $upload_ok = 0;
    }
// Limit allowed file formats
if(($image_file_type != "jpg" && $image_file_type != "JPG") && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif" ) 
    {
//    echo "Only JPG, JPEG, PNG & GIF files are allowed.";
    $file_not_loaded_comment = "Only JPG, JPEG, PNG & GIF file types are allowed for upload operations.";
    $upload_ok = 0;
    }
// Check if $upload_ok is set to 0 by an error
//$upload_ok == 1;
if ($upload_ok == 0)
    {
//    echo "Your file was not uploaded.";
// If all the checks are passed, file is uploaded
    // assign values to the variables within the HTML doc
    $browser_title = "Confirmation of upload";
    $path_root = "";
    $thumbs = "thumbs_down.png";
    $logo_image = "AEMMA_logo_white_200_transparent.png";
    $paragraph = "<span style=\"color:red;\"><b>Note:</b> Your image file <b>'".$file_name."'</b> was <b>NOT</b> uploaded to its respective directory in the system for the following reason: </span><br /><br /><b>".$file_not_loaded_comment."</b>";
    }
else
    {
    if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file))
        {
//      echo "The file ". basename( $_FILES["file_to_upload"]["name"]). " was uploaded.";
//      echo ('<script type="text/javascript">');
//      echo ('alert("this is before assigning to WineKitImage");');
//      echo ('document.getElementById("WineKitImage").value="'.$file_name.'";');
//      echo ('document.add_kit_form.WineKitImage.value="'.$file_name.'";');
//      echo ('</script>');

        // assign values to the variables within the HTML doc
        $browser_title = "Confirmation of upload";
        $path_root = "";
        $thumbs = "thumbs_up.png";
        $logo_image = "AEMMA_logo_white_200_transparent.png";
        $paragraph = "<span style=\"color:green;\"><b>Note:</b> Your portrait file <img src=\"../images/icons/hand_right_pointing.gif\" alt=\"\" style=\"vertical-align:middle;\" /><span style=\"color:black;\">".$file_name."</span><img src=\"../images/icons/hand_left_pointing.gif\" alt=\"\" style=\"vertical-align:middle;\" /> was successfully uploaded to its respective directory in the system. Its specifications are the following:</span><blockquote><ul style=\"color:green;\"><li><b>destination directory:</b> ".$target_file."</b>,</li><li><b>file type:</b> ".$image_file_type.",</li><li><b>file size:</b> ".$file_size." bytes.</li></ul>Copy the file name between the pointing hands and paste it into the text box labelled \"Portrait File:\" in the 'Personal Profile' tab and then click on the coloured box icon to view the image to confirm that it is stored in the correct location.</blockquote>";
         }
     else
        {
        // assign values to the variables within the HTML doc
        $browser_title = "Upload failure";
        $path_root = "";
        $thumbs = "thumbs_down.png";
        $logo_image = "AEMMA_logo_white_200_transparent.png";
        $paragraph = "<span style=\"color:red;\"><b>Note:</b> Your image file <b>".$file_name."</b> was <b>NOT</b> uploaded to its respective directory in the system for the following reason: </span><blockquote><ul style=\"color:red;\"><li><b>An error has occured uploading.</li></ul></blockquote>";
        //echo "A error has occured uploading.";
        }
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
    <title><?=$browser_title?></title>
    <style>
body {
    margin: 0px;
    padding: 10px;
    border: 0;
    background-color: #bfb8a1;      
    overflow-x:hidden;
    font-family: Arial, Helvetica, Georgia, Sans-serif; 
    font-size: 12px;
}
.upload_image {float:left;margin-right:15px;width:20%;}
.button{
    border:1px solid #7d99ca; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 5px 5px 5px 5px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;cursor:pointer;
    background-color: #a5b8da; background-image: -webkit-gradient(linear, left top, left bottom, from(#a5b8da), to(#7089b3));
    background-image: -webkit-linear-gradient(top, #a5b8da, #7089b3);
    background-image: -moz-linear-gradient(top, #a5b8da, #7089b3);
    background-image: -ms-linear-gradient(top, #a5b8da, #7089b3);
    background-image: -o-linear-gradient(top, #a5b8da, #7089b3);
    background-image: linear-gradient(to bottom, #a5b8da, #7089b3);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#a5b8da, endColorstr=#7089b3);
}

.button:hover{
    border:1px solid #5d7fbc;color:orange;text-decoration:none;
    background-color: #819bcb; background-image: -webkit-gradient(linear, left top, left bottom, from(#819bcb), to(#536f9d));
    background-image: -webkit-linear-gradient(top, #819bcb, #536f9d);
    background-image: -moz-linear-gradient(top, #819bcb, #536f9d);
     background-image: -ms-linear-gradient(top, #819bcb, #536f9d);
     background-image: -o-linear-gradient(top, #819bcb, #536f9d);
    background-image: linear-gradient(to bottom, #819bcb, #536f9d);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#819bcb, endColorstr=#536f9d);
}

.button.disabled:hover {
    border:1px solid #7d99ca; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 5px 5px 5px 5px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
    background-color: #bdbdbd; background-image: -webkit-gradient(linear, left top, left bottom, from(#a5b8da), to(#7089b3));
    background-image: -webkit-linear-gradient(top, #a5b8da, #7089b3);
    background-image: -moz-linear-gradient(top, #a5b8da, #7089b3);
    background-image: -ms-linear-gradient(top, #a5b8da, #7089b3);
    background-image: -o-linear-gradient(top, #a5b8da, #7089b3);
    background-image: linear-gradient(to bottom, #a5b8da, #7089b3);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#a5b8da, endColorstr=#7089b3);
}
.box {
  box-shadow: 5px 5px 5px 0px #444;
}

    </style>
</head>
<body>
<form enctype="multipart/form-data" action="<?=$target_script_location?><?=$target_script?>?TD=<?=$target_directory?>&FS=<?=$max_file_size?>" method="POST">
    <img src="<?=$path_members?>images/icons/<?=$thumbs?>" class="upload_image" alt="" />
    <p><?=$paragraph?></p>
    <div style="float:left;width:100%;text-align:center;"><button class="button" name="submit" style="text-align:middle;" onclick="self.close();">Close</button></div>
</form>
<div style="float:left;width:100%;margin-top:20px;"><div style="float:left;width:30%;margin-left:35%;"><img src="<?=$path_members?>images/<?=$logo_image?>" width="100%" alt="" <?=$class_box?> /></div></div>
</body>
</html>
