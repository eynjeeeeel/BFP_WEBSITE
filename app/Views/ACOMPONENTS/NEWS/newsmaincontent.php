<!DOCTYPE html>
<html lang="en">

<?= view('ACOMPONENTS/NEWS/adminnewsheader'); ?>

<body>
    <?= view('ACOMPONENTS/adminheader'); ?>

    <div class="container-fluid">

        <div class="row">
            <?= view('ACOMPONENTS/amanagesidebar'); ?>

            <div class="col-md-10">
                <div class="content">
                    <h3>Welcome to BFP Admin Dashboard</h3>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newsModal">
                        Add News
                    </button>

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th class="col-md-1">News ID</th>
                                <th class="col-md-3">Title</th>
                                <th class="col-md-4">Content</th>
                                <th class="col-md-2">Image</th>
                                <th class="col-md-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            <?php foreach ($news as $item) : ?>
                                <?php if ($count < 5) : ?>
                                    <tr class="table-row">
                                        <td><?= $item['news_id']; ?></td>
                                        <td><?= substr($item['title'], 0, 50); ?> ...</td>
                                        <td><?= substr($item['content'], 0, 100); ?> ...</td>
                                        <td><?= $item['image']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning edit-news-btn"
                                                data-newsid="<?= $item['news_id'] ?>" data-title="<?= $item['title'] ?>"
                                                data-content="<?= $item['content'] ?>" data-image="<?= $item['image'] ?>">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger delete-news-btn"
                                                data-newsid="<?= $item['news_id'] ?>">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php $count++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
<!-- Pagination -->
<nav aria-label="Page navigation">
    <ul class="pagination">
        <!-- Previous button -->
        <?php $currentPage = isset($_GET['table-page']) ? $_GET['table-page'] : 1; ?>
        <?php $totalPages = ceil(count($news) / 5); ?>
        <?php if ($currentPage > 1) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= site_url('newscreate?table-page=' . ($currentPage - 1)); ?>" aria-label="Previous">
                    <span aria-hidden="true">Previous</span>
                </a>
            </li>
        <?php else : ?>
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        <?php endif; ?>

        <!-- Next button -->
        <?php if ($currentPage < $totalPages) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= site_url('newscreate?table-page=' . ($currentPage + 1)); ?>" aria-label="Next">
                    <span aria-hidden="true">Next</span>
                </a>
            </li>
        <?php else : ?>
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
        <?php endif; ?>
    </ul>
</nav>


                </div>
            </div>
        </div>

        <?= view('COMPONENTS/footer'); ?>

    </div>

    <?= view('ACOMPONENTS/NEWS/NewsCreate'); ?>

    <!-- Edit News Modal -->
    <div class="modal fade" id="editNewsModal" tabindex="-1" role="dialog" aria-labelledby="editNewsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNewsModalLabel">Edit News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editNewsForm" action="<?= base_url('news/update') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="news_id" id="editNewsId" value="">
                        <div class="form-group">
                            <label for="editNewsTitle">Title</label>
                            <input type="text" class="form-control" id="editNewsTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="editNewsContent">Content</label>
                            <textarea class="form-control" id="editNewsContent" name="content" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editNewsImage">Image</label>
                            <input type="file" class="form-control" id="editNewsImage" name="image">
                            <img src="" alt="News Image" class="img-thumbnail" id="editNewsImagePreview" style="max-width: 100%; height: auto;">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitEditForm()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Function to set up the edit modal with data
    function setEditModal(newsId, title, content, image) {
        $('#editNewsId').val(newsId);
        $('#editNewsTitle').val(title);
        $('#editNewsContent').val(content);
        $('#editNewsImagePreview').attr('src', '<?= base_url('public/newsphoto/') ?>' + image);
        $('#editNewsModal').modal('show');
    }

    // Event listener for the edit button click
    $(document).on('click', '.edit-news-btn', function () {
        var newsId = $(this).data('newsid');
        var title = $(this).data('title');
        var content = $(this).data('content');
        var image = $(this).data('image');

        // Call the function to set up the edit modal with data
        setEditModal(newsId, title, content, image);
    });

    // Function to submit the edit form
    function submitEditForm() {
        $('#editNewsForm').submit();
    }

    // Function to handle delete confirmation
    function showDeleteConfirmation(newsId) {
        var confirmation = confirm("Are you sure you want to delete this news?");
        if (confirmation) {
            window.location.href = '<?= base_url('delete/') ?>' + newsId;
        }
    }

    // Event listener for the delete button click
    $(document).on('click', '.delete-news-btn', function () {
        var newsId = $(this).data('newsid');
        showDeleteConfirmation(newsId);
    });

    // After deleting a news item, redirect back to the newscreate page
    <?php if(session()->has('success')): ?>
        window.location.href = '<?= base_url('newscreate') ?>';
    <?php endif; ?>
    </script>
</body>
</html>
