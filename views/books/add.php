<?php include './../views/layout/header.php'; ?>
<?php include './../views/layout/navbar.php'; ?>

<div class="min-h-screen bg-king py-12 px-6 flex items-center justify-center">
    <div class="max-w-2xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden border-b-8 border-gold-500">
        <div class="bg-king p-8 text-center border-b border-gold/20">
            <h1 class="text-3xl font-royal text-gold mb-2 uppercase tracking-[0.2em]">Add New Scroll</h1>
            <p class="text-gray-400 text-xs uppercase tracking-widest">Expand the Imperial Library Archives</p>
        </div>

        <form action="index.php?url=books/add" method="POST" class="p-10 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Book Title</label>
                    <input type="text" name="title" required placeholder="e.g. The Golden Kingdom"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gold-500 outline-none transition bg-gray-50">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Author</label>
                    <input type="text" name="author" required placeholder="Author Name"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gold-500 outline-none transition bg-gray-50">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Publication Year</label>
                    <input type="number" name="year" required min="1000" max="2025" placeholder="YYYY"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gold-500 outline-none transition bg-gray-50">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Category</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gold-500 outline-none transition bg-gray-50">
                        <option value="history">History</option>
                        <option value="philosophy">Philosophy</option>
                        <option value="literature">Literature</option>
                        <option value="science">Science</option>
                    </select>
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" name="add_book"
                        class="w-full py-4 bg-king text-gold font-bold tracking-[0.2em] uppercase rounded-xl shadow-lg hover:bg-gold-500 hover:text-white transition-all duration-300 transform hover:scale-[1.02]">
                    Register Volume
                </button>
                
                <div class="text-center mt-4">
                    <a href="index.php?url=books" class="text-gray-400 text-xs hover:text-king transition uppercase tracking-widest">
                        <i class="fas fa-arrow-left mr-1"></i> Back to Archives
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include './../views/layout/footer.php'; ?>