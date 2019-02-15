<?php
	echo ('<tr OnMouseOver="navBar(this,1,1);"');
	echo (' OnMouseOut="navBar(this,2,1);"');
	echo (' OnClick="navBarClick(this,1,' . $Line->Rec_ID . ')">');

	echo ('<td width="120" valign="top"><div id="Data">&nbsp;<font color="'.$colour.'">' . $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial . '</font></td>');
	echo ('<td><div id="Data"><font color="'.$colour.'">' . $Line->PeriodGarments . '</font><br />&nbsp;</td>');
	echo ('<td>&nbsp;</td><td><div id="Data" align="center" valign="top"><a class="thumbnail" href="#thumb"><img src="' . $Line->portrait_URL . '" height=45 border=0><span><img src="' . $Line->portrait_URL . '" /><br />'. $Line->LastName . ', ' . $Line->FirstName .' ' . $Line->MiddleInitial .'</span></a></td>');
	echo ('<td>&nbsp;</td></tr>');
?>
