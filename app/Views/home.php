<?= $this->extend('layouts/user_layout'); ?>

<?= $this->section('content'); ?>
<div class="container bg-white border rounded-3 overflow-hidden" style="width: 60rem;">
    <div class="row">
        <div class="col-3 p-0 border">
            <img src="<?= base_url('img/cover-1.png') ?>" class="w-100 h-100 object-fit-cover">
        </div>
        <div class="col-6 py-5 px-4 d-flex align-items-center">
            <div class="w-100">
                <h4 class="text-center text-uppercase">Welcome back, <span class="text-primary"><?= $user; ?></span></h4>
                <p class="text-center">This website contain information about TV Show, Movie and Games. </p>
                <a href="/search" class="btn btn-dark w-100 mb-3">🔎Browse</a>
                <a href="/favorite" class="btn btn-outline-primary w-100 mb-3">❤️Favorites</a>
                <a href="/watchlist" class="btn btn-outline-success w-100 mb-3">👁️‍🗨️Watchlist</a>
                <a href="/profile" class="btn btn-primary w-100">🏠My Profile</a>
            </div>
        </div>
        <div class="col-3 p-0 border">
            <img src=" <?= base_url('img/cover-2.png') ?>" class="w-100 h-100 object-fit-cover">
        </div>
    </div>
</div>

<?= $this->endSection(); ?>