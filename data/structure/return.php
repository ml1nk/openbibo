<?php
if ($isindex)
{
$body='
<form action="#" method="post">
<table class="return">
<tr>
<td colspan="2" class="title">'.htmlentities($lang->aaeq[0], ENT_QUOTES, "UTF-8").'</td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aaca[0], ENT_QUOTES, "UTF-8").'</td>
<td><input name="barcode" class="barcode" type="text" size="6" maxlength="6"></td>
</tr>
<tr>
<td colspan="2"><input class="submit" type="submit" value="'.htmlentities($lang->aaer[0], ENT_QUOTES, "UTF-8").'"></td>
</tr>
</table>
</form>
';

if(isset($_POST["barcode"]))
{

$_POST["barcode"]=htmlentities(filter($_POST["barcode"]));
if((is_numeric($_POST["barcode"])) and (strlen($_POST["barcode"])==6))
{
$out = getmediawithbarcode($_POST["barcode"]);
if($out!=null)
{
$success = getandremoveborrow($out["media_id"],$out["copy_id"]);

if($success !=null)
{

$body=$body.'
<div id="margin">
<div id="nothing_special">
<a href="index.php?where=media_display&media_id='.$success["media_id"].'">'.htmlentities($success["media_title"], ENT_QUOTES,"ISO-8859-1").'</a>
<br/>'.htmlentities($lang->aaet[0], ENT_QUOTES, "UTF-8").'<br/>
<a href="index.php?where=user_display&user_id='.$success["user_id"].'">'.htmlentities($success["user_name"], ENT_QUOTES,"ISO-8859-1").'</a>
<br/>
';
if($success["time"][0])
{
$body=$body.'
<div class="green">'.htmlentities($lang->aaeu[0], ENT_QUOTES, "UTF-8").'</div>
';
}
else
{
$body=$body.'
<div class="red">'.htmlentities($lang->aaev[0], ENT_QUOTES, "UTF-8").' '.$success["time"][1].' '.htmlentities($lang->aaew[0], ENT_QUOTES, "UTF-8").'<br/>
';
}
$body=$body.'
</div></div>
';



$body=$body.'
</div></div>
';



}
else
{
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aaea[0], ENT_QUOTES, "UTF-8")."<br/>".htmlentities($lang->aaes[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}


}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaaz[0], ENT_QUOTES, "UTF-8")."<br/>".htmlentities($lang->aaba[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}

}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaax[0], ENT_QUOTES, "UTF-8")."<br/>".htmlentities($lang->aaay[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}

}


}