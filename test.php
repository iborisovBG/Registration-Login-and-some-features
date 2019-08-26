<?php


$previous_week = strtotime("-1 week +1 day");

$start_week = strtotime("last saturday midnight",$previous_week);
$end_week = strtotime("next saturday",$start_week);

$start_week = date("Y-m-d",$start_week);
$end_week = date("Y-m-d",$end_week);

echo $start_week.' '.$end_week ;


?>