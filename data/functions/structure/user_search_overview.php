<?php
function user_search_overview($info,$lang)
{
if ($info["status"]==0)
{
$status='<td class="nothing_out" colspan="2">'.htmlentities($lang->aadh[0], ENT_QUOTES, "UTF-8").'</td>';
}
else if ($info["status"]==1)
{
$status='<td class="out" colspan="2">'.htmlentities($lang->aadi[0], ENT_QUOTES, "UTF-8").'</td>';
}
else
{
$status='<td class="too_late_out" colspan="2">'.htmlentities($lang->aadj[0], ENT_QUOTES, "UTF-8").'</td>';
}

return'
<table class="search_out">
  <tr>
    <td class="title" colspan="2"><a href="index.php?where=user_display&user_id='.$info["user_id"].'">'.htmlentities($info["name"], ENT_QUOTES,"ISO-8859-1").'</a></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aada[0], ENT_QUOTES, "UTF-8").'</td>
    <td class="right"><a href="mailto:'.htmlentities($info["email"], ENT_QUOTES,"ISO-8859-1").'">'.htmlentities($info["email"], ENT_QUOTES,"ISO-8859-1").'</a></td>
  </tr>
    <tr>
    <td class="left">'.htmlentities($lang->aaca[0], ENT_QUOTES, "UTF-8").'</td>
    <td class="right">'.htmlentities($info["barcode"], ENT_QUOTES,"ISO-8859-1").'</td>
  </tr>
    <tr>
    '.$status.'
  </tr>
</table>
';
}