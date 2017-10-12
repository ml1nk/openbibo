<?php
if ($isindex)
{

if(isset($_GET["delete_id"]) and is_numeric($_GET["delete_id"]) and $_GET["delete_id"] != $session[1])
{
if(delete_manager($_GET["delete_id"]))
{
 $body='
<div id="margin"><div id="nothing">'.htmlentities($lang->aaho[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aahp[0], ENT_QUOTES).'</div></div>
';
}
else
{
 $body='
<div id="margin"><div id="nothing">'.htmlentities($lang->aahq[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aahr[0], ENT_QUOTES).'</div></div>
';
}

}
else
{
$body=null;
}


if(isset($_POST["name"]) and isset($_POST["password1"]) and isset($_POST["password2"]))
{
$_POST["name"] = str_replace("'", '"', $_POST["name"]);
$_POST["password1"] = str_replace("'", '"', $_POST["password1"]);
$_POST["password2"] = str_replace("'", '"', $_POST["password2"]);



if( mb_strlen($_POST["name"], 'UTF-8') > 3)
{
if($_POST["password1"]==$_POST["password2"])
{
if( mb_strlen($_POST["password1"], 'UTF-8') > 5)
{
if(!(if_manager_exist($_POST["name"])))
{
newmanager($_POST["password1"],$_POST["name"]);
 $_POST["name"]=null;
$_POST["password1"]=null;
$_POST["password2"]=null;
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aahi[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aahj[0], ENT_QUOTES).'</div></div>
';
}
else
{
 $body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aahg[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aahh[0], ENT_QUOTES).'</div></div>
';
}

}
else
{
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aahf[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aagc[0], ENT_QUOTES).'</div></div>
';
}
}
else
{
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aahd[0], ENT_QUOTES)."<br/>".htmlentities($lang->aahe[0], ENT_QUOTES).'</div></div>
';
}
}
else
{
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aahb[0], ENT_QUOTES)."<br/>".htmlentities($lang->aahc[0], ENT_QUOTES).'</div></div>
';
}

}
else
{
$_POST["name"]=null;
$_POST["password1"]=null;
$_POST["password2"]=null;
}




if(isset($_POST["password_new"]) and isset($_POST["password_manager"]) and is_numeric($_POST["password_manager"]))
{

$_POST["password_new"] = str_replace("'", '"', $_POST["password_new"]);

if( mb_strlen($_POST["password_new"], 'UTF-8') > 5)
{
updatepas($_POST["password_new"],$_POST["password_manager"]);
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aagd[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aage[0], ENT_QUOTES).'</div></div>
';
}
else
{
 $body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aagb[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aagc[0], ENT_QUOTES).'</div></div>
';
}
}


$out = getallmanager($session[1]);

if($out!=null)
 {
$body=$body.'
<table id="show_all" >
 <tr>
<td class="title">'.htmlentities($lang->aacz[0], ENT_QUOTES).'</td>
<td class="title">'.htmlentities($lang->aahm[0], ENT_QUOTES).'</td>
 <td></td>
 </tr>
';
for($i=0;count($out)>$i;$i++)
{
 $body=$body.'
<tr>
<td class="left">'.htmlentities($out[$i]["name"], ENT_QUOTES).'</td>
<td class="left">
<form action="index.php?where=manager_new" method="post">
<input type="hidden" name="password_manager" value="'.$out[$i]["manager_id"].'">
<table>
<tr>
<td><input class="right2" name="password_new" type="password" size="64" maxlength="64"></td>
<td><input class="submit2" type="submit" value="'.htmlentities($lang->aahn[0], ENT_QUOTES).'"></td>
</tr>
</table>
</form>
</td>
<td class="left"><a href="index.php?where=manager_new&delete_id='.$out[$i]["manager_id"].'">'.htmlentities($lang->aabk[0], ENT_QUOTES).'</a></td>
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
<form action="index.php?where=manager_new" method="post">

<table id="media_all">
  <tr>
    <td class="left">'.htmlentities($lang->aacz[0], ENT_QUOTES).'</td>
    <td><input class="right1" value='."'".$_POST["name"]."'".' name="name" type="text" size="50" maxlength="50"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aagz[0], ENT_QUOTES).'</td>
    <td><input class="right1" value='."'".$_POST["password1"]."'".' name="password1" type="password" size="64" maxlength="64"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aaha[0], ENT_QUOTES).'</td>
    <td><input class="right1" value='."'".$_POST["password2"]."'".' name="password2" type="password" size="64" maxlength="64"></td>
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