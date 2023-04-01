<?php require view('partials\head.php'); ?>

<?php require view('partials\nav.php'); ?>

<?php require view('dashboard\nav.php'); ?>

<?php require view('partials\banner.php'); ?>

<!-- Main Content-->
<div class="container">
    <div class="mx-28 max-w-5xl py-6 sm:px-6 lg:px-8">
        <div class="">
        <!-- DISCLAIMER: $post != $_POST -->
        <?php foreach($posts as $post): ?>
            <!-- Post preview-->
            <div class="flex gap-4">
                <div class="w-1/3 bg-gray-400 text-white">
                    <img src="/assets/img/<?= $post['img_name']; ?>" alt="img"/>
                </div>
                <div class="w-2/3">
                    <a href="/post?id=<?= $post['id'] ?>">
                        <h2 class="text-3xl font-bold mb-2"><?= $post['title'] ?></h2>
                        <h4 class="text-xl"><?= str_split($post['body'], 94)[0] ?>...</h4>
                    </a>
                    <div class="flex gap-2 mt-3 text-sm font-medium text-gray-800">
                        <div>likes <?= $post['likes']; ?></div>
                        <div>comments <?= $post['likes']; ?></div>
                    </div>
                    <div class="flex gap-1">
                        <a
                        href="/dashboard/edit-a-blog?id=<?= $post['id'] ?>"
                        class="mt-4 rounded-md border border-transparent bg-indigo-600 py-2 px-3 text-xs font-regular text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >Edit</a>
                        <a
                        href="/dashboard/delete-a-blog?id=<?= $post['id'] ?>"
                        class="mt-4 rounded-md border border-transparent bg-red-600 py-2 px-3 text-xs font-regular text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                        >Delete</a>
                    </div>
                </div>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
        <?php endforeach; ?>
            <!-- Pager-->
            <div class="mb-12">
                <a class="font-medium text-md uppercase px-4 py-3 bg-indigo-700 text-white rounded-sm" href="#!">Older Posts →</a>
            </div>
        </div>
    </div>
</div>

<?php require view('partials\footer.php'); ?>

