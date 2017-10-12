<?php
if ($isindex)
{
if (isset($_GET["user_id"]))
{
if(is_numeric ($_GET["user_id"]))
{
$sql = 'SELECT * FROM user WHERE user_id = "'.filter($_GET["user_id"]).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}

if(mysqli_num_rows($adressen_query)==0)
{
$body='
<div id="middle"><div id="error">'.htmlentities($lang->aado[0], ENT_QUOTES, "UTF-8")." ".$_GET["user_id"]." ".htmlentities($lang->aabn[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aadn[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
$adr = mysqli_fetch_array($adressen_query);

if(isset($_POST["name"]) and isset($_POST["email"]) and isset($_POST["barcode"]))
{
$_POST["name"] = str_replace("'", '"', $_POST["name"]);
$_POST["email"] = str_replace("'", '"', $_POST["email"]);
$_POST["barcode"] = str_replace("'", '"', $_POST["barcode"]);

if( mb_strlen($_POST["name"], 'UTF-8') > 3)
{
if((is_numeric($_POST["barcode"])) and (strlen($_POST["barcode"])==6))
{

if($_POST["name"]==$adr["name"] and $_POST["email"]==$adr["email"] and $_POST["barcode"]==$adr["barcode"])
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aabp[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aabq[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
$not_douple = updateuser($_GET["user_id"],$_POST["name"],$_POST["email"],$_POST["barcode"]);
if(!$not_douple)
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aabp[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aabs[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
$sql = 'SELECT * FROM user WHERE user_id = "'.filter($_GET["user_id"]).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$adr = mysqli_fetch_array($adressen_query);
$body=null;
}
}
}
else
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aaax[0], ENT_QUOTES, "UTF-8")."<br/>".htmlentities($lang->aaay[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
}
else
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aadu[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aabu[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
}
else
{$body=null;}

if(isset($_POST["new_borrow"]))
{
$barcode=htmlentities(filter($_POST["new_borrow"]));

if((is_numeric($_POST["new_borrow"])) and (strlen($_POST["new_borrow"])==6))
{

$found = getmediawithbarcode($_POST["new_borrow"]);

if($found!=null)
{
$is_new = newborrow($_GET["user_id"],$found["media_id"],$found["copy_id"],$configuration[4]);
if(!$is_new)
{
$barcode=$_POST["new_borrow"];
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaeg[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aabw[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
$barcode=null;
}
}
else
{
$barcode=$_POST["new_borrow"];
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaaz[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aaba[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaax[0], ENT_QUOTES, "UTF-8")."<br/>".htmlentities($lang->aaay[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}}else{$barcode=null;}


if((isset($_GET["get_back_copy"]) and is_numeric($_GET["get_back_copy"]))AND(isset($_GET["get_back_media"]) and is_numeric($_GET["get_back_media"])))
{
$really=delete_borrow($_GET["get_back_copy"],$_GET["get_back_media"],$_GET["user_id"]);

if($really)
{
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aadx[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aady[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaea[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aaeb[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
}


if(isset($_GET["get_back_all"]))
{
$really=delete_all_borrow($_GET["user_id"]);

if($really>0)
{
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aafj[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aafk[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aafl[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aafm[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
}

if(isset($_GET["extend_all"]))
{
$really=updateallborrow($_GET["user_id"],$configuration[4]);

if($really)
{
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aafn[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aafo[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aafp[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aafq[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
}

if((isset($_GET["extend_copy"]) and is_numeric($_GET["extend_copy"]))AND(isset($_GET["extend_media"]) and is_numeric($_GET["extend_media"])))
{
$really = updateborrow($_GET["extend_media"],$_GET["extend_copy"],$configuration[4],$_GET["user_id"]);

if($really)
{
$body=$body.'
<div id="margin"><div id="nothing">'.htmlentities($lang->aafe[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aaff[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aaez[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aafg[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
}

$body=$body.'
<form action="index.php?where=user_display&user_id='.$_GET["user_id"].'" method="post">

<table id="media_all">
  <tr>
    <td class="left">'.htmlentities($lang->aacz[0], ENT_QUOTES, "UTF-8").'</td>
    <td><input class="right1" value="'.htmlentities($adr["name"], ENT_QUOTES,"ISO-8859-1").'" name="name" type="text" size="100" maxlength="100"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aada[0], ENT_QUOTES, "UTF-8").'</td>
    <td><input class="right1" value="'.htmlentities($adr["email"], ENT_QUOTES,"ISO-8859-1").'" name="email" type="text" size="100" maxlength="100"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aaas[0], ENT_QUOTES, "UTF-8").'</td>
    <td><input class="barcode" value="'.htmlentities($adr["barcode"], ENT_QUOTES,"ISO-8859-1").'" name="barcode" type="text" size="6" maxlength="6"></td>
  </tr>
    <tr>
    <td>
<div class="over_all_out"><a class="over_all" id="change" href="index.php?where=user_display&user_id='.$_GET["user_id"].'&delete=yes">'.htmlentities($lang->aabk[0], ENT_QUOTES, "UTF-8").'</a></div>
</td>
    <td><input class="submit1" type="submit" value="'.htmlentities($lang->aabr[0], ENT_QUOTES, "UTF-8").'"></td>
  </tr>
</table>
</form>
';

$getborrow= getallborrowwithuserid($_GET["user_id"]);

if (count($getborrow)!=0)
{

$body=$body.'
<table id="barcodes">';

$body=$body.'
<tr><td id="media_copy" colspan="6">'.htmlentities($lang->aadv[0], ENT_QUOTES, "UTF-8").'</td></tr>';

$body=$body.'
<tr>';
$body=$body.'
<td id=title_left>'.htmlentities($lang->aaca[0], ENT_QUOTES, "UTF-8").'</td>';
$body=$body.'
<td id=title_middle_left>'.htmlentities($lang->aadw[0], ENT_QUOTES, "UTF-8").'</td>';
$body=$body.'
<td id=title_middle>'.htmlentities($lang->aacc[0], ENT_QUOTES, "UTF-8").'</td>';
$body=$body.'
<td id=title_middle_right>'.htmlentities($lang->aacd[0], ENT_QUOTES, "UTF-8").'</td>';
$body=$body.'
<td class="copy_right">
<a href="index.php?where=user_display&user_id='.$_GET["user_id"].'&get_back_all=yes">'.htmlentities($lang->aafh[0], ENT_QUOTES, "UTF-8").'</a>
</td>
<td class="copy_right">
<a href="index.php?where=user_display&user_id='.$_GET["user_id"].'&extend_all=yes">'.htmlentities($lang->aafi[0], ENT_QUOTES, "UTF-8").'</a>
</td>
';
$body=$body.'
</tr>';

for($i=0;count($getborrow)>$i;$i++)
{
$body=$body.'
<tr>';

$body=$body.'
<td class="copy_left">'.$getborrow[$i]["media_info"]["barcode"].'</td>';

if (isset($copy[$i]["user"]["nothing"]))
{
$body=$body.'
<td class="empty"></td>
<td class="empty"></td>
<td class="empty"></td>
<td class="empty"></td>
';
}
else
{
$timer=time_to_borrow($getborrow[$i]["timestamp"],$getborrow[$i]["days"]);

if($timer[0])
{
$out_time='<div class="green">'.$timer[1].'</div>';
}
else
{
$out_time='<div class="red">'.$timer[1].'</div>';
}


$body=$body.'
<td class="copy_middle_left"><a href="index.php?where=media_display&media_id='.$getborrow[$i]["media_id"].'">'.htmlentities($getborrow[$i]["media_info"]["title"], ENT_QUOTES,"ISO-8859-1").'</a></td>';
$body=$body.'
<td class="copy_middle">'.$getborrow[$i]["renewal_count"].'</td>';
$body=$body.'
<td class="copy_middle_right">'.$out_time.'</td>';
}

$body=$body.'
<td class="copy_right">
<a href="index.php?where=user_display&user_id='.$_GET["user_id"].'&get_back_media='.$getborrow[$i]["media_id"].'&get_back_copy='.$getborrow[$i]["copy_id"].'">'.htmlentities($lang->aadz[0], ENT_QUOTES, "UTF-8").'</a>
</td>
<td class="copy_right">
<a href="index.php?where=user_display&user_id='.$_GET["user_id"].'&extend_media='.$getborrow[$i]["media_id"].'&extend_copy='.$getborrow[$i]["copy_id"].'">'.htmlentities($lang->aaej[0], ENT_QUOTES, "UTF-8").'</a>
</td>
';

$body=$body.'
</tr>';
}
$body=$body.'
</table>';
}
else
{
$body=$body.'
<div id="nothing">'.htmlentities($lang->aadr[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aads[0], ENT_QUOTES, "UTF-8").'</div>
';
}

$body=$body.'
<form action="index.php?where=user_display&user_id='.$_GET["user_id"].'" method="post">
<table id="new_copy">
  <tr>
    <td  id="new_copy_title" colspan="2">'.htmlentities($lang->aaee[0], ENT_QUOTES, "UTF-8").'</td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aaca[0], ENT_QUOTES, "UTF-8").'</td>
    <td><input id="new_copy_input" value="'.$barcode.'" name="new_borrow" type="text" size="6" maxlength="6"></td>
  </tr>
  <tr>
    <td colspan="2"><input  id="new_copy_submit" type="submit" value="'.htmlentities($lang->aaef[0], ENT_QUOTES, "UTF-8").'"></td>
  </tr>
</table>
</form>
';



if(isset($_GET["delete"]) and $_GET["delete"]=="yes")
{
if((isset($_POST["really"])) and ($_POST["really"]=="yes"))
{
delete_user($_GET["user_id"]);
$body='
<div id="margin"><div id="nothing">'.htmlentities($lang->aadt[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aaby[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
$body='
<div id="margin"><div id="error_special">'.htmlentities($lang->aadq[0], ENT_QUOTES, "UTF-8").'<br/>'.'
<form action="index.php?where=user_display&user_id='.$_GET["user_id"].'&delete=yes" method="post">
<input name="really" type="hidden" value="yes" >
<input id="float_left" class="submit2" type="submit" value="'.htmlentities($lang->aack[0], ENT_QUOTES, "UTF-8").'">
</form>
<div id="float_right" class="over_all_out"><a  class="over_all" href="index.php?where=user_display&user_id='.$_GET["user_id"].'">'.htmlentities($lang->aacl[0], ENT_QUOTES, "UTF-8").'</a></div>
</div></div>
'.$body;
}}

}
}
else
{
$body='<div id="middle"><div id="error">'.htmlentities($lang->aadm[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aadn[0], ENT_QUOTES, "UTF-8").'</div></div>';
}
}
else
{
$body='<div id="middle"><div id="nothing">'.htmlentities($lang->aadk[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aadl[0], ENT_QUOTES, "UTF-8").'</div></div>';
}
}

