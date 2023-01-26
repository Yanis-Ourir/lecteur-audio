<?php
include('./connexion.php');

$idMusic = $_GET['id'];

try {

    $sqlDelete = $pdo->prepare('DELETE FROM musics WHERE id = ?');
    $musicDelete = $sqlDelete->execute([$idMusic]);

    echo "Supprimer avec succès";
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
