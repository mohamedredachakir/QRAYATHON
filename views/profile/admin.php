<?php include '../views/layouts/header.php'; ?>
<?php include '../views/layouts/navbar.php'; ?>

<div class="container mx-auto px-6 py-10">
    <div class="mb-10">
        <h1 class="text-4xl font-royal text-king">Grand Overseer Dashboard</h1>
        <p class="text-gray-500 italic">Managing the Realm's Knowledge</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <div class="bg-white p-8 rounded-2xl shadow-sm border-l-4 border-gold-500 flex items-center gap-6">
            <div class="bg-gold-500/10 p-4 rounded-full text-gold">
                <i class="fas fa-book-open text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-400 text-xs uppercase font-bold tracking-widest">Total Volumes</p>
                <h3 class="text-3xl font-bold text-king"><?= $totalBooks ?></h3>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border-l-4 border-king flex items-center gap-6">
            <div class="bg-king/10 p-4 rounded-full text-king">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-400 text-xs uppercase font-bold tracking-widest">Active Readers</p>
                <h3 class="text-3xl font-bold text-king"><?= $totalUsers ?></h3>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border-l-4 border-red-500 flex items-center gap-6">
            <div class="bg-red-500/10 p-4 rounded-full text-red-500">
                <i class="fas fa-hand-holding text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-400 text-xs uppercase font-bold tracking-widest">Out on Loan</p>
                <h3 class="text-3xl font-bold text-king"><?= $totalBorrowed ?></h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <div class="bg-king px-8 py-4 flex justify-between items-center">
            <h3 class="text-white font-bold tracking-widest">RECENT TRANSACTIONS</h3>
            <button class="text-gold text-xs font-bold hover: