<body class="bg-gray-50 min-h-screen">
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-light text-gray-900 mb-2">Register</h2>
            <div class="w-16 h-0.5 bg-primary mx-auto"></div>
            <p class="text-gray-600 mt-4">Create your account to get started</p>
        </div>

        <!-- Register Form -->
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gray-50 px-8 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Join Our Community</h3>
                    <p class="text-sm text-gray-600 mt-1">Fill in your details to create an account</p>
                </div>

                <!-- Form Content -->
                <div class="p-8">
                    <!-- Error Message -->
                    <?php if (isset($error)): ?>
                        <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-red-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-red-700 text-sm"><?php echo $error; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Registration Form -->
                    <form action="index.php?controller=user&action=register" method="POST" class="space-y-6">
                        <!-- Username Field -->
                        <div class="space-y-2">
                            <label for="username" class="block text-sm font-medium text-gray-700">
                                Username
                            </label>
                            <input type="text" 
                                   id="username" 
                                   name="username" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200 placeholder-gray-400" 
                                   placeholder="Choose a unique username"
                                   required>
                            <p class="text-xs text-gray-500">This will be your public display name</p>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password
                            </label>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200 placeholder-gray-400" 
                                   placeholder="Create a secure password"
                                   required>
                            <p class="text-xs text-gray-500">Choose a strong password to protect your account</p>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-primary text-white py-3 rounded-lg hover:bg-secondary focus:ring-4 focus:ring-blue-200 transition-colors duration-200 font-medium">
                            Create Account
                        </button>
                    </form>

                    <!-- Additional Links -->
                    <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                        <p class="text-sm text-gray-600">
                            Already have an account? 
                            <a href="index.php?controller=user&action=login" 
                               class="text-primary hover:text-secondary transition-colors duration-200 font-medium">
                                Sign in here
                            </a>
                        </p>
                        <div class="mt-4">
                            <a href="index.php" 
                               class="text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">
                                ← Back to home
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registration Guidelines -->
            <div class="mt-8 bg-green-50 border border-green-200 rounded-lg p-6">
                <h4 class="text-sm font-medium text-green-900 mb-2">Account Guidelines</h4>
                <div class="text-sm text-green-800 space-y-1">
                    <p>• Choose a username that represents you well</p>
                    <p>• Use a strong password with letters and numbers</p>
                    <p>• Your username will be visible on posts you create</p>
                    <p>• Keep your login credentials secure</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>