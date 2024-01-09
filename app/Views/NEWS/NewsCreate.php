<h2>Create News</h2>

<?= form_open('news/store') ?>

<label for="title">Title</label>
<input type="text" name="title" required>

<label for="body">Body</label>
<textarea name="body" required></textarea>

<button type="submit">Submit</button>

<?= form_close() ?>