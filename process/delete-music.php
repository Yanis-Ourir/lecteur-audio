<?php
include('./connexion.php');

$idMusic = $_GET['id'];

try {

    $sqlDelete = $pdo->prepare('DELETE FROM musics WHERE id = ?');
    $musicDelete = $sqlDelete->execute([$idMusic]);

    header('Location: https://yanis-lecteur-audio.projets.garage404.com');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
