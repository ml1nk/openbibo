<?php
$isindex=true; // structures only load when $isindex is set
if(!isset($_GET['where'])){$_GET['where']=null;}
require_once("db.php");
require_once("include.php"); // include all necessary files
db::connect($mysqlhost, $mysqluser, $mysqlpwd, $mysqldb); // connect to database
$database_version = database_version();
if($database_version != $require_database_version)
{
echo "The database version is ".$database_version." but the require version is ".$require_database_version . ", please update the database.";
exit();
}


$configuration = load_config(); // load the configuration from the database
$lang = load_lang($configuration[0]); //load the language file
$session = login($configuration[2]); // check for login
if(($session[0] == 3)and($_GET['where']=="logout")){logout();$session[0] = 0;} // logout when ?wo=logout

if ($session[0] == 3) //registered
{
login_update(); // update lastactivity

$where = getrightdestination($_GET['where'],$lang);
$head = "<title>".$where[1]."</title>".load_design($configuration[1],$where[0],$where[2]);
if($where[2]){require_once("structure/menu.php"); }
require_once("structure/".$where[0].".php"); 
if($where[2]){
html_out($head,"<div id='main'>".$menu."<div id='body'>".$body."</div></div>");
}
else
{
html_out($head,"<div id='main'><div id='body'>".$body."</div></div>");
}


}
else // show login
{
require_once("structure/login.php"); // load the login menu
}
db::get()->close(); // close the database connection