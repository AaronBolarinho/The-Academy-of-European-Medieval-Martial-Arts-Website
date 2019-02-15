<?php
ini_set('display_errors', 'On');
//  Program:    upload_portrait_image.php
//  Author:     David M. Cvet
//  Created:    February 2019
//  Description:
//  This is a popup window allowing the browser to select a file for uploading to the system to its respective directory location.

// begin: revise the assignments below to customize the upload popup for a particular application
$path_root          = "";
$path_members       = $path_root."../";
$browser_title      = "Upload Portrait Image";
$target_directory   = $path_members."images/portraits/";
$target_script      = "sub_upload_portrait_image.php";
$target_script_location = "";
$paragraph = "<b>Note: </b>You are about to upload a member's portrait image to the system. This file will become attached to this member's record on file. It may be a source for a portrait on the public website with respect to an Instructor's position or governing body member, if approved by the member.<br />&nbsp;<br />The file type permitted to upload is one of jpg, jpeg, png or gif.  The maximum file size that can be uploaded is <b>150,000 bytes</b>&nbsp;<br />";
$logo_image = "AEMMA_logo_white_200_transparent.png";
//$class_box = "class=\"box\"";
$class_box = "";
// end: revise the assignments below to customize the upload popup for a particular application

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
<form enctype="multipart/form-data" action="<?=$target_script_location?><?=$target_script?>?TD=<?=$target_directory?>" method="POST">
    <img src="<?=$path_members?>images/icons/upload.png" class="upload_image" alt="" />
    <p><?=$paragraph?></p>
    <b>a) Select a file to upload:</b>  <input class="button" type="file" name="file_to_upload" id="file_to_upload" /><br /><br />
<!--    Select a file to upload:  <button class="button" type="file" name="file_to_upload" id="file_to_upload" />Select File</button><br /><br />-->
    <b>b) Click to upload file selected:</b>  <button class="button" type="submit" name="submit">Upload?</button> <button class="button" type="submit" name="cancel" onclick="self.close();" >Cancel</button>
</form>
<div style="float:left;width:100%;margin-top:20px;"><div style="float:left;width:30%;margin-left:35%;"><img src="<?=$path_root?>images/<?=$logo_image?>" width="100%" alt="" <?=$class_box?> /></div></div>
</body>
</html>