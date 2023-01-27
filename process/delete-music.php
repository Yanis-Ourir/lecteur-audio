<?php
include('./connexion.php');

$idMusic = $_GET['id'];

try {

    $sqlDelete = $pdo->prepare('DELETE FROM musics WHERE id = ?');
    $musicDelete = $sqlDelete->execute([$idMusic]);

    header('Location: http://localhost:90/lecteur-audio/front/allMusic.php?');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
