<?php
function html_out($head,$body)
{
echo '<!DOCTYPE html>
<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
'.$head.'
</head><body>'.$body.'</body>';
}