<?php
if ($isindex)
{
$body='
<form action="#" method="post">
<table class="extend">
<tr>
<td colspan="2" class="title">'.htmlentities($lang->aaex[0], ENT_QUOTES).'</td>
</tr>
<tr>
<td class="left">'.htmlentities($lang->aaca[0], ENT_QUOTES).'</td>
<td><input name="barcode" class="barcode" type="text" size="6" maxlength="6"></td>
</tr>
<tr>
<td colspan="2"><input class="submit" type="submit" value="'.htmlentities($lang->aaey[0], ENT_QUOTES).'"></td>
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
$success = updateborrow($out["media_id"],$out["copy_id"],$configuration[4]);

if($success !=null)
{

$body=$body.'
<div id="margin">
<div id="nothing_special">
<a href="index.php?where=media_display&media_id='.$out["media_id"].'">'.htmlentities($out["title"], ENT_QUOTES).'</a>
<br/>'.htmlentities($lang->aaet[0], ENT_QUOTES).'<br/>
<a href="index.php?where=user_display&user_id='.$success[1].'">'.htmlentities($success[2], ENT_QUOTES).'</a>
<br/>
'.htmlentities($lang->aafa[0], ENT_QUOTES).' '.$success[0].'. '.htmlentities($lang->aafb[0], ENT_QUOTES).'
<br/>
';
if($success[3][0])
{
$body=$body.'
<div class="green">'.htmlentities($lang->aafc[0], ENT_QUOTES).'</div>
';
}
else
{
$body=$body.'
<div class="red">'.htmlentities($lang->aaev[0], ENT_QUOTES).' '.$success[3][1].' '.htmlentities($lang->aafd[0], ENT_QUOTES).'<br/>
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
<div id="margin"><div id="nothing">'.htmlentities($lang->aaez[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaes[0], ENT_QUOTES).'</div></div>
';
}


}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaaz[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaba[0], ENT_QUOTES).'</div></div>
';
}

}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaax[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaay[0], ENT_QUOTES).'</div></div>
';
}

}


}

