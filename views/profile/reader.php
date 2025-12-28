<?php include './../views/layout/header.php'; ?>
<?php include './../views/layout/navbar.php'; ?>

<div class="container mx-auto px-6 py-16">
    <div class="flex flex-col md:flex-row gap-12">
        <div class="w-full md:w-1/3">
            <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 text-center">
                <div class="w-32 h-32 bg-king rounded-full mx-auto mb-6 flex items-center justify-center border-4 border-gold-500 shadow-inner">
                    <span class="text-4xl text-gold font-royal">JD</span>
                </div>
                <h2 class="text-2xl font-royal text-king">Sir John Doe</h2>
                <p class="text-gold font-bold text-xs uppercase tracking-tighter mb-6">Honored Reader</p>
                <div class="h-px bg-gray-100 w-full mb-6"></div>
                <div class="flex justify-around text-sm">
                    <div><p class="font-bold text-king">12</p><p class="text-gray-400">Read</p></div>
                    <div><p class="font-bold text-king">3</p><p class="text-gray-400">Current</p></div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-2/3">
            <h3 class="text-2xl font-royal text-king mb-8 uppercase tracking-widest">My Borrowed Scrolls</h3>
            
            <div class="space-y-4">
                <div class="bg-white p-6 rounded-2xl flex items-center justify-between shadow-sm hover:shadow-md transition">
                    <div class="flex items-center gap-6">
                        <div class="bg-gray-100 w-12 h-16 rounded border border-gray-200"></div>
                        <div>
                            <h4 class="font-bold text-king">The Great Gatsby</h4>
                            <p class="text-xs text-gray-400">Borrowed: Dec 20, 2025</p>
                        </div>
                    </div>
                    <a href="#" class="text-xs font-bold text-red-500 border border-red-500 px-4 py-2 rounded-full hover:bg-red-500 hover:text-white transition uppercase">
                        Return Book
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './../views/layout/footer.php'; ?>