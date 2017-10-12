<?php
if ($isindex)
{
if(isset($_POST["title"]) and isset($_POST["author"]) and isset($_POST["series"]) and isset($_POST["category_id"])and isset($_POST["type_id"]) and is_numeric($_POST["category_id"]) and is_numeric($_POST["type_id"]))
{
$title = str_replace("'", '"', $_POST["title"]);
$author = str_replace("'", '"', $_POST["author"]);
$series = str_replace("'", '"', $_POST["series"]);
$category_id=$_POST["category_id"];
$type_id=$_POST["type_id"];

if(!(mb_strlen($title, 'UTF-8')>3))
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aabt[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aabu[0], ENT_QUOTES).'</div></div>
';
}
else
{
$media_id = newmedia($_POST["type_id"],$_POST["category_id"],$_POST["series"],$_POST["title"],$_POST["author"]);
if($media_id==null)
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aadc[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aabs[0], ENT_QUOTES).'</div></div>
';
}
else
{
$body='
<div id="margin"><div id="nothing">'.htmlentities($lang->aacr[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aacs[0], ENT_QUOTES).' <a href="index.php?where=media_display&media_id='.$media_id.'">'.htmlentities($lang->aact[0], ENT_QUOTES).'</a> '.htmlentities($lang->aacu[0], ENT_QUOTES).'</div></div>
';

$title=null;
$author=null;
$series=null;
$category_id=null;
$type_id=null;
}
}
}
else
{
$title=null;
$author=null;
$series=null;
$category_id=null;
$type_id=null;
$body=null;
}

$body=$body.'
<form action="index.php?where=media_new" method="post">

<table id="media_all">
  <tr>
    <td class="left">'.htmlentities($lang->aaat[0], ENT_QUOTES).'</td>
    <td><input class="right1" value='."'".$title."'".' name="title" type="text" size="100" maxlength="100"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aaau[0], ENT_QUOTES).'</td>
    <td><input class="right1" value='."'".$author."'".' name="author" type="text" size="100" maxlength="100"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aabh[0], ENT_QUOTES).'</td>
    <td><input class="right1" value='."'".$series."'".' name="series" type="text" size="100" maxlength="100"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aabi[0], ENT_QUOTES).'</td>
    <td>'.chose_category($category_id).'</td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aabj[0], ENT_QUOTES).'</td>
    <td>'.chose_type($type_id).'</td>
  </tr>
    <tr>
    <td>
</td>
    <td><input class="submit1" type="submit" value="'.htmlentities($lang->aacq[0], ENT_QUOTES).'"></td>
  </tr>
</table>
</form>
';


}