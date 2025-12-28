<?php include './../views/layout/header.php'; ?>
<?php include './../views/layout/navbar.php'; ?>
<div class="container mx-auto px-6 py-12">
    <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
        <div>
            <h2 class="text-4xl font-royal text-king uppercase tracking-widest">Library Collection</h2>
            <div class="h-1 w-20 mt-2" style="background-color: #c5a059;"></div>
        </div>
        
        <?php if($_SESSION['user']['role'] === 'admin'): ?>
            <a href="index.php?url=addbook" class="px-8 py-3 bg-king text-gold font-bold rounded-full border border-gold-500 hover:bg-gold-500 hover:text-white transition">
                + ADD NEW VOLUME
            </a>
        <?php endif; ?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-10">
        <?php foreach($books as $book): ?>
        <div class="king-card group bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="relative overflow-hidden h-64">
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=400" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute top-4 right-4 bg-white/90 px-3 py-1 rounded-full text-xs font-bold text-king shadow-sm">
                    <?= strtoupper($book->status) ?>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-king mb-1"><?= $book->title ?></h3>
                <p class="text-gray-400 text-sm mb-4 font-medium">By <?= $book->author ?></p>
                
                <a href="index.php?url=borrow/create&book_id=<?= $book->id ?>" class="block text-center py-2 border border-gold-500 text-gold font-bold rounded-lg hover:bg-gold-500 hover:text-white transition uppercase tracking-wider text-xs">
                    Borrow Now
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include './../views/layout/footer.php'; ?>