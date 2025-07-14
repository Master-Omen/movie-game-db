<?= $this->extend('layouts/user_layout'); ?>

<?= $this->section('content'); ?>
<div class="container p-5 d-flex justify-content-center">

    <?php $errors = session()->getFlashdata('errors') ?>

    <div style="width:32rem;">

        <form action="/updateprofile" method="post" class="bg-white px-5 py-4 rounded-3 shadow-sm">
            <?= csrf_field(); ?>

            <h3 class="text-center text-success mb-4">Update Profile</h3>

            <div class="mb-3">
                <label for="username" class="form-label text-secondary">Username</label>
                <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= $username; ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-success">Password</label>
                <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id=" password" name="password" value="<?= $password; ?>">
                <div class="invalid-feedback">
                    <?= isset($errors['password']) ? $errors['password'] : '' ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-success">Email</label>
                <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id=" email" name="email" value="<?= $email; ?>">
                <div class="invalid-feedback">
                    <?= isset($errors['email']) ? $errors['email'] : '' ?>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100 my-3">Update</button>
        </form>
    </div>

    <?= $this->endSection(); ?>