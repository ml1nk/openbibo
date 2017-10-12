<?php
if ($isindex)
{
$body=null;

if(isset($_GET["delete_id"]) and is_numeric($_GET["delete_id"]))
{
if(remove_days_off($_GET["delete_id"])==0)
{
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aajs[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aajt[0], ENT_QUOTES).'</div></div>
';
}
else
{
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aaju[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aajv[0], ENT_QUOTES).'</div></div>
';
}


}


if(isset($_POST["bigger"]) and isset($_POST["smaller"]))
{
$bigger = strtotime($_POST["bigger"]);
$smaller = strtotime($_POST["smaller"]);

if($bigger!=false and $smaller!=false)
{
$bigger = floor(($bigger+86400)/86400);
$smaller = floor(($smaller+86400)/86400);

if($bigger+1<$smaller)
{
new_days_off($bigger,$smaller);
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aajq[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aajr[0], ENT_QUOTES).'</div></div>
';
}
else
{
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aajo[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aajp[0], ENT_QUOTES).'</div></div>
';
}
}
else
{
 $body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aajm[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aajn[0], ENT_QUOTES).'</div></div>
';
}


}





$days = get_days_off();


if(isset($_POST["new_days_off"]))
{
if(isset($_POST["monday"]))
{
$days[0]="1";
}
else
{
$days[0]="0";
}

if(isset($_POST["tuesday"]))
{
$days[1]="1";
}
else
{
$days[1]="0";
}

if(isset($_POST["wednesday"]))
{
$days[2]="1";
}
else
{
$days[2]="0";
}

if(isset($_POST["thursday"]))
{
$days[3]="1";
}
else
{
$days[3]="0";
}

if(isset($_POST["friday"]))
{
$days[4]="1";
}
else
{
$days[4]="0";
}

if(isset($_POST["saturday"]))
{
$days[5]="1";
}
else
{
$days[5]="0";
}

if(isset($_POST["sunday"]))
{
$days[6]="1";
}
else
{
$days[6]="0";
}

update_days_off($days);
}








if($days[0]==1)
{
$day1 = 'checked';
}
else
{
$day1 = "";
}

if($days[1]==1)
{
$day2 = 'checked';
}
else
{
$day2 = "";
}

if($days[2]==1)
{
$day3 = 'checked';
}
else
{
$day3 = "";
}

if($days[3]==1)
{
$day4 = 'checked';
}
else
{
$day4 = "";
}

if($days[4]==1)
{
$day5 = 'checked';
}
else
{
$day5 = "";
}

if($days[5]==1)
{
$day6 = 'checked';
}
else
{
$day6= "";
}

if($days[6]==1)
{
$day7 = 'checked';
}
else
{
$day7 = "";
}


$body=$body.'
<form action="index.php?where=days_off" method="post">
<input type="hidden" name="new_days_off" value="yes">
<table id="master">
<tr>
<td class="title" colspan="7">'.htmlentities($lang->aajf[0], ENT_QUOTES).'</td>
</tr>
<tr>
<td class="title2">'.htmlentities($lang->aaiy[0], ENT_QUOTES).'</td>
<td class="title2">'.htmlentities($lang->aaiz[0], ENT_QUOTES).'</td>
<td class="title2">'.htmlentities($lang->aaja[0], ENT_QUOTES).'</td>
<td class="title2">'.htmlentities($lang->aajb[0], ENT_QUOTES).'</td>
<td class="title2">'.htmlentities($lang->aajc[0], ENT_QUOTES).'</td>
<td class="title2">'.htmlentities($lang->aajd[0], ENT_QUOTES).'</td>
<td class="title2">'.htmlentities($lang->aaje[0], ENT_QUOTES).'</td>
</tr>
<tr>
<td><input type="checkbox" name="monday" value="1" '.$day1 .'></td>
<td><input type="checkbox" name="tuesday" value="1" '.$day2 .'></td>
<td><input type="checkbox" name="wednesday" value="1" '.$day3 .'></td>
<td><input type="checkbox" name="thursday" value="1" '.$day4 .'></td>
<td><input type="checkbox" name="friday" value="1" '.$day5 .'></td>
<td><input type="checkbox" name="saturday" value="1" '.$day6 .'></td>
<td><input type="checkbox" name="sunday" value="1" '.$day7 .'></td>
</tr>
<tr>
<td colspan="7"><input id="submit" type="submit" value="'.htmlentities($lang->aajg[0], ENT_QUOTES).'"></td>
</tr>
</table>
</form>
';

$out = getalldays();

if($out!=null)
 {
$body=$body.'
<table id="show_all" >
 <tr>
<td class="title">'.htmlentities($lang->aajh[0], ENT_QUOTES).'</td>
<td class="title">'.htmlentities($lang->aaji[0], ENT_QUOTES).'</td>
 <td></td>
 </tr>
';
for($i=0;count($out)>$i;$i++)
{
 $body=$body.'
<tr>
<td class="left">'.htmlentities($out[$i]["date_bigger"], ENT_QUOTES).'</td>
<td class="left">'.htmlentities($out[$i]["date_smaller"], ENT_QUOTES).'</td>
<td class="left1"><a href="index.php?where=days_off&delete_id='.$out[$i]["days_off_id"].'">'.htmlentities($lang->aabk[0], ENT_QUOTES).'</a></td>
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
<div id="margin1"><div id="nothing">'.htmlentities($lang->aajj[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aajk[0], ENT_QUOTES).'</div></div>
';
 }


$body=$body.'
<form action="index.php?where=days_off" method="post">

<table id="media_all">
<tr>
<td class="title" colspan="2">'.htmlentities($lang->aajl[0], ENT_QUOTES).'</td>
</tr>
  <tr>
    <td class="left">'.htmlentities($lang->aajh[0], ENT_QUOTES).'</td>
    <td><input class="right1" name="bigger" type="text" size="50" maxlength="50"></td>
  </tr>
    <tr>
    <td class="left">'.htmlentities($lang->aaji[0], ENT_QUOTES).'</td>
    <td><input class="right1" name="smaller" type="text" size="50" maxlength="50"></td>
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