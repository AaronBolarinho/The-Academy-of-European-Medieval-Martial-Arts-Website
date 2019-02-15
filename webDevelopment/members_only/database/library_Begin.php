<?php session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp"); session_start(); ?>

<html>
<head>
	<link rel="stylesheet" href="../misc/css/default_page.css" type="text/css" />
	<link rel="shortcut icon" href="images/shield_tiny.gif" />
</head>
<body onload=document.Login.ID.focus()>

<!-- begin page header -->
<center><table width="100%" cellpadding="3" cellspacing="0" border="0">
<tr class="uoft_blue">
	<td class="uoft_blue">&nbsp;Welcome to AEMMA Online Library Database Administration</td>
</tr></table></center><br />
<!-- end page header -->

<p>Welcome to the AEMMA's Online Library database administration area of the website.  If you have reached this page through shear luck, and are not a member of AEMMA's executive or administration, then leave now, or risk hazard to your health!!  If you should be here because you were instructed as to the location of these secret pages which hold the answers to the universe, you will need to enter your assigned userID and password to gain access.</p>
<br />
<center>
<font face="arial,helvetica" size="3" color="#CC0000"><b>AEMMA Administration Login</font><br /><br />

<form action="library_Login.php" name="Login" method="POST">
	<table border="1" valign="center" align="center" cellpadding="2" cellspacing="2" bordercolor="#000000">
	<tr><td valign="top"><div class="NavText" align="right"><font face="arial,helvetica" size="2">
	User Name: <input type="text"     maxlength="32" name="ID"><br />
	Password:  <input type="password" maxlength="32" name="PW"><br /></font>

	<input type="reset"  value="Reset Form">
	<input type="submit" value="  OK  " name="OK"></td></tr>
	</table>
</form>
<img src="http://www.aemma.org/onlineResources/images/books_shelf.gif" alt="" />
<div id="Alert"><?= $_SESSION['StartMsg'] ?></div>
</center>
</body>
</html>
