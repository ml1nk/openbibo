<?php
function allow_url_fopen(){
if(ini_get('allow_url_fopen') !== false)
{
return true;
}
else{
return false;
}
}