<?php include 'partials/header.php'; ?>

    <div class="row post">
        <h1 class="post-title"><?= $post->title; ?></h1>
        <p class="posts-content"><?= $post->content; ?></p>
        <a href="/admin/edit/<?= $post->id; ?>">Edit</a>
    </div>

<?php include 'partials/footer.php';
