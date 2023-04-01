<nav class="bg-slate-900">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-14 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/dashboard" class="<?= urlIs($uri,"/dashboard", true); ?> hover:bg-gray-700 hover:text-white px-2 py-1 rounded-md text-sm">Your blogs</a>
                    <a href="/dashboard/add-a-new-blog" class="<?= urlIs($uri,"/dashboard/add-a-new-blog", true); ?> hover:bg-gray-700 hover:text-white px-2 py-1 rounded-md text-sm">Add new</a>
                    <a href="/dashboard/analytics" class="<?= urlIs($uri,"/dashboard/analytics", true); ?> hover:bg-gray-700 hover:text-white px-2 py-1 rounded-md text-sm">Analytics</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>