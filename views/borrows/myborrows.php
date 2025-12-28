<?php include './../views/layout/header.php'; ?>
<?php include './../views/layout/navbar.php'; ?>

<div class="min-h-screen bg-king py-12 px-6">
    <div class="max-w-6xl mx-auto">
        <div class="mb-12">
            <h1 class="text-4xl font-royal text-gold mb-2 uppercase tracking-widest">My Royal Collection</h1>
            <div class="h-1 w-24 bg-gold-500"></div>
            <p class="text-gray-400 mt-4 italic">"A mind needs books as a sword needs a whetstone."</p>
        </div>

        <?php if (empty($borrows)): ?>
            <div class="bg-white/5 border border-dashed border-gold/30 rounded-2xl p-20 text-center">
                <i class="fas fa-scroll text-6xl text-gold/20 mb-6"></i>
                <h3 class="text-xl text-white font-bold mb-2">No active scrolls found</h3>
                <p class="text-gray-400 mb-8">Your archives are currently empty. Visit the library to borrow your next volume.</p>
                <a href="index.php?url=books" class="px-8 py-3 bg-gold text-white font-bold rounded-full hover:scale-105 transition-transform">
                    EXPLORE LIBRARY
                </a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 gap-6">
                <?php foreach ($borrows as $borrow): ?>
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row items-center border-l-8 border-gold-500">
                        <div class="w-full md:w-48 h-48 bg-gray-200">
                            <img src="https://images.unsplash.com/photo-1543005128-297b15c72838?q=80&w=200" 
                                 class="w-full h-full object-cover" alt="Book Cover">
                        </div>

                        <div class="p-8 flex-grow">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-2xl font-bold text-king"><?= htmlspecialchars($borrow['title']) ?></h3>
                                    <p class="text-gray-500 font-medium">By <?= htmlspecialchars($borrow['author'] ?? 'Unknown Author') ?></p>
                                </div>
                                <span class="px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest 
                                    <?= $borrow['status'] === 'returned' ? 'bg-green-100 text-green-700' : 'bg-gold/10 text-gold' ?>">
                                    <?= $borrow['status'] ?>
                                </span>
                            </div>

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm mt-6">
                                <div>
                                    <p class="text-gray-400 uppercase text-[10px] font-bold">Borrowed On</p>
                                    <p class="text-king font-bold"><?= date('M d, Y', strtotime($borrow['borrow_date'])) ?></p>
                                </div>
                                <div>
                                    <p class="text-gray-400 uppercase text-[10px] font-bold">Due Date</p>
                                    <p class="text-red-500 font-bold"><?= date('M d, Y', strtotime($borrow['return_date'])) ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="p-8 border-t md:border-t-0 md:border-l border-gray-100 flex flex-col gap-2 w-full md:w-48">
                            <?php if ($borrow['status'] !== 'returned'): ?>
                                <form action="index.php?url=borrow/return" method="POST">
                                    <input type="hidden" name="borrow_id" value="<?= $borrow['id'] ?>">
                                    <button type="submit" class="w-full py-2 bg-king text-white rounded-lg font-bold text-xs hover:bg-gold-500 transition shadow-md">
                                        RETURN BOOK
                                    </button>
                                </form>
                            <?php endif; ?>
                            <a href="index.php?url=books/details&id=<?= $borrow['book_id'] ?>" 
                               class="w-full py-2 border border-gray-200 text-gray-600 rounded-lg font-bold text-xs text-center hover:bg-gray-50 transition">
                                VIEW DETAILS
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

   <?php include './../views/layout/footer.php'; ?>