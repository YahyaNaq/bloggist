<?php require view('partials\head.php'); ?>

<?php require view('partials\nav.php'); ?>

<?php require view('partials\banner.php'); ?>


<!-- Main Content-->
<div class="container">
    <div class="mx-28 max-w-2xl py-6 sm:px-6 lg:px-8">
        <!-- <div class="">
            <input
            type="search" placeholder="Search by title"
            id="searchInput" class="" 
            aria-label="Search"
            />
        </div> -->
        <div id="post-container" class="">
        <!-- DISCLAIMER: $post != $_POST -->
        <?php foreach($posts as $post): ?>
            <!-- Post preview-->
            <div id="" class="">
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
            <!-- Divider-->
            <hr class="my-4" />
        <?php endforeach; ?>
            <!-- Pager-->
            <button id="load-more" class="mb-12">
                <a href="#" data-page="2" class="font-medium text-md uppercase px-4 py-3 bg-indigo-700 text-white rounded-sm">Older Posts </a>
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $("#load-more").click(function() {
        var page = $(this).data("page");

        $.ajax({
        url: "load_more.php",
        method: "GET",
        data: { page: page },
        success: function(html) {
            // Append the HTML to the comments container
            $("#post-container").append(html);
            
            // Update the "older posts" button data attribute
            $("#load-more").data("page", page + 1);
        },
        error: function() {
            alert("Error loading comments.");
        }
        });
    });
    });
</script>

<?php require view('partials\footer.php'); ?>
