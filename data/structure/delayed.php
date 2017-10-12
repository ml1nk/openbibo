<?php
if ($isindex)
{


$sql = 'SELECT * FROM ausgeliehen';
$adressen_query = db::get()->query($sql) or die("Anfrage nicht erfolgreich");
$anzahl = mysqli_num_rows($adressen_query);
echo "Es wurden $anzahl ausgeliehen Exemplare untersucht!<br/><br/>";

while ($adr = mysqli_fetch_array($adressen_query)){

if ($adr["timestamp"] != 0){
$neue = abgabe($adr["timestamp"],$adr["ausleihzeit"]);
if($neue < time())
{
$erg = time() - $neue;
$two = $erg / 86400;



$sql = 'SELECT * FROM benutzer WHERE mbrid = "'.$adr["mbrid"].'"';
$adressen_query2 = db::get()->query($sql) or die("Anfrage nicht erfolgreich");
while ($adr2 = mysqli_fetch_array($adressen_query2)){

echo "Der Benutzer '".$adr2["first_name"] .  " " . $adr2["last_name"] . "' ";
echo "ist ".abgabe($neue,$two,true)." Tage �berf�llig!<br/>";

$sql = 'SELECT * FROM medien WHERE bibid = "'.$adr["bibid"].'"';
$adressen_query3 = db::get()->query($sql) or die("Anfrage nicht erfolgreich");
while ($adr3 = mysqli_fetch_array($adressen_query3)){
echo "Es wurde das Medium '". $adr3["title"] . "' ausgeliehen ";
}
$sql = 'SELECT * FROM exemplare WHERE bibid = "'.$adr["bibid"].'" AND copyid = "'.$adr["copyid"].'"';
$adressen_query3 = db::get()->query($sql) or die("Anfrage nicht erfolgreich");
while ($adr3 = mysqli_fetch_array($adressen_query3)){
echo "mit dem Barcode: ". $adr3["barcode_nmbr"] . ".<br/>";
}



}
echo "<br/>";
}
}


}








}
else
{
echo "falscher Aufruf";
}
