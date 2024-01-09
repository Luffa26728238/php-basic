<?php require base_path("views/partials/header.php") ?>
<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>
            <a href="/notes" class="text-blue-500 underline">Go Back...</a>
        </p>
        <p> <?= htmlspecialchars($note['body']) ?></p>



        <footer class="mt-6">
            <a href="/note/edit?id=<?= $note["id"] ?>"
                class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Edit</a>
        </footer>
        <!-- <form class="mt-6 7xl" action="" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id']?>">
            <button class="text-sm text-red-500 underline ">Delete note</button>
        </form> -->
    </div>
</main>
<?php require base_path("views/partials/footer.php") ?>