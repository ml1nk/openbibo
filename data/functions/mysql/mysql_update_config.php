<?php
function update_library_name($text)
{
$sql = 'UPDATE configuration SET library_name="'.filter($text).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}

function update_design($text)
{
$out=check_design_file(html_entity_decode($text, ENT_NOQUOTES).".design");
if($out==null){return false;}
$sql = 'UPDATE configuration SET design="'.filter($text).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return true;
}

function update_language($text)
{
$out=check_language_file(html_entity_decode($text, ENT_NOQUOTES).".lang.xml");
if($out==null){return false;}
$sql = 'UPDATE configuration SET language="'.filter($text).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return true;
}

function update_logout_time($logout_time)
{
if(!(is_numeric($logout_time))){return false;}
$sql = 'UPDATE configuration SET logout_time="'.$logout_time.'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return true;
}

function update_borrow_days($borrow_days)
{
if(!(is_numeric($borrow_days))){return false;}
$sql = 'UPDATE configuration SET borrow_days="'.$borrow_days.'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return true;
}

function update_cent_per_day($cent_per_day)
{
if(!(is_numeric($cent_per_day))){return false;}
$sql = 'UPDATE configuration SET cent_per_day="'.$cent_per_day.'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return true;
}

function update_info_text($text)
{
$sql = 'UPDATE configuration SET info_text="'.filter($text).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return true;
}
