<?php

$page = $_GET['page'];
$offset = ($page - 1) * 2;

$posts = $db->query(
  "SELECT posts.*, images.filename, users.full_name from posts
  inner join users on posts.author_id=users.id
  inner join images on posts.image_id=images.id
  ORDER BY posted_on DESC LIMIT $offset, 2;"
)->findAll();

?>
<?php foreach($posts as $post): ?>
    <div id="post-container" class="">
        <a href="/post?id=<?= $post['id'] ?>">
            <h2 class="text-3xl font-bold mb-2"><?= $post['title'] ?></h2>
            <h4 class="text-xl"><?= str_split($post['body'], 94)[0] ?>...</h4>
        </a>
        <p class="mt-2">
            Posted by
            <a href="#!" class="font-semibold"><?= $post['full_name'] ?></a>
            on <span class="font-semibold"><?= $post['posted_on'] ?></span>
        </p>
        <div class="flex gap-2 mt-4 text-sm font-medium text-gray-800">
            <div>like <?= $post['likes']; ?></div>
            <div>comment <?= $post['likes']; ?></div>
        </div>
    </div>
<?php endforeach; ?>
