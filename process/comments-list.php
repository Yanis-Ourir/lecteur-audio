<?php
include('connexion.php');

$id = $_GET['id'];
$sqlComments = "SELECT * FROM comments WHERE id = $id";
$commentsList = $pdo->prepare($sqlComments);
$commentsList->execute();
$comments = $commentsList->fetchAll();

foreach ($comments as $comment) {
    echo "<div>" . "<p>" . $comment['pseudo'] . "</p> <br> <p>" . $comment['comments'] . "</p></div>";
}
