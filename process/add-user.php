<?php
include('connexion.php');

$pseudo = $_POST['pseudo'];
$commentaire = $_POST['commentary'];
$idNewMusic = $_GET['id'];




try {
    $sqlNewUser = "INSERT IGNORE INTO user (`id`, `pseudo`) VALUES (NULL, '$pseudo')";
    $pdo->exec($sqlNewUser);



    $sqlUserId = $pdo->prepare("SELECT id FROM user WHERE pseudo = '$pseudo'");
    $giveID = $sqlUserId->execute();
    $plsID = $sqlUserId->fetchColumn();



    $sqlAddComment = "INSERT INTO `comments` (`id`,`commentaire`, `id_user`, `id_music`) VALUES (NULL, '$commentaire', $plsID, '$idNewMusic')";
    $pdo->exec($sqlAddComment);

    header("Location: http://localhost:90/lecteur-audio/front/player.php?id=$idNewMusic");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
