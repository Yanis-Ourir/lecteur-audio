<?php

include('connexion.php');

$musicName = $_POST['musicname'];
$musicLink = $_POST['myMusic'];
$artist = $_POST['artist'];
$musicImage = $_POST['myImage'];

try {
    $newMusic = "INSERT INTO `musics` (`id`, `musicName`, `musicLink`, `Artist`, `musicImage`) VALUES (NULL, '$musicName', '$musicLink', '$artist', '$musicImage')";
    $pdo->exec($newMusic);
    header('Location: https://yanis-lecteur-audio.projets.garage404.com');
} catch (Exception $e) {
    die('Erreur ' . $e->getMessage());
}
