<?php
function logout()
{
$sql = "UPDATE manager SET cookie='', login='0' WHERE cookie='".cryptmytext($_COOKIE["session"])."' and login='1'";
$adressen_query = db::get()->query($sql) or error_sql($sql);
setcookie ("session", "",0);
$_COOKIE["session"] = null;
}

function login_update()
{
$sql = "UPDATE manager SET lastactivity='".time()."' WHERE cookie='".cryptmytext($_COOKIE["session"])."' and login='1'";
$adressen_query = db::get()->query($sql) or error_sql($sql);
}

function updatemedia($media_id,$type_id,$category_id,$series,$title,$author)
{
$sql_part = 'media_list WHERE media_id="'.filter($media_id).'"';
only_one($sql_part,true);

$sql_part = 'media_list WHERE type_id="'.filter($type_id).'" and category_id="'.filter($category_id).'" and series="'.filter($series).'" and title="'.filter($title).'" and author="'.filter($author).'"';
$not_douple=only_nothing($sql_part);
if(!$not_douple)
{
return 0;
}
$sql = 'UPDATE media_list SET type_id="'.filter($type_id).'", category_id="'.filter($category_id).'", series="'.filter($series).'", title="'.filter($title).'", author="'.filter($author).'" WHERE media_id="'.filter($media_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return 1;
}

function updateuser($user_id,$name,$email,$barcode)
{
$sql_part = 'user WHERE user_id="'.filter($user_id).'"';
only_one($sql_part,true);

$sql_part = 'user WHERE name="'.filter($name).'" AND email="'.filter($email).'" AND barcode="'.filter($barcode).'"';
$not_douple=only_nothing($sql_part);
if(!$not_douple)
{
return 0;
}
$sql = 'UPDATE user SET name="'.filter($name).'", email="'.filter($email).'", barcode="'.filter($barcode).'" WHERE user_id="'.filter($user_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return 1;
}


function updateborrow($media_id,$copy_id,$days,$user_id=null)
{

$out=getinfofromborrow($media_id,$copy_id,$user_id);

if(isset($out["nothing"])){return null;}

$out["time"]=time_to_borrow($out["timestamp"],$out["days"]);
$out["renewal_count"]++;
$timestamp = time();
$out_time = ceil(time()/ 86400);
$out_time = $out_time*86400;

if($user_id==null)
{
$sql = 'UPDATE borrow SET timestamp="'.filter($out_time).'", days="'.filter($days).'", renewal_count="'.filter($out["renewal_count"]).'" WHERE media_id="'.filter($media_id).'" AND copy_id="'.filter($copy_id).'"';
}
else
{
$sql = 'UPDATE borrow SET timestamp="'.filter($out_time).'", days="'.filter($days).'", renewal_count="'.filter($out["renewal_count"]).'" WHERE media_id="'.filter($media_id).'" AND copy_id="'.filter($copy_id).'" AND user_id="'.filter($user_id).'"';
}

$adressen_query = db::get()->query($sql) or error_sql($sql);
return array($out["renewal_count"],$out["user_id"],$out["name"],$out["time"]);
}

function updateallborrow($user_id,$days)
{
$sql = 'SELECT copy_id, media_id FROM borrow WHERE user_id="'.filter($user_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){return null;}
while ($adr = mysqli_fetch_array($adressen_query)){
updateborrow($adr["media_id"],$adr["copy_id"],$days,$user_id);
}
return 1;
}


function updatepas($pas,$manager_id)
{
$salt = generateSalt();
$pas = cryptmytext($salt . $pas);


$sql = 'UPDATE manager SET salt="'.filter($salt).'", password="'.filter($pas).'" WHERE manager_id="'.filter($manager_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}

function changecategory($name, $category_id)
{
$sql = 'UPDATE media_category SET name="'.filter($name).'" WHERE category_id="'.filter($category_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}

function changetype($name,$type_id)
{
$sql = 'UPDATE media_type SET name="'.filter($name).'" WHERE type_id="'.filter($type_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}

