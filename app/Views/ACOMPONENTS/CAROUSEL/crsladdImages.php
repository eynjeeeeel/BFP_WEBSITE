<div class="modal fade" id="carouselModal" tabindex="-1" role="dialog" aria-labelledby="carouselModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carouselModalLabel">Add Carousel Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('carousel/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="carouselImage">Choose Image(s) for Carousel:</label>
                        <input type="file" class="form-control-file" id="carouselImage" name="images[]" multiple accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
