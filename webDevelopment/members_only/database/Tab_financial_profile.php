<?php
// update log:
//	2016 -------------------
// setup main div object for presenting financial details record
include "config/AIMS_sub_show_financial_profile_$lang.php";
// setup main div object for presenting membership details record
echo ('<div class="financial_profile_main box"><!-- begin financial_profile_main -->');
echo ("\n".'<form name="Financial_Profile_Form" method="post" action="">');
// setup the member's financial profile header (the green title bar)
if ($state == "Create")
	{ $remaining_title = "Member Number# (<i>not yet assigned</i>)</b>"; }
else
	{ $remaining_title = "Member Number# ".$Line_Members->Member_Number."</b>"; }
echo ("\n\t".'<div style="float:left;width:100%;height:24px;text-align:center;margin:auto;padding-top:3px;" class="bggreen"><img src="../../members_only/images/icons/dollar_transparent.png" alt="" style="margin-right:5px;vertical-align:middle;height:20px;" />&nbsp;<b>'.$name_in_title_bar.' Financial Profile&nbsp;&mdash;&nbsp;'.$remaining_title.'</div>');
// generate invoices rows div
//	echo ('<div style="float:left;width:100%;">');
echo ('<img src="'.$members_only_path.'images/1090x4_transparent.png" width="100%" alt="" />');
echo ('add stuff here ....... future financial functions (tracking membership payments, invoicing, etc.)<br /><br />Financial Profile Under Construction.');

// end modal popups code
echo ("\n".'<table width="100%" style="background-color:orange;">'."\n");
?>
<tr>
<?php
	if ($state == "Update")
		{ echo ('<td align="center"><a class="button" href="#openModal_addInvoice" style="color:white;">Add Invoice</a> <a class="button" href="#openModal_addPayment" style="color:white;">Add Payment / Tax Receipt</a></td>'); }
	else
		{ echo ('<td align="center"><a class="button" href="#" style="color:white;">Add Invoice</a> <a class="button" href="#" style="color:white;">Add Payment / Tax Receipt</a>&nbsp;<img src="images/icons/note.gif" style="vertical-align:middle;width:20px;margin-left:3px;cursor:help;" alt="" title="Unable to Add Invoice / Payment / Tax Receipt until the new member record has been created and saved to GIMS." /></td>'); }
?>
</tr>

<?php
echo ('</table></form><!-- end Financial_Profile_Form -->');
//echo ('</div>');	// end generate invoices rows
echo ("\n".'</div><!-- end financial_profile_main -->');	// end fin profile
?>
