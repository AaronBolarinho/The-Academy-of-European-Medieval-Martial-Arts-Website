function navBar( tableCellRef, hoverFlag, navStyle ) {
	if ( hoverFlag == 1) {
		switch ( navStyle ) {
			case 1:
				tableCellRef.style.backgroundColor = '#69c';
				break;
			default:
				if ( document.getElementsByTagName ) {
					tableCellRef.getElementsByTagName( 'a' )[0].style.color = '#c00';
				}
		}
	} else if (hoverFlag == 2) {
		switch ( navStyle ) {
			case 1:
				tableCellRef.style.backgroundColor = '#fff';
				break;
			default:
				if ( document.getElementsByTagName ) {
					tableCellRef.getElementsByTagName( 'a' )[0].style.color = '#c00';
				}
		}
	} else {
		switch ( navStyle ) {
			case 1:
				tableCellRef.style.backgroundColor = '#036';
				break;
			default:
				if ( document.getElementsByTagName ) {
					tableCellRef.getElementsByTagName( 'a' )[0].style.color = '#000';
				}
		}
	}
}

function navBarClick( tableCellRef, hoverFlag, MemID, Seclvl, STATE ) {
//alert("next step: Member_ID="+MemID+"\&SECL="+Seclvl+"\&State="+STATE);
//alert("Members.php?Rec_ID="+RowIndex+"\&MemID="+MemID+"\&SECL="+Seclvl+"\&IMP="+Imp+"\&State=Update");
window.location.href = "Members_show.php?MID="+MemID+"\&SECL="+Seclvl+"\&STATE="+STATE;
//	 window.location.href = "Members.php?Rec_ID="+RowIndex+"\&MemID="+MemID+"\&SECL="+Seclvl+"\&State=Update";
}

function armBarClick( tableCellRef, hoverFlag, MemID, Tab, STATE ) {
//alert("next step: Member_ID="+MemID+"\&SECL="+Seclvl+"\&State="+STATE);
//alert("Members.php?Rec_ID="+RowIndex+"\&MemID="+MemID+"\&SECL="+Seclvl+"\&IMP="+Imp+"\&State=Update");
window.location.href = "Members_show.php?MID="+MemID+"\&TAB="+Tab+"\&STATE="+STATE;
//	 window.location.href = "Members.php?Rec_ID="+RowIndex+"\&MemID="+MemID+"\&SECL="+Seclvl+"\&State=Update";
}
