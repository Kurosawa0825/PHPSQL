<?php
require_once('menu.php');

$pasta = new Menu('PASTA', 1200, 'image\pasta.jpg');
$pancake = new Menu('PANCAKE', 1500, 'image\pancake.jpg');
$hotsand = new Menu('HOTSAND', 800, 'image\hotsand.jpg');
$curry = new Menu('CURRY', 1000, 'image\curry.jpg');

$menus = array($pasta, $pancake, $hotsand, $curry);

?>