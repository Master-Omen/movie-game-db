<?= $this->extend('layouts/user_layout'); ?>

<?= $this->section('content'); ?>



<div class="container-fluid bg-white py-5">
    <div class="container text-center mb-5">
        <h1 class="text-secondary mb-3">ABOUT</h1>
        <p>The site provides a comprehensive and trusted source of entertainment information, helping fans get the information they need about movies, TV shows and other entertainment content. Thanks to <a href="https://imdb.iamidiotareyoutoo.com/">imdb.iamidiotareyoutoo.com</a> for informations.
    </div>

    <div class="container">
        <h5 class="mb-4 text-center text-secondary">What i used to create this website ? </h5>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3  row-cols-xl-4">
            <div class="col mb-4" style="height: 25 rem;">
                <div class="border rounded-3 p-3 shadow-sm h-100">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="<?= base_url('img/php.png') ?>" style="width: 100px; height:100px">
                    </div>
                    <p class="text-center">
                        PHP (Hypertext Preprocessor) is a programming language specifically designed for web development. PHP is server-side, meaning that the PHP code is executed on the server before the results are sent to the user's browser.
                    </p>
                </div>
            </div>

            <div class="col mb-4">
                <div class="border rounded-3 p-3 shadow-sm h-100">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="<?= base_url('img/codeigniter.svg') ?>" style="width: 100px; height:100px">
                    </div>
                    <p class="text-center">
                        CodeIgniter is a PHP framework, or framework, used to simplify and speed up web application development. This framework is designed with a Model-View-Controller (MVC) architecture which helps in separating application logic, data, and presentation, making development and maintenance easier.
                    </p>
                </div>
            </div>

            <div class="col mb-4">
                <div class="border rounded-3 p-3 shadow-sm h-100">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="<?= base_url('img/bootstrap.png') ?>" style="width: 100px; height:100px">
                    </div>
                    <p class="text-center">
                        Bootstrap 5 is the latest version of Bootstrap, an open-source front-end framework used to build responsive, mobile-first websites and apps. Bootstrap 5 provides pre-designed components such as HTML, CSS, and JavaScript, which help developers create attractive and consistent website displays more easily and quickly.
                    </p>
                </div>
            </div>

            <div class="col mb-4">
                <div class="border rounded-3 p-3 shadow-sm h-100">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="<?= base_url('img/mysql.png') ?>" class="object-fit-contain" style="width: 100px; height:100px">
                    </div>
                    <p class="text-center">
                        MySQL is a popular open source relational database management system (RDBMS). It is used to store, manage, and retrieve data in a variety of applications, including web applications, mobile applications, and big data applications. MySQL uses SQL (Structured Query Language) as a language to interact with its database.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>