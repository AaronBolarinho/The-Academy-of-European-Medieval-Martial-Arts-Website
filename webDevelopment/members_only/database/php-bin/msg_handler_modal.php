<?php
// Function: msg_handler_modal.php
// Author: David M. Cvet
// Created: Sep 28, 2016
// Description:	This is the standard window for the modal popup which display messages or errors during operations
//---------------------------
// Updates:
//	2016 ----------
echo ("\n".'<div id="msgModal" class="modal">
	<div class="modal-content">
		<div class="modal-header" style="background-color:'.$_SESSION['modal_header_bgcolor'].';"><span class="close">×</span><h3><img src="images/AEMMA_logo_white_200_transparent.png" style="float:left;margin-right:6px;margin-top:0px;width:10%;" alt="" />AEMMA Information Management System (AIMS)</h3></div><!-- end modal-header -->
		<div class="modal-body">
			<p>'.$_SESSION['modal_title'].$_SESSION['modal_operation'].'</p>
		</div>
		<div class="modal-footer" style="background-color:'.$_SESSION['modal_footer_bgcolor'].';">'.$_SESSION['modal_msg_footer'].'</div><!-- end modal-footer -->
	</div><!-- modal-content -->
	</div><!-- msgModal -->'."\n\n");
?>
