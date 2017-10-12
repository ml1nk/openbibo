<?php
if(isset($isindex)){
echo "<a href='index.php'>zur�ck</a><br/><br/>";
if($_GET['wo'] == "usersuche")
{
require_once("user/suche.php");
}
else if($_GET['wo'] == "userneu")
{
require_once("user/neu.php");
}
else if($_GET['wo'] == "useranzeige")
{
require_once("user/anzeige.php");
}
else if($_GET['wo'] == "medsuche")
{
require_once("medium/suche.php");
}
else if($_GET['wo'] == "medneu")
{
require_once("medium/neu.php");
}
else if($_GET['wo'] == "medanzeige")
{
require_once("medium/anzeige.php");
}

else if($_GET['wo'] == "exeausleihe")
{
require_once("exemplar/ausleihen.php");
}
else if($_GET['wo'] == "exeeingehend")
{
require_once("exemplar/eingehend.php");
}

else if($_GET['wo'] == "cleardata")
{
require_once("tool/cleardata.php");
}
else if($_GET['wo'] == "verspaetet")
{
require_once("tool/verspaetet.php");
}
else if($_GET['wo'] == "ausgeliehen")
{
require_once("tool/ausgeliehen.php");
}
else
{
echo "kein passendes Modul gefunden";
}
}