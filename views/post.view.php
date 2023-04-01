<?php require view('partials\head.php'); ?>

<?php require view('partials\nav.php'); ?>

<?php require view('partials\banner.php'); ?>

<!-- Post Content-->
<article class="mb-3">
    <div class="text-lg mx-28 max-w-4xl py-6 sm:px-6 lg:px-8">
        <div class="w-full bg-gray-400 text-white mb-3">
            <img src="<?= $bgimg; ?>" alt="img"/>
        </div>
        <p class="mb-4 text-sm">
            Posted by
            <a href="#!" class="font-semibold"><?= $post['full_name'] ?></a>
            on <span class="font-semibold"><?= $post['posted_on'] ?></span>
        </p>
        <div class="">
            <?= $post['body']; ?>
        </div>
        <!-- <div class="col-md-10 col-lg-8 col-xl-7">
            <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center — an equal earth which all men occupy as equals. The airman's earth, if free men make it, will be truly round: a globe in practice, not in theory.</p>
            <p>Science cuts two ways, of course; its products can be used for both good and evil. But there's no turning back from science. The early warnings about technological dangers also come from science.</p>
            <p>What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.</p>
            <p>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become her protectors rather than her violators. That's how I felt seeing the Earth for the first time. I could not help but love and cherish her.</p>
            <p>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.</p>
            <h2 class="section-heading">The Final Frontier</h2>
            <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>
            <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>
            <blockquote class="blockquote">The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.</blockquote>
            <p>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</p>
            <h2 class="section-heading">Reaching for the Stars</h2>
            <p>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the size of a marble, the most beautiful you can imagine. That beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.</p>
            <a href="#!"><img class="img-fluid" src="assets/img/post-sample-image.jpg" alt="..." /></a>
            <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>
            <p>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p>
            <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p>
            <p>
                Placeholder text by
                <a href="http://spaceipsum.com/">Space Ipsum</a>
                &middot; Images by
                <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
            </p>
        </div> -->
        <div class="flex gap-2 mt-4 text-sm font-medium text-gray-800">
            <div>like <?= $post['likes']; ?></div>
            <div>comment <?= $post['likes']; ?></div>
        </div>
        <hr class="mt-2 mb-3"/>
        <div class="flex justify-between items-center my-2">
            <h2 class="text-lg lg:text-xl font-semibold text-gray-900">Discussion (20)</h2>
        </div>
        <form class="mb-6">
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-2 border-slate-400/[.5] shadow">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" rows="6"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none"
                    placeholder="Write a comment..."></textarea>
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-sm font- text-center text-white bg-indigo-700 rounded-md focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                Post comment
            </button>
        </form>
        <article class="border-2 border-slate-400/[.5] p-6 mb-6 text-base bg-white rounded-lg">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900"><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                            alt="Michael Gough">Michael Gough</p>
                    <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-08"
                            title="February 8th, 2022">Feb. 8, 2022</time></p>
                </div>
                <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                    type="button">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                        </path>
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownComment1"
                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1 text-sm text-gray-700"
                        aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100">Remove</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100">Report</a>
                        </li>
                    </ul>
                </div>
            </footer>
            <p class="text-gray-500">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                instruments for the UX designers. The knowledge of the design tools are as important as the
                creation of the design strategy.</p>
            <div class="flex items-center mt-4 space-x-4">
                <button type="button"
                    class="flex items-center text-sm text-gray-500 hover:underline">
                    <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    Reply
                </button>
            </div>
        </article>
        <article class="border-2 border-slate-400/[.5] p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900"><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                            alt="Jese Leos">Jese Leos</p>
                    <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-12"
                            title="February 12th, 2022">Feb. 12, 2022</time></p>
                </div>
                <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                    type="button">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                        </path>
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownComment2"
                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1 text-sm text-gray-700"
                        aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100">Remove</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100">Report</a>
                        </li>
                    </ul>
                </div>
            </footer>
            <p class="text-gray-500">Much appreciated! Glad you liked it ☺️</p>
            <div class="flex items-center mt-4 space-x-4">
                <button type="button"
                    class="flex items-center text-sm text-gray-500 hover:underline">
                    <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    Reply
                </button>
            </div>
        </article>

<?php require view('partials\footer.php'); ?>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
