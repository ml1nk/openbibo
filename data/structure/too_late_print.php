<?php
if ($isindex)
{
$out = get_in_time($lang,$configuration[4],true);

$out_html=null;

usort($out, 'sort_array_by_time');

for($i=0;$i<count($out);$i++)
{
$number = $i+1;
$out_html=$out_html.'
<tr>
<td class="left">'.$number.'</td>
<td class="left">'.htmlentities($out[$i]["name"], ENT_QUOTES,"ISO-8859-1").'</td>
<td class="left">'.htmlentities($out[$i]["email"], ENT_QUOTES,"ISO-8859-1").'</td>
<td class="left">'.htmlentities($out[$i]["title"], ENT_QUOTES,"ISO-8859-1").'</td>
<td class="left">'.htmlentities($out[$i]["barcode"], ENT_QUOTES,"ISO-8859-1").'</td>
<td class="left">'.htmlentities($out[$i]["time"], ENT_QUOTES,"ISO-8859-1").'</td>
<td class="left">'.htmlentities($out[$i]["days_late"], ENT_QUOTES,"ISO-8859-1").'</td>
<td class="left">'.htmlentities($out[$i]["cent_per_day"], ENT_QUOTES,"ISO-8859-1").'</td>
</tr>
';
}


$body='
<table id="print" rules="all">
<tr>
<td class="title">'.count($out).'</td>
<td class="title">'.htmlentities($lang->aahs[0], ENT_QUOTES, "UTF-8").'</td>
<td class="title">'.htmlentities($lang->aaht[0], ENT_QUOTES, "UTF-8").'</td>
<td class="title">'.htmlentities($lang->aahu[0], ENT_QUOTES, "UTF-8").'</td>
<td class="title">'.htmlentities($lang->aahv[0], ENT_QUOTES, "UTF-8").'</td>
<td class="title">'.htmlentities($lang->aahw[0], ENT_QUOTES, "UTF-8").'</td>
<td class="title">'.htmlentities($lang->aakg[0], ENT_QUOTES, "UTF-8").'</td>
<td class="title">'.htmlentities($lang->aakl[0], ENT_QUOTES, "UTF-8").'</td>
</tr>
<tr>
<td class="empty" colspan="6"></td>
</tr>
'.$out_html.'
</table>
';
}
