<?php include './../views/layout/header.php'; ?>
<?php include './../views/layout/navbar.php'; ?>

<section class="relative h-[85vh] flex items-center bg-king overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gold-500 opacity-5 skew-x-12 translate-x-32"></div>
    
    <div class="container mx-auto px-8 relative z-10">
        <div class="max-w-4xl">
            <h1 class="text-7xl md:text-8xl font-royal text-white mb-8 leading-tight animate__animated animate__fadeInDown">
                The Realm of <br> <span class="text-gold">Eternal Wisdom</span>
            </h1>
            <p class="text-gray-400 text-xl mb-12 max-w-2xl leading-relaxed animate__animated animate__fadeInUp">
                Welcome to QRAYATHON, the imperial archives where knowledge is preserved for the ages. 
                Explore our collection of rare scrolls and modern volumes.
            </p>
            <div class="flex gap-6 animate__animated animate__fadeInUp animate__delay-1s">
                <a href="index.php?page=books" class="gold-button px-12 py-5 rounded-full text-white font-bold uppercase tracking-widest shadow-2xl">
                    Enter Library
                </a>
                <a href="index.php?page=register" class="px-12 py-5 rounded-full border border-gold-500 text-gold font-bold uppercase tracking-widest hover:bg-gold-500/10 transition">
                    Join the Order
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white border-t border-gray-100">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-20">
            <?php foreach($features as $f): ?>
            <div class="text-center group p-8 hover:bg-gray-50 rounded-3xl transition duration-500">
                <div class="w-20 h-20 bg-king/5 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-gold-500/10 transition">
                    <i class="fas <?= $f['icon'] ?> text-4xl text-gold"></i>
                </div>
                <h3 class="text-2xl font-royal text-king mb-4 uppercase tracking-wider"><?= $f['title'] ?></h3>
                <p class="text-gray-500 leading-relaxed"><?= $f['desc'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include './../views/layout/footer.php'; ?>