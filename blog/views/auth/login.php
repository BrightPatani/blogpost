<body class="bg-gray-50 min-h-screen">
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-light text-gray-900 mb-2">Login</h2>
            <div class="w-16 h-0.5 bg-primary mx-auto"></div>
            <p class="text-gray-600 mt-4">Sign in to your account</p>
        </div>

        <!-- Login Form -->
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gray-50 px-8 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Welcome Back</h3>
                    <p class="text-sm text-gray-600 mt-1">Please enter your credentials to continue</p>
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

                    <!-- Login Form -->
                    <form action="index.php?controller=user&action=login" method="POST" class="space-y-6">
                        <!-- Username Field -->
                        <div class="space-y-2">
                            <label for="username" class="block text-sm font-medium text-gray-700">
                                Username
                            </label>
                            <input type="text" 
                                   id="username" 
                                   name="username" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200 placeholder-gray-400" 
                                   placeholder="Enter your username"
                                   required>
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
                                   placeholder="Enter your password"
                                   required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-primary text-white py-3 rounded-lg hover:bg-secondary focus:ring-4 focus:ring-blue-200 transition-colors duration-200 font-medium">
                            Sign In
                        </button>
                    </form>

                    <!-- Additional Links -->
                    <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account? 
                            <a href="index.php?controller=user&action=register" 
                               class="text-primary hover:text-secondary transition-colors duration-200 font-medium">
                                Create one here
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

            <!-- Login Help -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
                <h4 class="text-sm font-medium text-blue-900 mb-2">Need Help?</h4>
                <div class="text-sm text-blue-800 space-y-1">
                    <p>• Make sure your username and password are correct</p>
                    <p>• Usernames are case-sensitive</p>
                    <p>• If you're new here, create an account first</p>
                    <p>• Contact support if you continue having issues</p>
                </div>
            </div>
        </div>
    </main>

</body>
</html>