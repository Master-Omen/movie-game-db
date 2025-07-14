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



    <div class="container py-5 d-flex justify-content-center">
        <form action="/" method="post" class="bg-white px-5 py-4 shadow-sm rounded-3" style="width: 30rem;">
            <?= csrf_field(); ?>

            <h3 class="text-center text-success m-0">LOGIN</h3>

            <p class="text-center text-success mb-4">Welcome to online database containing information about movies, TV shows, and video games</p>

            <div class="mb-3">
                <label for="username" class="form-label text-success">Username</label>
                <input type="username" class="form-control" id="username" name="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-success">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>

            <button type="submit" class="btn btn-success w-100 mb-2">Sign In</button>

            <?php $error = session()->get('error'); ?>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger text-center p-1">
                    <?= $error; ?>
                </div>
            <?php endif; ?>

            <p class="text-center">Don't have an account ? <a href="/register" class="text-primary link-underline link-underline-opacity-0">Register</a> here</p>

        </form>

        <div class="shadow-sm w-25 rounded-end-3 overflow-hidden">
            <img src="<?= base_url('img/cover-login.png') ?>" class="w-100 h-100 object-fit-cover">
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</body>

</html>