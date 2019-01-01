<?php

declare(strict_types=1);

$created = date('Y-m-d-H-i-s');
$id = 1;
$extension = 'jpg';


$pic_name = $id.'.'.$created. '.'.$extension;

echo $pic_name;
