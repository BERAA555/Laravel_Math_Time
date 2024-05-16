<?php
$quert = "SELECT * FROM users WHERE `name` = 'asd' AND `password` = 'asd' ";

// one injection
$one =   "SELECT * FROM users WHERE `name` = 'asd' AND `password` = 'asd' " ;
$oneinjection = " 'or '1' = '1 ";


// two injection


$two = "SELECT * FROM users WHERE `name` = 'asd' AND `password` = 'asd' ";


$twoInjection = " ' or `id` =  '1 ";



?>