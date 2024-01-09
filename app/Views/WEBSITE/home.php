<?php
    $imageSources = [
        'images/BABALA-400-×-1500px.png',
        'images/fire-safety-advocacy-banner-2023-01.jpg',
        'images/images2.jpg',
        'images/bfp-modernization.jpg',
        'images/bfp-banner.jpg',
    ];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BFP WEBSITE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }

        #carouselExample {
            max-width: 1000px;
            width: 100%;
            height: 350px;
            border: 2px solid #EF3340;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            margin-right: auto;
            margin-left: auto;
        }

        .carousel-inner {
            width: 100%;
            height: 100%;
            margin-top: 1px;
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 1s ease-in-out;
        }

        p {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?= view('COMPONENTS/header'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div id="carouselExample" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($imageSources as $index => $imageSource) : ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <img class="d-block w-100" src="<?= base_url($imageSource) ?>" alt="Image <?= $index + 1 ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <p><a href="<?= site_url('news') ?>" class="btn btn-danger">PRESS RELEASE</a></p>
            </div>
        </div>
    </div>

    <?= view('COMPONENTS/footer'); ?>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $('#carouselExample').carousel({
            interval: 2000
        });
    </script>
</body>

</html>
