<?php include 'partials/header.php'; ?>

    <form method="POST" class="row posts">
        <input type="hidden" name="id" value="<?= $post ? $post->id : ''; ?>">
        <div class="form-field">
            <label for="title">Title</label>
            <input type="text" name="title" value="<?= $post ? $post->title : ''; ?>" required>
        </div>
        <div class="form-field">
            <label for="content">Content</label>
            <textarea name="content" required><?= $post ? $post->content : ''; ?></textarea>
        </div>
        <div class="form-field">
            <button type="submit" class="button"><?= $post ? 'Update Post' : 'Add Post'; ?></button>
        </div>
    </form>

    <?php if ($post) : ?>
        <form method="POST" action="/admin/delete/<?= $post->id; ?>" class="form-field">
            <button type="submit" class="button button-alert">Delete Post</button>
        </form>
    <?php endif; ?>

<?php include 'partials/footer.php';
