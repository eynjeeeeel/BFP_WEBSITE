<?= view('ACOMPONENTS/NEWS/adminnewsheader'); ?>

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
                    <form action="<?= base_url('news/store') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="newsTitle">Title</label>
                            <input type="text" class="form-control" name="title" id="newsTitle" placeholder="Enter news title" required>
                        </div>
                        <div class="form-group">
                            <label for="newsContent">Content</label>
                            <textarea class="form-control" name="content" id="newsContent" rows="3"
                                placeholder="Enter news content" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="newsImage">Image</label>
                            <input type="file" class="form-control" name="image" id="newsImage" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add News</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!DOCTYPE html>
<html lang="en">

<?= view('ACOMPONENTS/NEWS/adminnewsheader'); ?>

<body>

<div class="container-fluid">
        <?= view('ACOMPONENTS/adminheader'); ?>
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2">
                <div class="sidebar">
                    <h2>Admin Dashboard</h2>
                    <a href="<?= site_url('/admin-home') ?>" class="nav-link">Home</a>
                    <a href="<?= site_url('/newscreate') ?>" class="nav-link">Manage News</a>
                    <!-- Add more navigation links as needed -->
                </div>
            </div>

            <!-- Main Content -->
            <?= view('ACOMPONENTS/NEWS/newsmaincontent'); ?>
        </div>

        <?= view('COMPONENTS/footer'); ?>
    </div>

    <?= view('NEWS/NewsCreate'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
