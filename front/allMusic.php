<?php
include('../process/connexion.php');
include('../process/music-list.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toutes mes musiques</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body class="allmusic-body">

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Toutes mes musiques</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Paramètres</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="newMusic.php">Ajouter une musique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Créer une playlist</a>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Chercher une musique" aria-label="Search">
                        <button class="btn btn-success" type="submit">Chercher</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>


    <section class="all-music">
        <?php

        $count = 0;
        foreach ($musics as $music) {
            $count += 1;
        ?>
            <div class="music-list" id="choose-music-<?= $count ?>">
                <img src="<?= $music['musicImage'] ?>" alt="<?= $music['musicName'] ?>" class="music-image">
                <p class="music-name"><?php echo $music['musicName'] . " - " . $music['Artist'] ?></p>
                <a class="delete-link" href="../process/delete-music.php?id=<?= $music['id'] ?>">Supprimer</a>
            </div>

            <script>
                document.querySelectorAll('#choose-music-<?= $count ?>').forEach(musicDetails => {
                    musicDetails.addEventListener('click', () => {
                        window.location.href = "player.php?id=<?= $music['id'] ?>";
                    })
                });
            </script>
        <?php }
        ?>
    </section>


    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
</body>

</html>