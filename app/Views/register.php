<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <title>Login</title>
</head>

<body class="bg-light">

    <?php $errors = session()->getFlashdata('errors') ?>

    <div class="container py-5 d-flex justify-content-center">
        <form action="/register" method="post" class="bg-white px-5 py-4 rounded-3 shadow-sm" style="width: 30rem;">
            <?= csrf_field(); ?>

            <h3 class="text-center text-success mb-4">Register</h3>

            <div class="mb-3">
                <label for="username" class="form-label text-success">Username</label>
                <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" id="username" name="username">
                <div class="invalid-feedback">
                    <?= isset($errors['username']) ? $errors['username'] : '' ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-success">Password</label>
                <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id=" password" name="password">
                <div class="invalid-feedback">
                    <?= isset($errors['password']) ? $errors['password'] : '' ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-success">Email</label>
                <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id=" email" name="email">
                <div class="invalid-feedback">
                    <?= isset($errors['email']) ? $errors['email'] : '' ?>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100 my-3">Create now</button>
        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</body>

</html>