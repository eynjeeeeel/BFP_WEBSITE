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

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newsModal">
                        Add News
                    </button>

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th class="col-md-1">News ID</th>
                                <th class="col-md-1">Title</th>
                                <th class="col-md-1">Content</th>
                                <th class="col-md-1">Image</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $itemsPerPage = 5;
                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start = ($currentPage - 1) * $itemsPerPage;
                            $end = $start + $itemsPerPage;
                            $paginatedNews = array_slice($news, $start, $itemsPerPage);

                            foreach ($paginatedNews as $item) :
                            ?>
                                <tr class="table-row">
                                    <td class="col-md-1"><?= $item['news_id']; ?></td>
                                    <td class="col-md-3"><?= substr($item['title'], 0, 50); ?> ...</td>
                                    <td class="col-md-4"><?= substr($item['content'], 0, 100); ?> ...</td>
                                    <td class="col-md-1"><?= $item['image']; ?></td>
                                    <td class="col-md-2">
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editNewsModal" data-newsid="<?= $item['news_id'] ?>"
                                            data-title="<?= $item['title'] ?>" data-content="<?= $item['content'] ?>"
                                            data-image="<?= $item['image'] ?>">
                                            Edit
                                        </button>
                                        <a href="<?= site_url('/delete/' . $item['news_id']) ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php
                            $totalPages = ceil(count($news) / $itemsPerPage);

                            for ($i = 1; $i <= $totalPages; $i++) :
                            ?>
                                <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>

        <?= view('COMPONENTS/footer'); ?>

    </div>

    <?= view('ACOMPONENTS/NEWS/NewsCreate'); ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        function setEditModal(newsId, title, content, image) {
            $('#editNewsId').val(newsId);
            $('#editNewsTitle').val(title);
            $('#editNewsContent').val(content);
            $('#editNewsImagePreview').attr('src', '<?= base_url('public/newsphoto/') ?>' + image);

            $('#editNewsModal').modal('show');
        }

        $(document).on('click', '[data-newsid]', function () {
            var newsId = $(this).data('newsid');
            var title = $(this).data('title');
            var content = $(this).data('content');
            var image = $(this).data('image');

            setEditModal(newsId, title, content, image);
        });
    </script>

</body>

</html>
