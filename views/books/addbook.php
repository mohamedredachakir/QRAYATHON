<?php include '../views/layouts/header.php'; ?>
<?php include '../views/layouts/navbar.php'; ?>

<div class="min-h-screen py-20 px-4">
    <div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-2xl border-t-8 border-gold-500 overflow-hidden">
        <div class="bg-king p-8 text-center">
            <i class="fas fa-feather-pointed text-gold text-4xl mb-4"></i>
            <h1 class="text-3xl font-royal text-white uppercase tracking-widest">Register New Volume</h1>
            <p class="text-gold/60 text-sm">Expand the Royal Archives</p>
        </div>

        <form action="#" class="p-10 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-gray-500">Book Title</label>
                    <input type="text" placeholder="e.g. The Art of War" class="w-full bg-gray-50 border-b-2 border-gray-200 focus:border-gold-500 py-3 outline-none transition px-2">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-gray-500">Author Name</label>
                    <input type="text" placeholder="e.g. Sun Tzu" class="w-full bg-gray-50 border-b-2 border-gray-200 focus:border-gold-500 py-3 outline-none transition px-2">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-wider text-gray-500">Book Description</label>
                <textarea rows="4" class="w-full bg-gray-50 border-2 border-gray-100 rounded-xl focus:border-gold-500 p-4 outline-none transition"></textarea>
            </div>

            <div class="flex items-center justify-end pt-6">
                <button type="submit" class="gold-button px-10 py-4 rounded-full text-white font-bold shadow-lg uppercase tracking-widest text-sm">
                    Seal & Store Volume
                </button>
            </div>
        </form>
    </div>
</div>

<?php include '../views/layouts/footer.php'; ?>