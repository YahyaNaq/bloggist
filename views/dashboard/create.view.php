<?php require view('partials\head.php'); ?>

<?php require view('partials\nav.php'); ?>

<?php require view('dashboard\nav.php'); ?>

<?php require view('partials\banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<form action="/dashboard/add-a-new-blog" method="POST" enctype="multipart/form-data">
			<div class="space-y-12">
				<div class="border-b border-gray-900/10 pb-12">
					<h2 class="text-base font-semibold leading-7 text-gray-900">A quick tip</h2>
					<p class="mt-1 text-sm leading-6 text-gray-600">Add a blog atleast twice a week to stand out.</p>

					<div class="mt-10 col-span-full">
						<label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
						<div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
							<div class="text-center">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
							</svg>
							<div class="mt-4 flex text-sm leading-6 text-gray-600">
								<label for="image" class="relative cursor-pointer rounded-md font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-800">
									<span>Upload a file</span>
									<input id="image" name="image" type="file" class="sr-only">
								</label>
								<p class="pl-1">or drag and drop</p>
							</div>
							<p class="text-xs leading-5 text-gray-600">PNG or JPG up to 10MB</p>
							</div>
						</div>
						<p class="mt-1 text-sm leading-6 text-red-600"><?= $errors['image'] ?? ''; ?></p>
					</div>

					<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
						<div class="sm:col-span-4">
							<label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
							<div class="mt-2">
								<div class="flex rounded-md shadow-sm bg-white ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
									<input type="text" name="title" id="title" value="<?= $title ?? ''; ?>" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Your title here">
								</div>
							</div>
							<p class="mt-1 text-sm leading-6 text-red-600"><?= $errors['title'] ?? ''; ?></p>
						</div>

						<div class="col-span-full">
							<label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
							<div class="mt-2">
								<textarea id="body" name="body" rows="8" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"
								placeholder="Share your ideas on a topic."
								><?= $body ?? ''; ?></textarea>
							</div>
							<p class="mt-1 text-sm leading-6 text-red-600"><?= $errors['body'] ?? ''; ?></p>
						</div>
					</div>
				</div>
			</div>

			<div class="mt-6 flex items-center justify-end gap-x-6">
				<a href="/dashboard" class="rounded-md bg-gray-300/[0.7] py-2 px-3 text-sm font-semibold text-black">Cancel</a>
				<button type="submit" class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
			</div>
		</form>
	</div>
</main>




<?php require view('partials\footer.php'); ?>