<?php  
if (isset($_COOKIE["device_width"]) || isset($_COOKIE["device_height"]))  
	{ $screen_width = $_COOKIE["device_width"]; $screen_height = $_COOKIE["device_height"]; }
else //cookie is not found set it using Javascript  
    	{  
?>  
	<script language="javascript">  
	<!--  
 	checkScreenHeight();  
	checkScreenWidth();  
     
	function checkScreenWidth()  
	{  
	var exdate=new Date();    
	exdate.setDate(exdate.getDate() + 365);      
	var screen_width =  screen.width;    
//alert("sreen width="+screen_width);
	var c_value=screen_width + "; expires="+exdate.toUTCString();      
	document.cookie= 'device_width=' + c_value;    
	}  // end function: checkScreenWidth

	function checkScreenHeight()  
	{  
	var exdate2=new Date();    
	exdate2.setDate(exdate2.getDate() + 365);      
	var screen_height =  screen.height;    
//alert("sreen height="+screen_height);

	var d_value=screen_height + "; expires="+exdate2.toUTCString();      
	document.cookie= 'device_height=' + d_value;    
	}  // end function: checkScreenHeight
 
     	//-->  
	</script>  
<?php  
	}  
//  	echo "Your screen height is set at ". $screen_height." and your screen width is set to ".$screen_width;  
?>  
