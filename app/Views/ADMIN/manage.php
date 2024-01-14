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
    <?= view('ACOMPONENTS/adminheader'); ?>
    <div class="container-fluid">
       
        <div class="row">

            <!------------- SIDEBAR -------------------------->
            <?= view('ACOMPONENTS/amanagesidebar'); ?>

            <!------------- MAIN CONTENT ---------------------->
            <div class="col-md-9">
                <div class="content">
                    <h3>Welcome to BFP Admin Dashboard</h3>

                    <p>This is temporary content. Replace it with your actual content for the admin dashboard.</p>

                    <!-- Add more content as needed -->

                </div>
            </div>
        </div>

        <?= view('COMPONENTS/footer'); ?>
    </div>

    <?= view('ACOMPONENTS/NEWS/NewsCreate'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
