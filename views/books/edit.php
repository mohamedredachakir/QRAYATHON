<?php include './../views/layout/header.php'; ?>
<?php include './../views/layout/navbar.php'; ?>

<div class="container mx-auto px-6 py-12">
    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
        <div class="bg-king p-8 text-center border-b border-gold-500/30">
            <h2 class="text-3xl font-royal text-gold uppercase tracking-widest">Edit Royal Scroll</h2>
            <p class="text-gray-400 text-xs mt-2 italic">Update the archives for volume #<?= $book->id ?></p>
        </div>

        <form action="index.php?url=books/edit" method="POST" class="p-8 space-y-6">
            <input type="hidden" name="id" value="<?= $book->id ?>">

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-xs font-bold text-king uppercase mb-2 tracking-wider">Scroll Title</label>
                    <input type="text" name="title" value="<?= htmlspecialchars($book->title) ?>" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition bg-gray-50/50">
                </div>

                <div>
                    <label class="block text-xs font-bold text-king uppercase mb-2 tracking-wider">Author / Scribe</label>
                    <input type="text" name="author" value="<?= htmlspecialchars($book->author) ?>" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition bg-gray-50/50">
                </div>

                <div>
                    <label class="block text-xs font-bold text-king uppercase mb-2 tracking-wider">Year of Publication</label>
                    <input type="number" name="year" value="<?= $book->year ?>" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring-1 focus:ring-gold outline-none transition bg-gray-50/50">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" name="update_book" 
                        class="flex-1 bg-king text-gold font-bold py-4 rounded-xl border border-gold-500 hover:bg-gold-500 hover:text-white transition duration-300 shadow-lg uppercase tracking-widest text-sm">
                    Save Changes
                </button>
                
                <a href="index.php?url=books" 
                   class="px-8 py-4 bg-gray-100 text-gray-500 font-bold rounded-xl hover:bg-gray-200 transition text-sm uppercase tracking-widest text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<?php include './../views/layout/footer.php'; ?>