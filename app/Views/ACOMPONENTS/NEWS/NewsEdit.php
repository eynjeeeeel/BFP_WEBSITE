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

                <form action="<?= base_url('news/update') ?>" method="post" enctype="multipart/form-data">

                    <?php foreach ($news as $item) : ?>
                        <?php if ($item['news_id'] == $selected_news_id): ?>
                            <input type="hidden" name="news_id" value="<?= $selected_news_id ?>">

                            <div class="form-group">
                                <label for="editNewsTitle">Title</label>
                                <input type="text" class="form-control" name="title" id="editNewsTitle" value="<?= $item['title']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="editNewsContent">Content</label>
                                <textarea class="form-control" name="content" id="editNewsContent" rows="3" required><?= $item['content']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="editNewsImage">Image</label>
                                <input type="text" class="form-control" name="image" id="editNewsImage" value="<?= $item['image']; ?>" required>
                            </div>
                            <!-- Add any other form fields as needed -->
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <button type="submit" class="btn btn-primary">Update News</button>
                </form>
            </div>
        </div>
    </div>
</div>
