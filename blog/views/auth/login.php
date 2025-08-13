<h2 class="text-2xl font-semibold mb-4">Login</h2>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <?php if (isset($error)): ?>
                <p class="text-red-500 mb-4"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="index.php?controller=user&action=login" method="POST">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-semibold">Username</label>
                    <input type="text" id="username" name="username" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="w-full p-2 border rounded" required>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</button>
            </form>
        </div>
    </main>
</body>
</html>