<nav class="bg-king border-b border-gold-500/30 sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="index.php" class="text-2xl font-royal text-white tracking-tighter">
            QRAYA<span class="text-gold">THON</span>
        </a>
        
        <div class="flex items-center gap-8">
            <a href="index.php?page=books" class="text-gray-300 hover:text-gold font-semibold text-sm">ARCHIVES</a>
            
            <?php if (isset($_SESSION['user'])): ?>
                <a href="index.php?page=myborrows" class="text-gray-300 hover:text-gold font-semibold text-sm">MY SCROLLS</a>
                
                <div class="h-8 w-px bg-gray-700"></div>
                
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-white text-xs font-bold"><?= $_SESSION['user']->firstName ?></p>
                        <p class="text-gold text-[10px] uppercase"><?= $_SESSION['role'] ?></p>
                    </div>
                    <a href="index.php?page=profile" class="text-gray-300 hover:text-gold transition">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <a href="index.php?page=logout" class="text-red-400 hover:text-red-600 transition" title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>

            <?php else: ?>
                <div class="h-8 w-px bg-gray-700"></div>
                <div class="flex gap-4">
                    <a href="index.php?page=login" class="text-gray-300 hover:text-gold font-semibold text-sm uppercase">Login</a>
                    <a href="index.php?page=register" class="gold-button px-4 py-1 rounded-full text-white text-xs font-bold uppercase tracking-widest">
                        Join
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>