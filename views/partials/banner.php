<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?= $heading ?></h1>
                    <?php if ($uri=='/post'): ?>
                        <h2 class="subheading"><?= $subheading ?></h2>
                        <span class="meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on August 24, 2022
                        </span>
                    <?php else: ?>
                        <span class="subheading"><?= $subheading ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>