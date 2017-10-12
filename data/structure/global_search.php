<?php
if ($isindex)
{
$search_out=null;
if ((isset($_POST["search_text"]))and(isset($_POST["search_type"])))
{

if ($_POST["search_type"]=="3")
{
if (is_numeric ($_POST["search_text"] ) and (strlen($_POST["search_text"]) == 6))
{
$media = getmediawithbarcode($_POST["search_text"]);
if($media!=null)
{
$search_out = media_search_overview($media,$lang);
}
else
{
$search_out = '<div id="nothing">'.htmlentities($lang->aaaz[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaba[0], ENT_QUOTES).'</div>';
}
}
else
{
$search_out = '<div id="error">'.htmlentities($lang->aaax[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaay[0], ENT_QUOTES).'</div>';
}}

if ($_POST["search_type"]=="2")
{
$_POST["search_text"]=htmlentities(filter($_POST["search_text"]));
if(strlen($_POST["search_text"]) > 3)
{
$media = getmediawithauthor($_POST["search_text"]);
if($media!=null)
{
$search_out=null;
for($i=0;count($media)>$i;$i++)
{
$search_out = $search_out . media_search_overview($media[$i],$lang);
}
}
else
{
$search_out = '<div id="nothing">'.htmlentities($lang->aabe[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaba[0], ENT_QUOTES).'</div>';
}
}
else
{
$search_out = '<div id="error">'.htmlentities($lang->aabc[0], ENT_QUOTES)."<br/>".htmlentities($lang->aabd[0], ENT_QUOTES).'</div>';
}
}


if ($_POST["search_type"]=="1")
{
$_POST["search_text"]=htmlentities(filter($_POST["search_text"]));
if(strlen($_POST["search_text"]) > 3)
{
$media = getmediawithtitle($_POST["search_text"]);
if($media!=null)
{
$search_out=null;
for($i=0;count($media)>$i;$i++)
{
$search_out = $search_out . media_search_overview($media[$i],$lang);
}
}
else
{
$search_out = '<div id="nothing">'.htmlentities($lang->aabb[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaba[0], ENT_QUOTES).'</div>';
}
}
else
{
$search_out = '<div id="error">'.htmlentities($lang->aabc[0], ENT_QUOTES)."<br/>".htmlentities($lang->aabd[0], ENT_QUOTES).'</div>';
}
}

if($search_out!=null){
$search_out = '<div id="search_results">'.$search_out.'</div>';
}
}


//html_entity_decode()



if ((isset($_POST["search_text"]))and(isset($_POST["search_type"])))
{
$table_id = '<table id="search_up">';
}
else
{
$table_id = '<table id="search_middle">';
}

if ((isset($_POST["search_text"]))and(isset($_POST["search_type"]))and($_POST["search_type"]==2))
{
$selected = '
<option value="1">'.htmlentities($lang->aaat[0], ENT_QUOTES).'</option>
<option value="2" selected>'.htmlentities($lang->aaau[0], ENT_QUOTES).'</option>
<option value="3">'.htmlentities($lang->aaas[0], ENT_QUOTES).'</option>
';
}
else if ((isset($_POST["search_text"]))and(isset($_POST["search_type"]))and($_POST["search_type"]==3))
{
$selected = '
<option value="1" >'.htmlentities($lang->aaat[0], ENT_QUOTES).'</option>
<option value="2">'.htmlentities($lang->aaau[0], ENT_QUOTES).'</option>
<option value="3"selected>'.htmlentities($lang->aaas[0], ENT_QUOTES).'</option>
';
}
else
{
$selected = '
<option value="1" selected>'.htmlentities($lang->aaat[0], ENT_QUOTES).'</option>
<option value="2">'.htmlentities($lang->aaau[0], ENT_QUOTES).'</option>
<option value="3">'.htmlentities($lang->aaas[0], ENT_QUOTES).'</option>
';
}
if(isset($_POST["search_text"])){$oldsearch=htmlentities($_POST["search_text"]);}else{$oldsearch=null;}
$body = '
<form action="#" method="post">
'.$table_id.'
<tr>

<td class="left">'.htmlentities($lang->aaaw[0], ENT_QUOTES).'</td>
<td><input id="right1" name="search_text" type="text" value="'.$oldsearch.'" size="100" maxlength="100"></td>

</tr><tr>

<td class="left">'.htmlentities($lang->aaar[0], ENT_QUOTES).'</td>
<td>
<select id="right2" name="search_type" size="1">
'.$selected.'
</select>

</td>
</tr>
<tr>
<td colspan="2">
<input id="submit" type="submit" value="'.htmlentities($lang->aaav[0], ENT_QUOTES).'">
</td>
</tr>

</table>
</form>
'.$search_out.'
';
}