<?php
function html_out($head,$body)
{
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html><head><meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
'.$head.'
</head><body>'.$body.'</body>';
}