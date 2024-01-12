<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BFP WEBSITE Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Arial', sans-serif;
        }

        h2 {
            color: #fff;
        }

        .sidebar {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            height: 100vh;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 0;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .container-fluid {
            margin-left: 20px;
            margin-top: 1px;
            margin-bottom: 5px;
            padding: 10px;
        }

        .container-fluid h3 {
            margin-bottom: 20px;
        }

        .content {
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .footer {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>


    <div class="container-fluid">
        <?= view('ACOMPONENTS/adminheader'); ?>
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2">
                <div class="sidebar">
                    <h2>MANAGE</h2>
                    <a href="<?= site_url('/admin-home') ?>" class="nav-link">Home</a>
                    <a href="<?= site_url('/news') ?>" class="nav-link">Manage News</a>
                    <!-- Add more navigation links as needed -->
                </div>
            </div>

            <!-- Main Content -->
            

    <!-- Modal for adding news -->
    <div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="newsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newsModalLabel">Add News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding news -->
                    <form>
                        <div class="form-group">
                            <label for="newsTitle">Title</label>
                            <input type="text" class="form-control" id="newsTitle" placeholder="Enter news title">
                        </div>
                        <div class="form-group">
                            <label for="newsContent">Content</label>
                            <textarea class="form-control" id="newsContent" rows="3"
                                placeholder="Enter news content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add News</button>
                    </form>
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
