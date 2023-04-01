<?php require view('partials\head.php'); ?>

<?php require view('partials\nav.php'); ?>

<?php require view('dashboard\nav.php'); ?>

<?php require view('partials\banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 text-lg">
		<h1>Are you sure you want to delete this post?</h1>
		<form method='POST' action="/dashboard/delete-a-blog" class="flex gap-1">
			<input type="hidden" name="_method" value="DELETE">
			<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
			<button
			type="submit"
			class="mt-4 rounded-md border border-transparent bg-indigo-600 py-2 px-3 text-sm font-regular text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
			>Yes</button>
			<a
			href="/dashboard"
			class="mt-4 rounded-md border border-transparent bg-red-600 py-2 px-3 text-sm font-regular text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
			>No please</a>
		</form>
	</div>
</main>

<?php require view('partials\footer.php'); ?>