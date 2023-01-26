<?php
include('connexion.php');

$pseudo = $_POST['pseudo'];
$commentaire = $_POST['commentary'];
$idNewMusic = $_GET['id'];




try {
    $sqlNewUser = "INSERT INTO user (`id`, `pseudo`) VALUES (NULL, '$pseudo')";
    $pdo->exec($sqlNewUser);



    $sqlUserId = "SELECT user.id FROM user WHERE pseudo = $pseudo";


    $sqlAddComment = "INSERT INTO `comments` (`id`,`commentaire`, `id_user`, `id_music`) VALUES (NULL, '$commentaire', '$sqlUserId', '$idNewMusic')";
    $pdo->exec($sqlAddComment);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
