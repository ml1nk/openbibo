<?php
function check_pas($name,$pas)
{
$name = filter($name);
$sql = 'SELECT * FROM manager WHERE name = "'.$name.'"';
$adressen_query = db::get()->query($sql) or die("Anfrage nicht erfolgreich");
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}
if (mysqli_num_rows($adressen_query) == 0){return false;}
$adr = mysqli_fetch_array($adressen_query);
$password = $adr["password"];
$salt = $adr["salt"];
if(cryptmytext($salt . $pas) == $password){
return true;
}
return false;
}