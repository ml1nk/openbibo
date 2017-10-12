<?php
if ($isindex)
{
if(isset($_POST["name"]) and isset($_POST["email"]) and isset($_POST["barcode"]))
{
$name = str_replace("'", '"', $_POST["name"]);
$email = str_replace("'", '"', $_POST["email"]);
$barcode = str_replace("'", '"', $_POST["barcode"]);



if(!(mb_strlen($name, 'UTF-8')>3))
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aadb[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aabu[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
if((is_numeric($barcode)) and (strlen($barcode)==6))
{
$user_id = newuser($name,$email,$barcode);
if($user_id==null)
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aadd[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aade[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
else
{
$body='
<div id="margin"><div id="nothing">'.htmlentities($lang->aadg[0], ENT_QUOTES, "UTF-8").'<br/>'.htmlentities($lang->aacs[0], ENT_QUOTES, "UTF-8").' <a href="index.php?where=user_display&user_id='.$user_id.'">'.htmlentities($lang->aact[0], ENT_QUOTES, "UTF-8").'</a> '.htmlentities($lang->aadf[0], ENT_QUOTES, "UTF-8").'</div></div>
';

$name=null;
$email=null;
$barcode=null;
}
}
else
{
$body='
<div id="margin"><div id="error">'.htmlentities($lang->aaax[0], ENT_QUOTES, "UTF-8")."<br/>".htmlentities($lang->aaay[0], ENT_QUOTES, "UTF-8").'</div></div>
';
}
}
}
else
{
$name=null;
$email=null;
$barcode=null;
$body=null;
}

$body=$body.'
<form action="index.php?where=user_new" method="post">

<table id="user_all">
  <tr>
    <td class="left">'.htmlentities($lang->aacz[0], ENT_QUOTES, "UTF-8").'</td>
    <td><input class="right1" value='."'".$name."'".' name="name" type="text" size="50" maxlength="50"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aada[0], ENT_QUOTES, "UTF-8").'</td>
    <td><input class="right1" value='."'".$email."'".' name="email" type="text" size="50" maxlength="50"></td>
  </tr>
  <tr>
    <td class="left">'.htmlentities($lang->aaca[0], ENT_QUOTES, "UTF-8").'</td>
    <td><input class="barcode" value='."'".$barcode."'".' name="barcode" type="text" size="6" maxlength="6"></td>
  </tr>
    <tr>
    <td>
</td>
    <td><input class="submit1" type="submit" value="'.htmlentities($lang->aacq[0], ENT_QUOTES, "UTF-8").'"></td>
  </tr>
</table>
</form>
';


}

