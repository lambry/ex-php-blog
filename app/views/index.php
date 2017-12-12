<?php include 'partials/header.php'; ?>

    <div class="row posts">
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <h2 class="post-title"><a href="/posts/<?= $post->slug; ?>"><?= $post->title; ?></a></h2>
                <p class="post-content">
                    <?= strlen($post->content) > 150 ? substr($post->content, 0, 150) . '...' : $post->content; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>

<?php include 'partials/footer.php';
