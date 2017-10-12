<?php
$isindex=true; // structures only load when $isindex is set
if(!isset($_GET['where'])){$_GET['where']=null;}
require_once("db.php"); // include all necessary files
require_once("include.php"); // include all necessary files
db::connect($mysqlhost, $mysqluser, $mysqlpwd, $mysqldb); // connect to database
$configuration = load_config(); // load the configuration from the database
$lang = load_lang($configuration[0]); //load the language file

$head = '<title>'.htmlentities($lang->aags[0], ENT_QUOTES, "UTF-8").'</title>'.load_design($configuration[1],"opac",false);

$search_out=null;
if (isset($_POST["search_text"]))
{


if (is_numeric ($_POST["search_text"] ) and (strlen($_POST["search_text"]) == 6))
{
$media = getmediawithbarcode($_POST["search_text"]);
if($media!=null)
{
$search_out = $search_out . media_search_overview($media,$lang);
}

}
else
{

$_POST["search_text"] = str_replace("'", '"', $_POST["search_text"]);

if( mb_strlen($_POST["search_text"], 'UTF-8') > 3)
{

$black=null;

$media = getmediawithtitle($_POST["search_text"]);
if($media!=null)
{
for($i=0;count($media)>$i;$i++){
$black[count($black)]=$media[$i]["media_id"];
$search_out = $search_out . media_search_overview($media[$i],$lang,true);
}}


$media = getmediawithauthor($_POST["search_text"]);
if($media!=null)
{
for($i=0;count($media)>$i;$i++){
if(check_array($black,$media[$i]["media_id"]) )
{
$search_out = $search_out . media_search_overview($media[$i],$lang,true);
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



if (isset($_POST["search_text"]))
{
$table_id = '<table id="search_up">';
}
else
{
$table_id = '<table id="search_middle">';
}


if(isset($_POST["search_text"])){$oldsearch=$_POST["search_text"];}else{$oldsearch=null;}
$body = '
<form action="#" method="post">
'.$table_id.'
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
html_out($head,"<div id='main'><div id='body'>".$body."</div></div>");
db::get()->close(); // close the database connection
