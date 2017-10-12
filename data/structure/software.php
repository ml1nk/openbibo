<?php
if ($isindex)
{
$body=null;
$out = get_in_time($lang,$configuration[4],true);
$body = $body.'
<table id="home">
<tr>
<td class="title" colspan="2">'.htmlentities($lang->aajz[0], ENT_QUOTES).'</td>
</tr
<tr>
<td class="left">'.htmlentities($lang->aaka[0], ENT_QUOTES).'</td><td class="right">'.$software_version.'</td>
</tr><tr>
<td class="left">'.htmlentities($lang->aakb[0], ENT_QUOTES).'</td><td class="right">'.$database_version.'</td>
</tr></table>
';

}