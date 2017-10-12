<?php
if ($isindex)
{
$body="";
if(is_writable_all())
{

if(isset($_FILES['update_file']['tmp_name']))
{

$saved=false;
$file_name = explode(".", $_FILES['update_file']['name']);

if(count($file_name)==2)
   {

if($file_name[1]=="zip")
   {
$file_name = explode("-", $file_name[0]);
if(count($file_name)==3)
   {
if($file_name[0]=="openbibo" and str_replace(".", "", $software_version)==$file_name[1] and str_replace(".", "", $software_version)<$file_name[2])
   {

    $saved=true;
      move_uploaded_file($_FILES['update_file']['tmp_name'], "update/".$_FILES['update_file']['name']);
}
      
 }
  }
  }



}







$body=$body.'
<div id="update" >
<div>'.htmlentities($lang->aakj[0], ENT_QUOTES).'</div>
<form action="index.php?where=update_manager" method="post" enctype="multipart/form-data">
    <input class="upload" name="update_file" type="file" maxlength="100000" >
    <input id="submit" type="submit" name="Submit" value="Senden">
</form>
</div>
';
}
else
{
$body=$body.'
<div id="margin"><div id="error">'.htmlentities($lang->aakh[0], ENT_QUOTES)."<br/>".htmlentities($lang->aaki[0], ENT_QUOTES).'</div></div>
';
}}
