//
// retrieve ordering information, i.e. book title, author, unit price from online store
// and populate the relevant fields
//
var entryWindow_books

//function changeQuantity(form)
//{
//var qty	= form.quantity.value
//alert ("the new value of quantity=" + qty)
//}

function orderEntry(form)
{
//
// resolve the form data, depending upon the item type
//
var item_type	= form.item_type.value
alert("item type=" + item_type)
var quantity	= form.quantity.value
var tempcontent = ""

if (item_type == "book" | item_type == "magazine" | item_type == "video")
	{
	var item_requested	= form.title.value
	if (item_type == "book")
		{
		var publisher		= form.publisher.value
		var isbn		= form.isbn.value
		var author		= form.author.value
		var unit_price		= form.unit_price.value
		var sub_total		= quantity * unit_price
		if (!entryWindow_books || entryWindow_books.closed)
			{
			// book entry window has not been opened - first invokation
			entryWindow_books = window.open("entry_book.htm","books","toolbar=no,menubar=yes,scrollbars=no,height=465,width=618")
			books.document.form[0].itemRequested.value = item_requested
			}
		else
			{
			// book entry window is opened somewhere, bring it into focus
alert ("called becasue")
			entryWindow_books.focus()
			}
		}
	else if (item_type == "magazine")
		{
		var publisher		= form.publisher.value
		var unit_price1		= form.unit_price1.value
		var sub_total		= quantity * unit_price1
		var unit_price2		= form.unit_price2.value
		}
	else if (item_type == "video")
		{
		var producer		= form.publisher.value
		var unit_price1		= form.unit_price1.value
		var sub_total		= quantity * unit_price1
		var unit_price2		= form.unit_price2.value
		}

	else
		{
		// do something later
		}
	}

// end of order entry window
// end of order entry window
}