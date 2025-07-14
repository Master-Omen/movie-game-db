<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="icon" href="<?= base_url('img/icon.png') ?>" type="image/x-icon">

    <title><?= $title; ?></title>

    <?php $url = $_SERVER['REQUEST_URI']; ?>


</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <img src="<?= base_url('img/icon.png') ?>" style="height: 40px">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $url == '/home' ? "active fw-bold" : "" ?>" aria-current="page" href="/home">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $url == '/search' ? "active fw-bold" : "" ?>" aria-current="page" href="/search">Search</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $url == '/favorite' ? "active fw-bold" : "" ?>" aria-current="page" href="/favorite">Favorite</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $url == '/watchlist' ? "active fw-bold" : "" ?>" aria-current="page" href="/watchlist">Watchlist</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $url == '/about' ? "active fw-bold" : "" ?>" aria-current="page" href="/about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $url == '/profile' ? "active fw-bold" : "" ?>" aria-current="page" href="/profile">Profile</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


    <div class="container-fluid py-5 my-5">
        <?= $this->renderSection('content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</body>

</html>