<?php
if ($isindex)
{
if(isset($_POST["library_name"]) and isset($_POST["logout_time"]) and isset($_POST["borrow_days"]) and isset($_POST["language"]) and isset($_POST["design"]) and isset($_POST["info_text"]) and isset($_POST["cent_per_day"])) 
{
$anything=false;
$numeric=false;
$body=null;
$_POST["library_name"] = str_replace("'", '"', $_POST["library_name"]);
$_POST["logout_time"] = str_replace("'", '"', $_POST["logout_time"]);
$_POST["borrow_days"] = str_replace("'", '"', $_POST["borrow_days"]);
$_POST["language"] = str_replace("'", '"', $_POST["language"]);
$_POST["design"] = str_replace("'", '"', $_POST["design"]);
$_POST["info_text"] = str_replace("'", '"', $_POST["info_text"]);
$_POST["cent_per_day"] = str_replace("'", '"', $_POST["cent_per_day"]);

if($configuration[3]!=$_POST["library_name"])
{
update_library_name($_POST["library_name"]);
$anything=true;
}

if($configuration[0]!=$_POST["language"])
{
update_language($_POST["language"]);
$anything=true;
}

if($configuration[1]!=$_POST["design"])
{
update_design($_POST["design"]);
$anything=true;
}


if($configuration[2]!=$_POST["logout_time"])
{
if(!update_logout_time($_POST["logout_time"]))
{$numeric=true;}
$anything=true;
}

if($configuration[6]!=$_POST["cent_per_day"])
{
if(!update_cent_per_day($_POST["cent_per_day"]))
{$numeric=true;}
$anything=true;
}

if($configuration[5]!=$_POST["info_text"])
{
update_info_text($_POST["info_text"]);
$anything=true;
}

if($configuration[4]!=$_POST["borrow_days"])
{
if(!update_borrow_days($_POST["borrow_days"]))
{$numeric=true;}
$anything=true;
}

if($numeric)
{
 $body='
<div id="margin"><div id="error">'.htmlentities($lang->aagl[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aagm[0], ENT_QUOTES).'</div></div>
';
}

if($anything){$configuration = load_config();}
}
else
{
$body=null;
}



$body=$body.'
<form action="index.php?where=configuration" method="post">
<table id="master">
<tr>
<td class="left">'.htmlentities($lang->aagn[0], ENT_QUOTES).'</td>
<td><input class="input" name="library_name" value="'.htmlentities($configuration[3], ENT_QUOTES).'" type="text" size="80" maxlength="80" ></td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aakc[0], ENT_QUOTES).'</td>
<td><input class="input" name="info_text" value="'.htmlentities($configuration[5], ENT_QUOTES).'" type="text" size="500" maxlength="500" ></td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aago[0], ENT_QUOTES).'</td>
<td><input class="input" name="logout_time" value="'.htmlentities($configuration[2], ENT_QUOTES).'" type="text" size="11" maxlength="11" ></td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aagp[0], ENT_QUOTES).'</td>
<td><input class="input" name="borrow_days" value="'.htmlentities($configuration[4], ENT_QUOTES).'" type="text" size="11" maxlength="11" ></td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aakk[0], ENT_QUOTES).'</td>
<td><input class="input" name="cent_per_day" value="'.htmlentities($configuration[6], ENT_QUOTES).'" type="text" size="11" maxlength="11" ></td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aagq[0], ENT_QUOTES).'</td>
<td>'.chose_design($configuration[1]).'</td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aagr[0], ENT_QUOTES).'</td>
<td>'.chose_language($configuration[0]).'</td>
</tr>
<tr>
<td></td>
<td><input id="submit" type="submit" value="'.htmlentities($lang->aafs[0], ENT_QUOTES).'"></td>
</tr>
</table>
</form>
';
}