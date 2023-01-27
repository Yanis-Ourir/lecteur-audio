<?php
include('connexion.php');



$id = $_GET['id'];
$sqlComments = "SELECT user.pseudo, comments.commentaire FROM comments JOIN user ON comments.id_user = user.id WHERE comments.id_music = $id; ";
$commentsList = $pdo->prepare($sqlComments);
$commentsList->execute();
$comments = $commentsList->fetchAll();



foreach ($comments as $comment) {
    echo "<div class='mt-3 p-3 lh-sm'>" . "<p class='pseudo-user'>" . $comment['pseudo']  . " :</p> <p class='commentaire'>" . $comment['commentaire'] . "</p></div>";
}
