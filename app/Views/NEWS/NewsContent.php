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

        .container {
            margin-top: 20px;
        }

        .card {
            transition: transform 0.2s;
            width: 100%; /* Make the card take the full width */
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 2rem; /* Increased font size */
            margin-bottom: 15px; /* Increased margin for better spacing */
        }

        .card-text {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .news-image {
            max-width: 100%; /* Ensure the image fits within its container */
            height: auto; /* Maintain the image aspect ratio */
            margin-bottom: 15px; /* Added margin for spacing */
        }

        .btn-back {
            margin-top: 15px;
        }

        /* Added custom style for dynamic column layout */
        .dynamic-columns {
            column-count: 2; /* Adjust the column count as needed */
            column-gap: 20px;
        }
    </style>
</head>

<body>

    <?= view('COMPONENTS/header'); ?>

    <div class="container mt-4">
        <a href="javascript:history.go(-1);" class="btn btn-danger btn-back">Back</a>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body dynamic-columns">
                        <h2 class="card-title"><?= esc($news['title']) ?></h2>
                        <?php
                            $photoPath = base_url('newsphoto/' . esc($news['image']));
                            $newsBody = esc($news['content']);
                        ?>
                        <img src="<?= $photoPath ?>" alt="News Photo" class="news-image">
                        
                        <p class="card-text"><?= $newsBody ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= view('COMPONENTS/footer'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
