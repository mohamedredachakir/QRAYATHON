<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/navbar.php'; ?>

<div class="container mx-auto px-6 py-16">
    <div class="flex flex-col md:flex-row gap-12">
        <div class="w-full md:w-1/3">
            <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 text-center">
                <div class="w-32 h-32 bg-king rounded-full mx-auto mb-6 flex items-center justify-center border-4 border-gold-500 shadow-inner">
                    <span class="text-4xl text-gold font-royal">
                        <?= strtoupper(substr($_SESSION['user']['name'] ?? 'U', 0, 2)) ?>
                    </span>
                </div>
                <h2 class="text-2xl font-royal text-king"><?= $_SESSION['user']['name'] ?? 'Honored Reader' ?></h2>
                <p class="text-gold font-bold text-xs uppercase tracking-tighter mb-6">Honored Reader</p>
                <div class="h-px bg-gray-100 w-full mb-6"></div>
                <div class="flex justify-around text-sm">
                    <div>
                        <p class="font-bold text-king"><?= count($borrows) ?></p>
                        <p class="text-gray-400">Total Scrolls</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-2/3">
            <h3 class="text-2xl font-royal text-king mb-8 uppercase tracking-widest">My Borrowed Scrolls</h3>
            
            <div class="space-y-4">
                <?php if (!empty($borrows)): ?>
                    <?php foreach ($borrows as $borrow): ?>
    <div class="bg-white p-6 rounded-2xl flex items-center justify-between shadow-sm border-l-4 <?= $borrow['returnDate'] ? 'border-gray-300' : 'border-gold-500' ?>">
        <div class="flex items-center gap-6">
            <div class="bg-gray-100 p-3 rounded">
                <i class="fas <?= $borrow['returnDate'] ? 'fa-check-circle text-gray-400' : 'fa-scroll text-gold' ?> text-xl"></i>
            </div>
            <div>
                <h4 class="font-bold <?= $borrow['returnDate'] ? 'text-gray-400' : 'text-king' ?>">
                    <?= htmlspecialchars($borrow['title']) ?>
                </h4>
                <p class="text-xs text-gray-400">Borrowed: <?= date('M d, Y', strtotime($borrow['borrowDate'])) ?></p>
                
                <?php if ($borrow['returnDate']): ?>
                    <p class="text-xs text-green-600 font-bold mt-1">
                        Returned on: <?= date('M d, Y', strtotime($borrow['returnDate'])) ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!$borrow['returnDate']): ?>
            <a href="index.php?url=borrow/return&borrow_id=<?= $borrow['id'] ?>&book_id=<?= $borrow['bookId'] ?>" 
               onclick="return confirm('Return this scroll?')"
               class="text-xs font-bold text-red-500 border border-red-500 px-4 py-2 rounded-full hover:bg-red-500 hover:text-white transition uppercase">
                Return
            </a>
        <?php else: ?>
            <span class="text-xs font-bold text-gray-400 bg-gray-100 px-4 py-2 rounded-full uppercase">
                Completed
            </span>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center py-20 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                        <p class="text-gray-400 italic">Your archives are empty. No scrolls borrowed yet.</p>
                        <a href="index.php?url=books" class="text-gold font-bold text-sm underline mt-4 inline-block">Visit the Library</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>