<?php include './../views/layout/header.php'; ?>
<?php include './../views/layout/navbar.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-king p-6">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-2xl p-10 border-b-8 border-gold-500">
        <div class="text-center mb-10">
            <i class="fas fa-crown text-gold text-4xl mb-4"></i>
            <h1 class="text-4xl font-royal text-king mb-2">Welcome Back</h1>
            <p class="text-gray-400 uppercase tracking-widest text-xs">Access the Royal Archives</p>
        </div>
        
        <?php if(isset($_GET['success'])): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded-lg text-xs font-bold mb-6 text-center">
                Account created successfully! Please log in.
            </div>
        <?php endif; ?>

        <form action="index.php?url=login" method="POST" class="space-y-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Royal Email</label>
                <input type="email" name="email" required 
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gold-500 outline-none transition bg-gray-50">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Secret Key</label>
                <input type="password" name="password" required 
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gold-500 outline-none transition bg-gray-50">
            </div>

            <button type="submit" class="w-full py-4 rounded-xl text-white font-bold tracking-widest uppercase transition shadow-lg hover:scale-[1.02]" 
                    style="background: linear-gradient(45deg, #1a1a2e, #2a2a4e);">
                Authenticate
            </button>
            
            <p class="text-center text-gray-500 text-xs mt-6">
                New to the Kingdom? <a href="index.php?url=register" class="text-gold font-bold hover:underline