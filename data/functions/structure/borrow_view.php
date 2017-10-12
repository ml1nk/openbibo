<?php
function chosecopy($value,$value2,$lang)
{
return '
<table id="borrow">
  <tr>
    <td class="title" colspan="2">'.htmlentities($lang->aael[0], ENT_QUOTES, "UTF-8").'</td>
  </tr>
    <tr>
    <td class="left">'.htmlentities($lang->aaca[0], ENT_QUOTES, "UTF-8").'</td>
<form action="#" method="post">
 <td><input name="media_copy" type="text" class="barcode" value="'.$value.'" size="6" maxlength="6"></td>
<input name="user" type="hidden" value="'.$value2.'" >
  </tr>
  <tr>
<td colspan="2"><input type="submit" class="submit" value="'.htmlentities($lang->aaem[0], ENT_QUOTES, "UTF-8").' "></td>
 </tr>
</form>
</table>
';
}

function choseuser($value,$lang)
{
return '
<table id="borrow">
  <tr>
    <td class="title" colspan="2">'.htmlentities($lang->aaek[0], ENT_QUOTES, "UTF-8").'</td>
  </tr>
    <tr>
    <td class="left">'.htmlentities($lang->aaca[0], ENT_QUOTES, "UTF-8").'</td>
<form action="#" method="post">
 <td><input name="user" type="text" class="barcode" value="'.$value.'" size="6" maxlength="6"></td>
  </tr>
  <tr>
<td colspan="2"><input type="submit" class="submit" value="'.htmlentities($lang->aaem[0], ENT_QUOTES, "UTF-8").' "></td>
 </tr>
</form>
</table>
';
}