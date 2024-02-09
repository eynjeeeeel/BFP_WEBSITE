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

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#carouselModal">
                        Add Carousel Image
                    </button>

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th class="col-md-1">Carousel Id</th>
                                <th class="col-md-2">Image</th>
                                <th class="col-md-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($carousel_images)): ?>
                            <?php $count = 0; ?>
                            <?php foreach ($carousel_images as $item): ?>
                                <?php if ($count < 5): ?>
                                    <tr class="table-row">
                                        <td><?= $item['carousel_id']; ?></td>
                                        <td><?= $item['image_path']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning edit-carousel-btn"
                                                data-carousel_id="<?= $item['carousel_id'] ?>" data-image="<?= $item['image_path'] ?>">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger delete-carousel-btn"
                                                data-carousel_id="<?= $item['carousel_id'] ?>">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php $count++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
<!-- Pagination -->
<nav aria-label="Page navigation">
    <ul class="pagination">
        <!-- Previous button -->
        <?php $currentPage = isset($_GET['table-page']) ? $_GET['table-page'] : 1; ?>
        <?php $totalPages = !empty($carousel_images) ? ceil(count($carousel_images) / 5) : 1; ?>
        <?php if ($currentPage > 1) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= site_url('carouselImages?table-page=' . ($currentPage - 1)); ?>" aria-label="Previous">
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
                <a class="page-link" href="<?= site_url('carouselImages?table-page=' . ($currentPage + 1)); ?>" aria-label="Next">
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

    <?= view('ACOMPONENTS/CAROUSEL/crsladdImages'); ?>

    <div class="modal fade" id="editCarouselModal" tabindex="-1" role="dialog" aria-labelledby="editCarouselModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCarouselModalLabel">Edit Carousel Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCarouselForm" action="<?= base_url('carousel/update') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="carousel_id" id="editCarouselId" value="">
                        
                        <div class="form-group">
                            <label for="editCarouselImage">Image</label>
                            <input type="file" class="form-control" id="editCarouselImage" name="image_path">
                            <img src="" alt="Carousel Image" class="img-thumbnail" id="editCarouselImagePreview" style="max-width: 100%; height: auto;">
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
    function setEditModal(carousel_id, image_path) {
        $('#editCarouselId').val(carousel_id);
        $('#editCarouselImagePreview').attr('src', '<?= base_url('public/carousel_images/') ?>' + image_path);
        $('#editCarouselModal').modal('show');
    }

    $(document).on('click', '.edit-carousel-btn', function () {
        var carousel_id = $(this).data('carousel_id');
        var image_path = $(this).data('image_path');

        setEditModal(carousel_id, image_path);
    });

    function submitEditForm() {
        $('#editCarouselForm').submit();
    }

    function showDeleteConfirmation(carousel_id) {
    var confirmation = confirm("Are you sure you want to delete this carousel image?");
    if (confirmation) {
        window.location.href = '<?= base_url('carousel/delete/') ?>' + carousel_id;
    }
}

    $(document).on('click', '.delete-carousel-btn', function () {
        var carousel_id = $(this).data('carousel_id');
        showDeleteConfirmation(carousel_id);
    });

    <?php if(session()->has('success')): ?>
        window.location.href = '<?= base_url('crsladdimages') ?>';
    <?php endif; ?>
    </script>
</body>
</html>
