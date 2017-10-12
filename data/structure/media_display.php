<?php
if ($isindex)
{


if (isset($_GET["media_id"]))
{
if(is_numeric ($_GET["media_id"]))
{
$sql = 'SELECT * FROM media_list WHERE media_id = "'.filter($_GET["media_id"]).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}

if(mysqli_num_rows($adressen_query)==0)
{
$body='
<div id="middle"><div id="error">'.htmlentities($lang->aabm[0], ENT_QUOTES)." ".$_GET["media_id"]." ".htmlentities($lang->aabn[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aabo[0], ENT_QUOTES).'</div></div>
';
}
else
{
$adr = mysqli_fetch_array($adressen_query);

if(isset($_POST["title"]) and isset($_POST["author"]) and isset($_POST["series"]) and isset($_POST["category_id"])and isset($_POST["type_id"]) and is_numeric($_POST["category_id"]) and is_numeric($_POST["type_id"]))
{
$_POST["title"] = str_replace("'", '"', $_POST["title"]);
$_POST["author"] = str_replace("'", '"', $_POST["author"]);
$_POST["series"] = str_replace("'", '"', $_POST["series"]);

if(mb_strlen($_POST["title"], 'UTF-8') > 3)
{

if($_POST["title"]==$adr["title"] and $_POST["author"]==$adr["author"] and $_POST["series"]==$adr["series"] and $_POST["category_id"]==$adr["category_id"] and $_POST["type_id"]==$adr["type_id"])
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aabp[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aabq[0], ENT_QUOTES).'</div></div>
';
}
else
{
$not_douple = updatemedia($_GET["media_id"],$_POST["type_id"],$_POST["category_id"],$_POST["series"],$_POST["title"],$_POST["author"]);
if(!$not_douple)
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aabp[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aabs[0], ENT_QUOTES).'</div></div>
';
}
else
{
$sql = 'SELECT * FROM media_list WHERE media_id = "'.filter($_GET["media_id"]).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$adr = mysqli_fetch_array($adressen_query);
$body=null;
}
}
}
else
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aabt[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aabu[0], ENT_QUOTES).'</div></div>
';
}
}
else
{$body=null;}


if(isset($_POST["new_copy"]))
{
$barcode=htmlentities(filter($_POST["new_copy"]));

if((is_numeric($_POST["new_copy"])) and (strlen($_POST["new_copy"])==6))
{
$is_new = newbarcode($_GET["media_id"],$_POST["new_copy"]);
if(!$is_new)
{
$barcode=$_POST["new_copy"];
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aabv[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aabw[0], ENT_QUOTES).'</div></div>
';
}
else
{
$barcode=null;
}
}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaax[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaay[0], ENT_QUOTES).'</div></div>
';
}}else{$barcode=null;}


if(isset($_GET["delete_copy"]) and is_numeric($_GET["delete_copy"]))
{
$really=delete_copy($_GET["delete_copy"],$_GET["media_id"]);

if($really)
{
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aabx[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aaby[0], ENT_QUOTES).'</div></div>
';
}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaec[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aaed[0], ENT_QUOTES).'</div></div>
';
}


}

$body=$body.'
<form action="index.php?where=media_display&media_id='.$_GET["media_id"].'" method="post">

<table id="media_all">
  <tr>
    <td class="left">'.htmlentities($lang->aaat[0], ENT_QUOTES).'</td>
    <td><input class="right1" value="'.htmlentities($adr["title"], ENT_QUOTES).'" name="title" type="text" size="100" maxlength="100"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aaau[0], ENT_QUOTES).'</td>
    <td><input class="right1" value="'.htmlentities($adr["author"], ENT_QUOTES).'" name="author" type="text" size="100" maxlength="100"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aabh[0], ENT_QUOTES).'</td>
    <td><input class="right1" value="'.htmlentities($adr["series"], ENT_QUOTES).'" name="series" type="text" size="100" maxlength="100"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aabi[0], ENT_QUOTES).'</td>
    <td>'.chose_category($adr["category_id"]).'</td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aabj[0], ENT_QUOTES).'</td>
    <td>'.chose_type($adr["type_id"]).'</td>
  </tr>
    <tr>
    <td>
<div class="over_all_out"><a class="over_all" id="change" href="index.php?where=media_display&media_id='.$_GET["media_id"].'&delete=yes">'.htmlentities($lang->aabk[0], ENT_QUOTES).'</a></div>
</td>
    <td><input class="submit1" type="submit" value="'.htmlentities($lang->aabr[0], ENT_QUOTES).'"></td>
  </tr>
</table>
</form>
';

$copy = getcopy($_GET["media_id"]);

if (count($copy)!=0)
{

$body=$body.'
<table id="barcodes">';

$body=$body.'
<tr><td id="media_copy" colspan="5">'.htmlentities($lang->aabz[0], ENT_QUOTES).'</td></tr>';

$body=$body.'
<tr>';
$body=$body.'
<td id=title_left>'.htmlentities($lang->aaca[0], ENT_QUOTES).'</td>';
$body=$body.'
<td id=title_middle_left>'.htmlentities($lang->aacb[0], ENT_QUOTES).'</td>';
$body=$body.'
<td id=title_middle>'.htmlentities($lang->aacc[0], ENT_QUOTES).'</td>';
$body=$body.'
<td id=title_middle_right>'.htmlentities($lang->aacd[0], ENT_QUOTES).'</td>';
$body=$body.'
<td id=title_right></td>';
$body=$body.'
</tr>';

for($i=0;count($copy)>$i;$i++)
{
$body=$body.'
<tr>';

$body=$body.'
<td class="copy_left">'.$copy[$i]["barcode"].'</td>';

if (isset($copy[$i]["user"]["nothing"]))
{
$body=$body.'
<td class="empty"></td>
<td class="empty"></td>
<td class="empty"></td>
';
}
else
{
$timer=time_to_borrow($copy[$i]["user"]["timestamp"],$copy[$i]["user"]["days"]);

if($timer[0])
{
$out_time='<div class="green">'.$timer[1].'</div>';
}
else
{
$out_time='<div class="red">'.$timer[1].'</div>';
}


$body=$body.'
<td class="copy_middle_left"><a href="index.php?where=user_display&user_id='.$copy[$i]["user"]["user_id"].'">'.htmlentities($copy[$i]["user"]["name"], ENT_QUOTES).'</a></td>';
$body=$body.'
<td class="copy_middle">'.$copy[$i]["user"]["renewal_count"].'</td>';
$body=$body.'
<td class="copy_middle_right">'.$out_time.'</td>';
}

$body=$body.'
<td class="copy_right">
<a href="index.php?where=media_display&media_id='.$_GET["media_id"].'&delete_copy='.$copy[$i]["copy_id"].'">'.htmlentities($lang->aabk[0], ENT_QUOTES).'</a>
</td>';

$body=$body.'
</tr>';
}
$body=$body.'
</table>';
}
else
{
$body=$body.'
<div id="nothing">'.htmlentities($lang->aace[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aacf[0], ENT_QUOTES).'</div>
';
}

$body=$body.'
<form action="index.php?where=media_display&media_id='.$_GET["media_id"].'" method="post">
<table id="new_copy">
  <tr>
    <td  id="new_copy_title" colspan="2">'.htmlentities($lang->aacg[0], ENT_QUOTES).'</td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aaca[0], ENT_QUOTES).'</td>
    <td><input id="new_copy_input" value="'.$barcode.'" name="new_copy" type="text" size="6" maxlength="6"></td>
  </tr>
  <tr>
    <td colspan="2"><input  id="new_copy_submit" type="submit" value="'.htmlentities($lang->aach[0], ENT_QUOTES).'"></td>
  </tr>
</table>
</form>
';

if(isset($_GET["delete"]) and $_GET["delete"]=="yes")
{
if((isset($_POST["really"])) and ($_POST["really"]=="yes"))
{
delete_media($_GET["media_id"]);
$body='
<div id="margin"><div id="nothing">'.htmlentities($lang->aaci[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aaby[0], ENT_QUOTES).'</div></div>
';
}
else
{
$body='
<div id="margin"><div id="error_special">'.htmlentities($lang->aacj[0], ENT_QUOTES).'<br/>'.'
<form action="index.php?where=media_display&media_id='.$_GET["media_id"].'&delete=yes" method="post">
<input name="really" type="hidden" value="yes" >
<input id="float_left" class="submit2" type="submit" value="'.htmlentities($lang->aack[0], ENT_QUOTES).'">
</form>
<div id="float_right" class="over_all_out"><a  class="over_all" href="index.php?where=media_display&media_id='.$_GET["media_id"].'">'.htmlentities($lang->aacl[0], ENT_QUOTES).'</a></div>
</div></div>
'.$body;
}}

}
}
else
{
$body='<div id="middle"><div id="error">'.htmlentities($lang->aacm[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aacn[0], ENT_QUOTES).'</div></div>';
}
}
else
{
$body='<div id="middle"><div id="nothing">'.htmlentities($lang->aaco[0], ENT_QUOTES).'<br/>'.htmlentities($lang->aacn[0], ENT_QUOTES).'</div></div>';
}
}
