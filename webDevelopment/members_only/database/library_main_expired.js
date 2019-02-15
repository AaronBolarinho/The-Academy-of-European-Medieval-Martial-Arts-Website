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

function navBarClick( tableCellRef, hoverFlag, RowIndex ) {
	 window.location.href = "library_Members.php?ID="+RowIndex+"\&State=Expired";
}

