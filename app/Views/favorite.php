<?= $this->extend('layouts/user_layout'); ?>

<?= $this->section('content'); ?>
<h1 class="text-center text-primary">FAVORITE</h1>

<div class="d-flex justify-content-center gap-1 mb-3">
    <a href="/favorite/" class="btn btn-outline-primary rounded-5">All</a>
    <a href="/favorite/movie" class="btn btn-outline-primary rounded-5">Movies</a>
    <a href="/favorite/videoGame" class="btn btn-outline-primary rounded-5">Video Games</a>
    <a href="/favorite/tvSeries" class="btn btn-outline-primary rounded-5">Tv Series</a>
</div>

<div class="container">
    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
        <?php foreach ($data as $row) : ?>
            <div class="col mb-3">

                <a href="/search/<?= $row['imdbId'] ?>" class="underlinedlink-offset-2 link-underline link-underline-opacity-0 text-center d-block my-2">
                    <?= substr($row['title'], 0, 35); ?>
                </a>

                <a href="/search/<?= $row['imdbId'] ?>" class="underlinedlink-offset-2 link-underline link-underline-opacity-0 text-center d-block">
                    <img src="<?= $row['primaryImage']; ?>" style="width:15rem; height:23rem;" class="rounded-3 border shadow object-fit-cover">
                </a>

                <p class="my-2 text-center">⭐<?= $row['ratingsSummary']; ?> ~ <span class="text-capitalize"> <a href="/watchlist/<?= $row['type']; ?>" class="underlinedlink-offset-2 link-underline link-underline-opacity-0"><?= $row['type']; ?></a></span> <?= $row['releaseDate']; ?> </p>

                <div class="d-flex justify-content-center gap-1 mb-2">
                    <?php $favorite = $row['favorite']; ?>
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

                    <?php $watchlist = $row['watchlist']; ?>
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
                            <button type="submit" class="btn btn-outline-success">Add to Watchlist</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-center gap-2 pagination">
        <?= $pager->links('default', 'bootstrap') ?>
    </div>

</div>




<?= $this->endSection(); ?>