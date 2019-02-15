<?php
// 	Program: content_members_changePW_fr.php
//	Description: source for the French textual content on the members only change password page (members_changePW.php) (« »)
//	2016 ------------------
//
// French content -------------------
$title[1]	= "CHANGER ZONE SEULEMENT ACCÈS MOT DE PASSE DE VOS MEMBRES";
$pw_p1[1]	= "le système va crypter votre mot de passe avant de l'enregistrer.";
$pw_old_pw[1]	= "ancien mot de passe :";
$pw_new_pw[1]	= "nouveau mot de passe :";
$pw_confirm[1]	= "confirmer:";
$pw_reset[1]	= "réinitialiser le formulaire";
$pw_change_pw[1] = "changer le mot de passe";
if (isset($_SESSION['PName']))
	{
	$pw_error_1[1] = "<font color='red'>".$_SESSION['PName'].", la nouvelle confirmation de mot de passe ne <b>PAS</b> ne pas correspondre à nouveau mot de passe entré.<br />S'il vous plaît essayer à nouveau.</font>";
	$pw_error_2[1] = "<font color='red'>".$_SESSION['PName'].", le nouveau mot de passe est <b>même que ancien mot de passe</b>.<br /> S'il vous plaît essayer à nouveau .</font>";
	$pw_OK[1] = "<font color='green'>".$_SESSION['PName'].", votre mot de passe a été <b>avec succès</b> mise à jour.<br />Vous pouvez continuer avec cette session dans la zone réservée, mais une fois que vous vous déconnectez, vous devrez entrer votre nouveau mot de passe.</font>";
	$pw_not_OK[1] = "<font color='red'>".$_SESSION['PName'].", votre mot de passe a <b>PAS</b> été changé en raison de l'ancien mot de passe étant incorrect.<br />S'il vous plaît essayer à nouveau ou contactez l'administrateur de l'aide.</font>";
	$pw_problems[1] = "<font color='red'>".$_SESSION['PName'].", votre mot de passe a été <b>PAS</b> changé en raison d'un problème avec les systèmes AIMS traitement de votre demande de modification.<br />S'il vous plaît contacter l'administrateur et de décrire à lui / elle de ce que vous essayez de faire.</font>";
	}
?>
