<!DOCTYPE html>
<html lang="en">

<?= view('ACOMPONENTS/NEWS/adminnewsheader'); ?>
<body>
<div class="container-fluid">
    <?= view('ACOMPONENTS/adminheader'); ?>
    <!-- Add a small gap between adminheader and amanagesidebar -->
    <div style="margin-bottom: 20px;"></div>
    
    <div class="row">
        <!-- Include the admin header -->
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
