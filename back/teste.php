<?php

$date = date('Y/m/d');

echo $date;

$data = date('d/m/Y', strtotime($date));

echo $data;
?>