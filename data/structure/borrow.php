<?php
if ($isindex)
{

if(isset($_POST["user"]))
{

$_POST["user"]=htmlentities(filter($_POST["user"]));
if((is_numeric($_POST["user"])) and (strlen($_POST["user"])==6))
{
$out2=getuserwithbarcode($_POST["user"]);
if($out2!=null)
{

if(isset($_POST["media_copy"]))
{
$_POST["media_copy"]=htmlentities(filter($_POST["media_copy"]));
if((is_numeric($_POST["media_copy"])) and (strlen($_POST["media_copy"])==6))
{
$out = getmediawithbarcode($_POST["media_copy"]);
if($out!=null)
{

$is_new = newborrow($out2["user_id"],$out["media_id"],$out["copy_id"],$configuration[4]);
if(!$is_new)
{
$body=chosecopy($_POST["media_copy"],$_POST["user"],$lang);
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aaeg[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aabw[0], ENT_QUOTES).'</div></div>
'. media_search_overview($out,$lang) . user_search_overview($out2,$lang);
}
else
{
$out = getmediawithbarcode($_POST["media_copy"]);
$out2=getuserwithbarcode($_POST["user"]);
$body=choseuser(null,$lang);
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aaeo[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaep[0], ENT_QUOTES).'</div></div>
'. media_search_overview($out,$lang) . user_search_overview($out2,$lang);
}
}
else
{
$body=chosecopy($_POST["media_copy"],$_POST["user"],$lang);
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aaaz[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaba[0], ENT_QUOTES).'</div></div>
'. user_search_overview($out2,$lang);
}


}
else
{
$body=chosecopy($_POST["media_copy"],$_POST["user"],$lang);
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaax[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaay[0], ENT_QUOTES).'</div></div>
'. user_search_overview($out2,$lang);
}
}
else
{
$body=chosecopy(null,$_POST["user"],$lang) . user_search_overview($out2,$lang);
}

}
else
{
$body=choseuser($_POST["user"],$lang);
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaen[0], ENT_QUOTES)."<br/>".htmlentities($lang->aabu[0], ENT_QUOTES).'</div></div>
';
}

}
else
{
$body=choseuser($_POST["user"],$lang);
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaax[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaay[0], ENT_QUOTES).'</div></div>
';
}
}
else
{
$body=choseuser(null,$lang);
}


}