<?= $this->extend('layouts/user_layout'); ?>

<?= $this->section('content'); ?>
<div class="container p-5 d-flex justify-content-center">

    <div class="card bg-success bg-white border rounded-3 overflow-hidden p-5" style="width: 32rem;">
        <h3 class="text-primary text-center mb-4">PROFILE</h3>

        <div class="row">
            <div class="col-3">
                Username
            </div>
            <div class="col-9 text-primary">
                : <?= $username; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                Password
            </div>
            <div class="col-9">
                : <span class="text-danger">*****</span>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                E-mail
            </div>
            <div class="col-9 text-primary">
                : <?= $email; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                Created at
            </div>
            <div class="col-9 text-primary">
                : <?= $created; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                Updated at
            </div>
            <div class="col-9 text-primary">
                : <?= $updated; ?>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4 gap-2">
            <a href="/updateprofile" class="btn btn-outline-primary">Change Profile</a>
            <a href="/logout" class="btn btn-outline-danger">Log Out</a>
        </div>
    </div>

    <?= $this->endSection(); ?>