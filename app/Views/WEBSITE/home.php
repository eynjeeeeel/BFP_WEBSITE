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
            max-width: 1500px;
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

        .btn-news {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?= view('COMPONENTS/header'); ?>

    <div class="container">
        <div class="row justify-content-center">
            
                <!---------------------------------------  CAROUSEL IMAGES ----------------------------------------------->
                <div class="col-md-16">
                    <div id="carouselExample" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($imageSources as $index => $imageSource) : ?>
                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                    <img class="d-block w-100" src="<?= base_url($imageSource) ?>" alt="Image <?= $index + 1 ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>


                <!--------------------------------------- NEWS PRESS RELEASE ----------------------------------------------->
                <div class="col-md-1">
                    <a href="<?= site_url('news') ?>" class="btn btn-danger btn-news">News</a>
                </div>


                <!--------------------------------------- SAFETY TIPS  ----------------------------------------------->
                <div class="col-md-1 offset-md-1">
                    <a href="<?= site_url('') ?>" class="btn btn-danger btn-news">Safety Tip</a>
                </div>

                <!--------------------------------------- SAFETY TIPS  ----------------------------------------------->
                <div class="col-md-1 offset-md-1">
                    <a href="<?= site_url('') ?>" class="btn btn-danger btn-news">Safety Ti</a>
                </div>

                <!--------------------------------------- SAFETY TIPS  ----------------------------------------------->
                <div class="col-md-1 offset-md-1">
                    <a href="<?= site_url('') ?>" class="btn btn-danger btn-news">Safety T</a>
                </div>

                <!--------------------------------------- SAFETY TIPS  ----------------------------------------------->
                <div class="col-md-1 offset-md-1">
                    <a href="<?= site_url('') ?>" class="btn btn-danger btn-news">Safety Tips</a>
                </div>

                <!---------------------------------------  LINK TO OTHER AGENCIES ----------------------------------------------->
                <div class="col-md-1 offset-md-1">
                    <a href="<?= site_url('news') ?>" class="btn btn-danger">Link To Other Agencies</a>
                </div>
        </div>
    </div>

    <?= view('COMPONENTS/footer'); ?>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#carouselExample').carousel({
                interval: 2000
            });
        });
    </script>
</body>

</html>
