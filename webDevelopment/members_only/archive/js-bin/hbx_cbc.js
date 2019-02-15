hbx.lt = 'auto';

// Assign Page Title and URL to Custom Metric 1 (dimensions 1 and 2)
var cTitle = document.title;
cTitle = cTitle.replace(/'/g, "");
cTitle = cTitle.replace(/"/g, "");
cTitle = cTitle.replace(/,/g, "");
cTitle = cTitle.replace(/\|/g, "");
var cUrl = window.location;
hbx.hc1 = cTitle  + '|' + cUrl;

var urlPath= cUrl.toString().replace(/http:\/\/\S+\.cbc\.ca\//, "/");
if (urlPath.match(/\/story\/\d{4}\/\d{2}\/\d{2}\/(\S+)\.html/))
{
        urlPath = urlPath.substring(0, urlPath.lastIndexOf('/'));
        var index = urlPath.search(/\d{4}\/\d{2}\/\d{2}/);
        var yyyymmdd = urlPath.substring(index).replace(/\//g, '-');
        urlPath = urlPath.replace(/\d{4}\/\d{2}\/\d{2}/, yyyymmdd);
        hbx.mlc = urlPath;
}

// "Proxy" functions for reporting page views and media activity to HBX from Flash or Ajax applications.

function cbcStatsReportPageView(o) {
	if (o.page != undefined && o.category != undefined) _hbPageView(o.page, o.category); // report page view to hbx
}

function cbcStatsReportMedia(o) {
	if (o.clientname != undefined) _hbSet("m.cl",o.clientname);
	if (o.clientversion != undefined) _hbSet("m.cv",o.clientversion);
	if (o.filename != undefined) _hbSet("m.f",o.filename);
	if (o.state != undefined) _hbSet("m.s",o.state); //play,pause,stop,playp
	if (o.position != undefined) _hbSet("m.cp",o.position); // current position, usually 0 when movie starts playing
	if (o.duration != undefined) _hbSet("m.ep",o.duration); // aka "end position"
	if (o) _hbSend(); // send variables to hbx
}

function cbcStatsReportLink(o) {
	_hbLink(o.name, o.pos);
}
