<?php
include('../process/connexion.php');
$id = $_GET['id'];

$statement = $pdo->prepare('SELECT * FROM musics WHERE id = :id');
$statement->execute(['id' => $id]);
$music = $statement->fetch();

$sqlCount = "SELECT COUNT(*) FROM musics";
$musicNumber = $pdo->query($sqlCount);
$musicCount = $musicNumber->fetchColumn();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body class="allmusic-body">
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand retour" href="allMusic.php">Retour vers vos musiques</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark lh-base" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Les commentaires : </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <?php include("../process/comments-list.php"); ?>

                <form action="../process/add-user.php?id=<?= $music['id'] ?>" method="POST" class="d-flex flex-column justify-content-end p-3" style="height: 100vh;">
                    <div class="mb-3">
                        <label class="form-label">Pseudo :</label>
                        <input type="text" class="form-control" id="username" name="pseudo" style="width: 50%;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Commentaire :</label>
                        <input type="text" class="form-control" id="comments" name="commentary" style="height: 200px;">
                    </div>
                    <button type="submit" class="btn btn-info">Envoyer</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="player">
        <h1 class="title-player"><?php echo $music['musicName'] . " - " . $music['Artist'] ?></h1>
        <div>
            <img src="<?= $music['musicImage'] ?>" alt="" class="image-player">
        </div>

        <div class="play-button">
            <i class="fa-solid fa-backward-fast fa-2xl" id="fast-backward"></i>

            <i class=" fa-solid fa-shuffle fa-2xl" id="random-music"></i>

            <i class="fa-solid fa-arrow-rotate-right fa-2xl" id="loop-music"></i>

            <i class="fa-solid fa-forward-fast fa-2xl" id="fast-forward"></i>
        </div>

        <div>
            <audio controls class="audio" id="audio" autoplay>
                <source src="<?= $music['musicLink'] ?>">
            </audio>
        </div>

    </div>

    <script>
        let nextMusic = document.getElementById('fast-forward');
        let previousMusic = document.getElementById('fast-backward');

        let randomMusic = document.getElementById('random-music');
        let loopMusic = document.getElementById('loop-music');

        let audioItem = document.getElementById('audio');
        audioItem.volume = 0.50;



        loopMusic.addEventListener('click', () => {


            loopMusic.style.color = '#17caff';
            loopMusic.classList.toggle("test");
            console.log(loopMusic.classList.contains("test"));

            if (loopMusic.classList.contains("test") === true) {

                audioItem.addEventListener('ended', () => {
                    currentTime = 0;
                    audioItem.play();
                })
            } else if (loopMusic.classList.contains("test") === false) {
                loopMusic.style.color = 'white';
                audioItem.addEventListener('ended', function(e) {

                    if (<?= $id ?> >= <?= $musicCount ?>) {
                        window.location.href = "player.php?id=<?= $id - $musicCount + 1 ?>";
                    } else {
                        window.location.href = "player.php?id=<?= $id + 1 ?>";
                    }

                })
            }
        })

        audioItem.addEventListener('ended', function(e) {
            if (loopMusic.classList.contains("test") === false) {


                if (<?= $id ?> >= <?= $musicCount ?>) {
                    window.location.href = "player.php?id=<?= $id - $musicCount + 1 ?>";
                } else {
                    window.location.href = "player.php?id=<?= $id + 1 ?>";
                }


            }
        })




        randomMusic.addEventListener('click', () => {
            randomMusic.style.color = '#17caff';
            randomMusic.classList.toggle("randomize");

            audioItem.addEventListener('ended', () => {
                window.location.href = "player.php?id=<?= rand(1, $musicCount) ?>";
            })

            if (!randomMusic.classList.contains("randomize")) {

                randomMusic.style.color = 'white';
                audioItem.addEventListener('ended', function(e) {

                    if (<?= $id ?> >= <?= $musicCount ?>) {
                        window.location.href = "player.php?id=<?= $id - $musicCount + 1 ?>";
                    } else {
                        window.location.href = "player.php?id=<?= $id + 1 ?>";
                    }

                })

            }
        })









        nextMusic.addEventListener('click', function(e) {
            if (<?= $id ?> >= <?= $musicCount ?>) {
                window.location.href = "player.php?id=<?= $id - $musicCount + 1 ?>"
            } else {
                window.location.href = "player.php?id=<?= $id + 1 ?>";
            }



        })

        previousMusic.addEventListener('click', function(e) {

            if (<?= $id ?> == 1) {
                window.location.href = "player.php?id=<?= $musicCount ?>"

            } else {

                window.location.href = "player.php?id=<?= $id - 1 ?>";
            }
        })
    </script>

</body>

</html>