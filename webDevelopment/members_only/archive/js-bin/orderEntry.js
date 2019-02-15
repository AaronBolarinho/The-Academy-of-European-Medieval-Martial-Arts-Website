//
// retrieve ordering information, i.e. book title, author, unit price from online store
// and populate the relevant fields
//
var entryWindow_books
function orderEntry(form)
{
var isbn = form.isbn.value
if (!entryWindow_books || entryWindow_books.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_books = window.open("orderEntry.htm","books","toolbar=no,menubar=yes,scrollbars=no,height=465,width=618")
	entryWindow_books.document.form.isbn.value = isbn
//	var test = entryWindow_books.entryForm.isbn.value
//alert("value of entrywindow isbn=")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_books.focus()
	}
} // end function orderEntry

//
function changeQuantity(form)
{
var l_quantity	= form.quantity.value
var l_amount 	= 0
var l_price1 	= form.unit_price1.value
var l_price2	= form.unit_price2.value
//
// remove the '$' sign from the price and then multiply
l2_price 	= l_price1.substr(1)
l_amount	= l_quantity * l2_price
l_amount 	= '$' + l_amount

// determine if there is a decimal point in the amount
var offset = l_amount.indexOf('.')
if (offset<0)
	{
	form.subTotal.value = l_amount + ".00"
	}
else 	{
	form.subTotal.value = l_amount
	}
} // end function changeQuantity
