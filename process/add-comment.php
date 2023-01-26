<?php
include('connexion.php');

$username = $_POST['pseudo'];
$commentaire = $_POST['comments'];
$idNewMusic = $_GET['id'];

$sqlUserId = "SELECT COUNT(id) FROM user";

$sqlAddComment = "INSERT INTO `comments` (`id`,`comments`, `id_user`, `id_music`) VALUES (NULL, '$commentaire', '$last_id', '$idNewMusic')";
$pdo->exec($sqlAddComment);
