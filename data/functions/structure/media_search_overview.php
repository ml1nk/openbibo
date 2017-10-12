<?php
function media_search_overview($info,$lang,$link=false)
{
if ($info["available"])
{
$available='<td class="available" colspan="2">'.htmlentities($lang->aabf[0], ENT_QUOTES, "UTF-8").'</td>';
}
else
{
$available='<td class="unavailable" colspan="2">'.htmlentities($lang->aabg[0], ENT_QUOTES, "UTF-8").'</td>';
}
if ($link)
{
$out=htmlentities($info["title"], ENT_QUOTES);
}
else
{
$out='<a href="index.php?where=media_display&media_id='.$info["media_id"].'">'.htmlentities($info["title"], ENT_QUOTES).'</a>';
}


$medienart = getmediatyp($info["type_id"]);
return'
<table class="search_out">
  <tr>
    <td class="title" colspan="2">'.$out.'</td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aaau[0], ENT_QUOTES, "UTF-8").'</td>
    <td class="right">'.htmlentities($info["author"], ENT_QUOTES).'</td>
  </tr>
    <tr>
    <td class="left">'.htmlentities($lang->aabh[0], ENT_QUOTES, "UTF-8").'</td>
    <td class="right">'.htmlentities($info["series"], ENT_QUOTES).'</td>
  </tr>
    <tr>
    <td class="left">'.htmlentities($lang->aabi[0], ENT_QUOTES, "UTF-8").'</td>
    <td class="right">'.htmlentities(getmediacategory($info["category_id"]), ENT_QUOTES).'</td>
  </tr>
    <tr>
    <td class="left">'.htmlentities($lang->aabj[0], ENT_QUOTES, "UTF-8").'</td>
    <td class="right">'.htmlentities($medienart[0], ENT_QUOTES).'</td>
  </tr>
    <tr>
    '.$available.'
  </tr>
</table>
';
}