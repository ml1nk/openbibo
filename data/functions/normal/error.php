<?php
function error_connect() {
die("Can not connect to mysql server.");
}
function error_database() {
die("Can not connect to database.");
}
function error_language($language) {
die("Can not load the language -:".$language.":-, have you delete the file?");
}
function error_design($design) {
die("Can not load the design -:".$design.":-, have you delete the folder?");
}
function error_sql($sql) {
die("The command:<br/>" .$sql . "<br/>is wrong or the database corrupt.");
}