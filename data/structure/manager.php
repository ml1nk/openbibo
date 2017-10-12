<?php
if ($isindex)
{
if(isset($_POST["old_pas"]) and isset($_POST["new_pas1"]) and isset($_POST["new_pas2"]))
{
$_POST["old_pas"] = str_replace("'", '"', $_POST["old_pas"]);
$_POST["new_pas1"] = str_replace("'", '"', $_POST["new_pas1"]);
$_POST["new_pas2"] = str_replace("'", '"', $_POST["new_pas2"]);

if(check_pas($session[2],$_POST["old_pas"]))
{
if($_POST["new_pas1"]==$_POST["new_pas2"])
{
if(strlen($_POST["new_pas1"])>5)
{
updatepas($_POST["new_pas1"],$session[1]);
 $body='
<div id="margin"><div id="nothing">'.htmlentities($lang->aagd[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aage[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
 $body='
<div id="margin"><div id="error">'.htmlentities($lang->aagb[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aagc[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}}
else
{
 $body='
<div id="margin"><div id="error">'.htmlentities($lang->aafz[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aaga[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}}
else
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aafx[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aafy[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
}
else
{
$_POST["old_pas"]=null;
$_POST["new_pas1"]=null;
$_POST["new_pas2"]=null;
$body=null;
}


$body=$body.'
<form action="index.php?where=manager" method="post">
<table id="master">
<tr>
<td class="left">'.htmlentities($lang->aacz[0], ENT_QUOTES, "UTF-8").'</td>
<td class="title">'.htmlentities($session[2], ENT_QUOTES).'</td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aafu[0], ENT_QUOTES, "UTF-8").'</td>
<td><input class="input" name="old_pas" value='."'".$_POST["old_pas"]."'".' type="password" size="64" maxlength="64" ></td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aafv[0], ENT_QUOTES, "UTF-8").'</td>
<td><input class="input" name="new_pas1" value='."'".$_POST["new_pas1"]."'".' type="password" size="64" maxlength="64" ></td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aafw[0], ENT_QUOTES, "UTF-8").'</td>
<td><input class="input" name="new_pas2" value='."'".$_POST["new_pas2"]."'".' type="password" size="64" maxlength="64" ></td>
</tr>
<tr>
<td></td>
<td><input id="submit" type="submit" value="'.htmlentities($lang->aafs[0], ENT_QUOTES, "UTF-8").'"></td>
</tr>
</table>
</form>
';
}