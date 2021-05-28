<?php
require __DIR__.'/../class/classiles.php';

$newIles = new iles();

$iles = $_POST['ile'];

$res = $newIles->getIles($iles);


echo $res;