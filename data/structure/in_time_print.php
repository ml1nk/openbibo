<?php
if ($isindex)
{
$out = get_in_time($lang,$configuration[4],false);

$out_html=null;

usort($out, 'sort_array_by_time');

for($i=0;$i<count($out);$i++)
{
$number = $i+1;
$out_html=$out_html.'
<tr>
<td class="left">'.$number.'</td>
<td class="left">'.htmlentities($out[$i]["name"], ENT_QUOTES).'</td>
<td class="left">'.htmlentities($out[$i]["email"], ENT_QUOTES).'</td>
<td class="left">'.htmlentities($out[$i]["title"], ENT_QUOTES).'</td>
<td class="left">'.htmlentities($out[$i]["barcode"], ENT_QUOTES).'</td>
<td class="left">'.htmlentities($out[$i]["time"], ENT_QUOTES).'</td>
</tr>
';
}


$body='
<table id="print" rules="all">
<tr>
<td class="title">'.count($out).'</td>
<td class="title">'.htmlentities($lang->aahs[0], ENT_QUOTES).'</td>
<td class="title">'.htmlentities($lang->aaht[0], ENT_QUOTES).'</td>
<td class="title">'.htmlentities($lang->aahu[0], ENT_QUOTES).'</td>
<td class="title">'.htmlentities($lang->aahv[0], ENT_QUOTES).'</td>
<td class="title">'.htmlentities($lang->aaia[0], ENT_QUOTES).'</td>
</tr>
<tr>
<td class="empty" colspan="6"></td>
</tr>
'.$out_html.'
</table>
';
}