<?php
include('connexion.php');

$sqlMusic = "SELECT * FROM musics";
$musicsList = $pdo->prepare($sqlMusic);
$musicsList->execute();
$musics = $musicsList->fetchAll();
