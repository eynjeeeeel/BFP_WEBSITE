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
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img {
            max-height: 200px; 
            object-fit: cover;
        }
    </style>
</head>

<body>

    <?= view('COMPONENTS/header'); ?>

    <div class="container mt-4">
        <a href="javascript:history.go(-1);" class="btn btn-danger mt-3">Back</a>
        <h2 class="mb-4">News Update</h2>
        <div class="row">
            <?php foreach ($news as $item): ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="public/newsphoto<?= esc($item['image']) ?>" class="card-img-top" alt="<?= esc($item['title']) ?>">
                            <h3 class="card-title"><?= esc($item['title']) ?></h3>
                            <p class="card-text"><?= esc(substr($item['content'], 0, 200)) ?>...</p>
                            <a href="<?= site_url('news/' . esc($item['slug'])) ?>" class="btn btn-danger">View article</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?= view('COMPONENTS/footer'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
