<?php
function newbarcode($media_id,$barcode)
{
$sql_part = 'media_list WHERE media_id="'.filter($media_id).'"';
only_one($sql_part,true);

$i=0;
do {
$i++;
$sql = 'SELECT COUNT(*) FROM media_copy WHERE media_id="'.filter($media_id).'" AND copy_id="'.filter($i).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count_array = mysqli_fetch_array($adressen_query);
$count=$count_array[0];
} while ($count != 0);

$sql = 'SELECT COUNT(*) FROM media_copy WHERE barcode = "'.filter($barcode).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count_array = mysqli_fetch_array($adressen_query);
if ($count_array[0] > 1){error_sql($sql);}
if ($count_array[0]==1)
{
return false;
}
else
{
$sql='INSERT INTO media_copy (media_id, copy_id, barcode) VALUES ("'.filter($media_id).'", "'.filter($i).'", "'.filter($barcode).'")';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return true;
}
}

function newmedia($type_id,$category_id,$series,$title,$author)
{
$sql_part = 'media_list WHERE type_id="'.filter($type_id).'" and category_id="'.filter($category_id).'" and series="'.filter($series).'" and title="'.filter($title).'" and author="'.filter($author).'"';
$not_douple=only_nothing($sql_part);
if(!$not_douple)
{
return null;
}
$sql = 'INSERT INTO media_list (type_id,category_id,series,title,author) VALUES ("'.filter($type_id).'", "'.filter($category_id).'", "'.filter($series).'", "'.filter($title).'", "'.filter($author).'")';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$id = mysqli_fetch_row(db::get()->query( "SELECT LAST_INSERT_ID()"));
return $id[0];
}

function newuser($name,$email,$barcode)
{
$sql_part = 'user WHERE barcode="'.filter($barcode).'"';
$not_douple=only_nothing($sql_part);
if(!$not_douple)
{
return null;
}
$sql = 'INSERT INTO user (name,email,barcode) VALUES ("'.filter($name).'", "'.filter($email).'", "'.filter($barcode).'")';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$id = mysqli_fetch_row(db::get()->query( "SELECT LAST_INSERT_ID()"));
return $id[0];
}

function newborrow($user_id,$media_id,$copy_id,$days)
{
$sql_part = 'borrow WHERE media_id="'.filter($media_id).'" AND copy_id="'.filter($copy_id).'"';
only_one($sql_part,true);

$not_douple=only_nothing($sql_part);

if(!$not_douple)
{
return false;
}

 $timestamp = time();
 $out_time = ceil(time()/ 86400);
 $out_time = $out_time*86400;
 

$sql = 'INSERT INTO borrow (media_id, copy_id, user_id, renewal_count, timestamp, days) VALUES ("'.filter($media_id).'", "'.filter($copy_id).'", "'.filter($user_id).'", "0", "'. filter($out_time).'", "'. filter($days).'")';
$adressen_query6 = db::get()->query($sql) or error_sql($sql);
 return true; 
 }

function newmanager($pas,$name)
{
$salt = generateSalt();
$pas = cryptmytext($salt . $pas);

$sql = 'INSERT INTO manager (salt, password, name) VALUES ("'.filter($salt).'", "'.filter($pas).'", "'.filter($name).'")';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}

function newcategory($name)
{
$sql = 'INSERT INTO media_category (name) VALUES ("'.filter($name).'")';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}

function newtype($name)
{
$sql = 'INSERT INTO media_type (name) VALUES ("'.filter($name).'")';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}

