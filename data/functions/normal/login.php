<?php
function login($logout_time)
{

$iflogin = false;

if (isset($_POST["name"]) and isset($_POST["password"]))
{
$_POST["name"] = str_replace("'", '"', $_POST["name"]);
$_POST["password"] = str_replace("'", '"', $_POST["password"]);


if (isset($_COOKIE["session"])){
logout();
}

if(!logincheck($_POST["name"],$_POST["password"]))
{return array(1);}
}

if (isset($_COOKIE["session"]))
{
// array(true, $adr["manager_id"], $adr["name"]}}
$session = getmyid($_COOKIE["session"],$logout_time);

if ($session[0])
{
return array(3, $session[1], $session[2]);
}
else
{
return array(2);
}}
return array(0);
}

function logincheck($name, $pas){
if(check_pas($name,$pas))
{

$cookie = uniqid(filter($name), true);
$sql = "UPDATE manager SET lastactivity='".time()."', cookie='".cryptmytext($cookie)."', lastip='".getip()."', login='1' WHERE name='".filter($name)."'";
$adressen_query = db::get()->query($sql) or error_sql($sql);
setcookie("session", $cookie);
$_COOKIE["session"] = $cookie;
return true;
}
else
{
return false;
}
}