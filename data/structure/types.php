<?php
if ($isindex)
{
$body=null;

if(isset($_GET["delete"]) and is_numeric($_GET["delete"]))
{
if((isset($_POST["really"])) and ($_POST["really"]=="yes"))
{
delete_type($_GET["delete"]);
$body='
<div id="margin"><div id="nothing">'.htmlentities($lang->aaip[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aaby[0], ENT_QUOTES).'</div></div>
';
}
else
{
$body='
<div id="margin"><div id="error_special">'.htmlentities($lang->aaiu[0], ENT_QUOTES).'<br/>'.'
<form action="index.php?where=types&delete='.$_GET["delete"].'" method="post">
<input name="really" type="hidden" value="yes" >
<input id="float_left" class="submit3" type="submit" value="'.htmlentities($lang->aack[0], ENT_QUOTES).'">
</form>
<div id="float_right" class="over_all_out"><a  class="over_all" href="index.php?where=types">'.htmlentities($lang->aacl[0], ENT_QUOTES).'</a></div>
</div></div>
'.$body;
}}




if(isset($_POST["type_id"]) and is_numeric($_POST["type_id"]))
{

$_POST["change_type"] = str_replace("'", '"', $_POST["change_type"]);

if( mb_strlen($_POST["change_type"], 'UTF-8') > 3)
{
changetype($_POST["change_type"],$_POST["type_id"]);
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aair[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aaik[0], ENT_QUOTES).'</div></div>
';
}
else
{
 $body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaiq[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aaih[0], ENT_QUOTES).'</div></div>
';
}
}


if(isset($_POST["new_type"]))
{

$_POST["new_type"] = str_replace("'", '"', $_POST["new_type"]);

if( mb_strlen($_POST["new_type"], 'UTF-8') > 3)
{
newtype($_POST["new_type"]);
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aait[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aaif[0], ENT_QUOTES).'</div></div>
';
}
else
{
 $body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aais[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aaih[0], ENT_QUOTES).'</div></div>
';
}
}


$out = getalltypes();

if($out!=null)
 {
$body=$body.'
<table id="show_all"
 <tr>
<td class="title">'.htmlentities($lang->aaib[0], ENT_QUOTES).'</td>
<td class="title">'.htmlentities($lang->aaim[0], ENT_QUOTES).'</td>
 <td></td>
 </tr>
';
for($i=0;count($out)>$i;$i++)
{
 $body=$body.'
<tr>
<td class="left">'.htmlentities($out[$i]["count"], ENT_QUOTES).'</td>
<td class="left">
<form action="index.php?where=types" method="post">
<input type="hidden" name="type_id" value="'.$out[$i]["type_id"].'">
<table>
<tr>
<td><input class="right2" name="change_type" value='."'".$out[$i]["name"]."'".' size="40" maxlength="40"></td>
<td><input class="submit2" type="submit" value="'.htmlentities($lang->aahn[0], ENT_QUOTES).'"></td>
</tr>
</table>
</form>
</td>
<td class="left"><a href="index.php?where=types&delete='.$out[$i]["type_id"].'">'.htmlentities($lang->aabk[0], ENT_QUOTES).'</a></td>
 </tr>
 ';
}
$body=$body.'
</table>
';

 }
 else
 {
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aahk[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aahl[0], ENT_QUOTES).'</div></div>
';
 }




$body=$body.'
<form action="index.php?where=types" method="post">

<table id="media_all">
  <tr>
    <td class="left">'.htmlentities($lang->aain[0], ENT_QUOTES).'</td>
    <td><input class="right1" name="new_type" type="text" size="50" maxlength="50"></td>
  </tr>
    <tr>
    <td>
</td>
    <td><input class="submit1" type="submit" value="'.htmlentities($lang->aaao[0], ENT_QUOTES).'"></td>
  </tr>
</table>
</form>
';


}
