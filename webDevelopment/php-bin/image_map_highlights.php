<?php
// <!-- begin javascript for image map link highlights behaviour -->
// <!-- source: http://davidlynch.org/projects/maphilight/docs/ -->
// <!-- begin javascripts for image link highlights on image map -->
echo ('<script type="text/javascript" src="'.$path.'js-bin/'.$jquery_min.'"></script>'."\n");
echo ('<script type="text/javascript" src="'.$path.'js-bin/'.$jquery_maphilight.'"></script>'."\n");

// <!-- begin javascripts for image link scaling -->
echo ('<script type="text/javascript" src="'.$path.'js-bin/'.$ios_orientation.'"></script>'."\n");
echo ('<script type="text/javascript" src="'.$path.'js-bin/'.$rwdImageMaps.'"></script>'."\n");
echo ('<script type="text/javascript">
$(document).ready(function(e) {
	$(\'img[usemap]\').rwdImageMaps();
});
</script>');
// <!-- end javascripts for image link scaling -->
echo ('
    <script type="text/javascript">$(function() {
        $(\'.map\').maphilight();
    });</script>');
// <!-- end javascript for image map link highlights behaviour -->
?>

