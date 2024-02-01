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

        .dropdown-item.active, .dropdown-item:active {
            background-color: #EF3340;
            color: white;
        }

        a {
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


                <!---------------------------------------  WHAT'S NEWS ----------------------------------------------->
                <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        What's New
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= site_url('news') ?>">Press Release</a>
                        <a class="dropdown-item" href="#">Announcements</a>
                    </div>
                </div>

                <!---------------------------------------  NOTICE OF VACANCY ----------------------------------------------->
                <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Notice of Vacancy
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= site_url('news') ?>">Position Available</a>
                        <a class="dropdown-item" href="#">Application Status</a>
                    </div>
                </div>

                <!---------------------------------------  PROCUREMENTS ----------------------------------------------->
                <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Procurements
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= site_url('') ?>">Bids & Awards Comm</a>
                        <a class="dropdown-item" href="#">Contract Agreement</a>
                        <a class="dropdown-item" href="#">Notice of Award</a>
                        <a class="dropdown-item" href="#">Notice of Proceed</a>
                        <a class="dropdown-item" href="#">Request for Quotation</a>
                    </div>
                </div>
                <!---------------------------------------  LINK TO OTHER AGENCIES ----------------------------------------------->
                <p><a href="<?= site_url('news') ?>" class="btn btn-danger">Link To Other Agencies</a></p>
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
