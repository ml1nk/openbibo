<?php
function time_to_borrow($start,$day) {


$days_off = get_days_off();
$now = floor(time()/86400);
$start = floor($start/86400);

$current_position=$start;
$day_calculate=0;
while($day_calculate!=$day)
{
if($days_off[date("w",($current_position-1)*86400)]==0)
{
if(!check_days_off($current_position))
{
$day_calculate++;
}}
$current_position++;
}

if($current_position>$now)
{$in_time=true;$days_late=0;}else
{
$in_time=false;
$days_late=1;
$current_day = $current_position;
while($current_day<$now)
{
if($days_off[date("w",($current_day-1)*86400)]==0)
{
if(!check_days_off($current_day))
{
$days_late++;
}}
$current_day++;
}
}
 
return array($in_time,date("d.m.Y",($current_position)*86400),$days_late,$current_position);
}
