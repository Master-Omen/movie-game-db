<?= $this->extend('layouts/user_layout'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center text-secondary fw-bold">SEARCH</h1>

<div class="container mb-5 px-5">

    <form action="/search" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="search titles......" name="query">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary rounded-start-0">
                    Browse
                </button>
            </div>
        </div>
    </form>

</div>

<div class="container d-flex justify-content-center">

    <div style="width: 75rem;">
        <div class="row">
            <?php foreach ($data as $row) : ?>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-3">
                    <a href="/search/<?= $row['#IMDB_ID']; ?>" class="link-offset-2 link-underline link-underline-opacity-0">
                        <div class="d-flex justify-content-center mb-2">
                            <img src="<?= isset($row['#IMG_POSTER']) ? $row['#IMG_POSTER'] : base_url('img/no-img.jpg') ?>" class="rounded-3 shadow object-fit-cover" style="width: 13rem; height: 20rem">
                        </div>
                        <div class="text-center">
                            <?= $row['#TITLE']; ?>
                            <p class="text-center text-secondary"><?= isset($row['#YEAR']) ? $row['#YEAR'] : 'N/A'; ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</div>

<?= $this->endSection(); ?>