<?php
include('../process/connexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Ajouter une nouvelle musique</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white">Nouvelle musique</span>
        </div>
    </nav>

    <form action="../process/uploadMusic.php" method="POST" class="m-5 p-5">

        <div>
            <label class="form-label">Ajouter votre musique</label>
            <input type="text" name="myMusic" class="form-control">
        </div>

        <div class="mt-5">
            <label class="form-label">Ajouter un nom à votre musique</label>
            <input type="text" name="musicname" class="form-control">
        </div>

        <div class="mt-5">
            <label class="form-label">Ajouter lui une image</label>
            <input type="text" name="myImage" class="form-control">
        </div>

        <div class="mt-5">
            <label class="form-label">Ajouter un artiste</label>
            <input type="text" name="artist" class="form-control">
        </div>

        <button type="submit" class="btn btn-dark mt-5">Ajouter</button>

    </form>
</body>

</html>