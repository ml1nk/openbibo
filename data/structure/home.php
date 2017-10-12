<?php
if ($isindex)
{
$body=null;
$search_out=null;

if (!isset($_POST["search_text"]))
{
$body = $body.'<center><div id="info_text">'.
utf8_encode($configuration[5]).
'</div></center>';
}

if (isset($_POST["search_text"]))
{


if (is_numeric ($_POST["search_text"] ) and (strlen($_POST["search_text"]) == 6))
{
$media = getmediawithbarcode($_POST["search_text"]);
if($media!=null)
{
$search_out = $search_out . media_search_overview($media,$lang);
}

$user = getuserwithbarcode($_POST["search_text"]);
if($user!=null)
{
$search_out = $search_out . user_search_overview($user,$lang);
}

}
else
{

$_POST["search_text"] = str_replace("'", '"', $_POST["search_text"]);

if( mb_strlen($_POST["search_text"], 'UTF-8') > 3)
{
$black=null;

$media = getuserwithname($_POST["search_text"]);
if($media!=null){
for($i=0;count($media)>$i;$i++){
$black[count($black)]=$media[$i]["user_id"];
$search_out = $search_out . user_search_overview($media[$i],$lang);
}}

$media = getuserwithemail($_POST["search_text"]);
if($media!=null){
for($i=0;count($media)>$i;$i++){
if(check_array($black,$media[$i]["user_id"]) )
{
$search_out = $search_out . user_search_overview($media[$i],$lang);
}
}}


$black=null;

$media = getmediawithtitle($_POST["search_text"]);
if($media!=null)
{
for($i=0;count($media)>$i;$i++){
$black[count($black)]=$media[$i]["media_id"];
$search_out = $search_out . media_search_overview($media[$i],$lang);
}}


$media = getmediawithauthor($_POST["search_text"]);
if($media!=null)
{
for($i=0;count($media)>$i;$i++){
if(check_array($black,$media[$i]["media_id"]) )
{
$search_out = $search_out . media_search_overview($media[$i],$lang);
}
}}

}
else
{
$search_out = '<div id="error">'.htmlentities($lang->aabc[0], ENT_QUOTES, "UTF-8")."<br/>".htmlentities($lang->aabd[0], ENT_QUOTES, "UTF-8").'</div>';
}

}


if($search_out!=null){
$search_out = '<div id="search_results">'.$search_out.'</div>';
}
else
{
$search_out = '<div id="search_results"><div id="nothing">'.htmlentities($lang->aahx[0], ENT_QUOTES, "UTF-8")."<br/>".htmlentities($lang->aaba[0], ENT_QUOTES, "UTF-8").'</div></div>';
}
}


if(isset($_POST["search_text"])){$oldsearch=$_POST["search_text"];}else{$oldsearch=null;}
$body = $body.'
<form action="#" method="post">
<table id="search_up">
<tr>

<td class="left">'.htmlentities($lang->aaaw[0], ENT_QUOTES, "UTF-8").'</td>
<td><input id="right1" name="search_text" type="text" value='."'".$oldsearch."'".' size="100" maxlength="100"></td>

</tr>
<tr>
<td colspan="2">
<input id="submit" type="submit" value="'.htmlentities($lang->aaav[0], ENT_QUOTES, "UTF-8").'">
</td>
</tr>

</table>
</form>
'.$search_out.'
';

if (!isset($_POST["search_text"]))
{
$out = get_in_time($lang,$configuration[4],true);
$body = $body.'
<table id="home">
<tr>
<td class="left">'.htmlentities($lang->aaaj[0], ENT_QUOTES, "UTF-8").'</td><td class="right">'.getallmedia().'</td>
</tr><tr>
<td class="left">'.htmlentities($lang->aaak[0], ENT_QUOTES, "UTF-8").'</td><td class="right">'.getallcopy().'</td>
</tr><tr>
<td class="left">'.htmlentities($lang->aaaq[0], ENT_QUOTES, "UTF-8").'</td><td class="right">'.getalluser().'</td>
</tr><tr>
<td class="left">'.htmlentities($lang->aaal[0], ENT_QUOTES, "UTF-8").'</td><td class="right">'.getallborrow().'</td>
</tr><tr>
<td class="left">'.htmlentities($lang->aajw[0], ENT_QUOTES, "UTF-8").'</td><td class="right">'.count($out).'</td>
</tr></table>
';
}

}