//
// goFetch script - for those insanely high-rez screens
//
function goFetch(form)
{
var what	= form.what.value
form.action = "http://www.aemma.org/php-bin/gofetch.php?mode=" + what ;
} // end of function: goFetch

