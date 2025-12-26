<?php include './../views/layout/header.php'; ?>
<?php include './../views/layout/navbar.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-king p-6">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-2xl p-10">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-royal text-king mb-2">Join the Order</h1>
            <p class="text-gray-400 text-xs uppercase tracking-widest">Create your royal account</p>
        </div>
        
        <form action="index.php?url=register" method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">First Name</label>
                <input type="text" name="firstName" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gold-500 outline-none transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Last Name</label>
                <input type="text" name="lastName" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gold-500 outline-none transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Royal Email</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gold-500 outline-none transition">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Secret Key (Password)</label>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-gold-500 outline-none transition">
            </div>

            <button type="submit" class="w-full py-4 rounded-xl text-white font-bold tracking-widest uppercase transition shadow-lg" style="background: linear-gradient(45deg, #c5a059, #e2c275);">
                Claim Membership
            </button>
            
            <p class="text-center text-gray-500 text-xs mt-4">
                Already a member? <a href="index.php?url=login" class="text-gold font-bold">Log In</a>
            </p>
        </form>
    </div>
</div>

<?php include './../views/layout/footer.php'; ?>