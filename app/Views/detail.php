<?= $this->extend('layouts/user_layout'); ?>

<?= $this->section('content'); ?>
<?php $button = session()->get('button'); ?>
<div class="container">
    <div class="row shadow rounded-4 overflow-hidden position-relative mb-3">
        <div class="col-3 col-sm-4 col-xl-3 p-0">
            <img src="<?= $row['primaryImage']; ?>" class="w-100 h-100 bg-primary object-fit-cover">
        </div>

        <div class="col-9 col-sm-8 col-xl-9 px-4 py-3 bg-white">

            <div class="d-flex justify-content-between gap-2 ">
                <h4 class="fw-bold text-success m-0"><?= $row['title']; ?></h4>
                <span>⭐<?= $row['ratingsSummary']; ?></span>
            </div>
            <p class="text-secondary"><?= $row['ori_title']; ?></p>

            <div>
                <span class="text-capitalize"> <?= $row['type']; ?></span> ~
                <?= $row['releaseDate']; ?> ~
                <?= $row['runtime']; ?>
            </div>

            <div class="row px-3 mt-2">
                <?php foreach ($row['genres'] as $genre) : ?>
                    <p class="col-auto border border-success text-success rounded-4 px-2 d-inline shadow-sm mb-2 mx-1"><?= $genre["text"]; ?></p>
                <?php endforeach; ?>
            </div>

            <p class="mb-5"><?= $row['plot']; ?></p>

            <div class="position-absolute bottom-0 mb-3">

                <div class="d-flex justify-contents-start gap-2">
                    <?php if ($favorite) :  ?>
                        <form action="/search/delete" method="post">
                            <?php csrf_field(); ?>
                            <input type="hidden" value="favorite" name="order">
                            <input type="hidden" value="<?= $row['imdbId'] ?>" name="id">
                            <button type="submit" class="btn btn-outline-danger">Del from Favorite</button>
                        </form>
                    <?php elseif (!$favorite) :  ?>
                        <form action="/search/save" method="post">
                            <?php csrf_field(); ?>
                            <input type="hidden" value="favorite" name="order">
                            <input type="hidden" value="<?= $row['imdbId'] ?>" name="id">
                            <button type="submit" class="btn btn-outline-primary">Add to Favorite</button>
                        </form>
                    <?php endif; ?>

                    <?php if ($watchlist) :  ?>
                        <form action="/search/delete" method="post">
                            <?php csrf_field(); ?>
                            <input type="hidden" value="watchlist" name="order">
                            <input type="hidden" value="<?= $row['imdbId'] ?>" name="id">
                            <button type="submit" class="btn btn-outline-danger">Del from Watchlist</button>
                        </form>
                    <?php elseif (!$watchlist) :  ?>
                        <form action="/search/save" method="post">
                            <?php csrf_field(); ?>
                            <input type="hidden" value="watchlist" name="order">
                            <input type="hidden" value="<?= $row['imdbId'] ?>" name="id">
                            <button type="submit" class="btn btn-success">Add to Watchlist</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-9 col-md-8 col-lg-8 col-xl-6 p-1 mb-2" style="height: 25rem;">
            <video class="w-100 h-100 bg-dark rounded-4 overflow-hidden shadow" controls>
                <source src="https://imdb.iamidiotareyoutoo.com/media/<?= $row['imdbId']; ?>" type="video/mp4" />
            </video>
        </div>

        <div class="col-12 col-sm-3 col-md-4 col-lg-4 col-xl-6 p-1 mb-2" style="height: 25rem;">
            <img src="<?= $row['thumbnail'] ?>" class="w-100 h-100 object-fit-cover rounded-4 overflow-hidden shadow">
        </div>
    </div>

    <h1 class="text-success text-center mt-4">MORE PHOTOS</h1>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 bg-dark px-2 py-4 rounded-3 shadow">
        <?php foreach ($row['images'] as $image): ?>
            <div class="col d-flex justify-content-center mb-3">
                <img src="<?= $image['node']['url'] ?>" class="d-block w-100 object-fit-contain" alt="Image slide">
            </div>
        <?php endforeach; ?>
    </div>



</div>

<?= $this->endSection(); ?>