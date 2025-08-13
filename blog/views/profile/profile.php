<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Profile Section</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#1E40AF'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <main class="container mx-auto px-4 py-8">
        <!-- Profile Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2 flex items-center">
                <svg class="w-8 h-8 mr-3 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Profile Settings
            </h2>
            <p class="text-gray-600">Manage your personal information and profile picture</p>
        </div>

        <!-- Enhanced Profile Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Profile Header Section -->
            <div class="bg-gradient-to-r from-primary to-secondary p-8 text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div class="relative group">
                            <img src="<?php echo $user['profile_image'] ? '../uploads/profiles/' . htmlspecialchars($user['profile_image']) : 'https://via.placeholder.com/120/3B82F6/FFFFFF?text=' . strtoupper(substr($user['username'], 0, 2)); ?>" 
                                 alt="Profile" 
                                 class="w-24 h-24 md:w-32 md:h-32 rounded-full border-4 border-white/20 object-cover shadow-2xl group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 rounded-full bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl md:text-3xl font-bold mb-1"><?php echo htmlspecialchars($user['username']); ?></h3>
                            <p class="text-white/80 text-sm md:text-base">Profile Member</p>
                            <div class="flex items-center mt-2 text-white/70">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm">Last updated today</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Status Badge -->
                    <div class="hidden md:block">
                        <div class="bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 text-sm font-medium">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></div>
                                Active
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form action="index.php?controller=user&action=updateProfile" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <!-- Profile Image Upload Section -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Profile Image
                            </h4>
                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">Optional</span>
                        </div>
                        
                        <!-- Custom File Upload -->
                        <div class="relative">
                            <input type="file" 
                                   id="profile_image" 
                                   name="profile_image" 
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" 
                                   accept="image/*"
                                   onchange="updateFileName(this)">
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-primary hover:bg-blue-50 transition-all duration-300 group">
                                <div class="space-y-3">
                                    <div class="flex justify-center">
                                        <svg class="w-12 h-12 text-gray-400 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-gray-600 font-medium">Click to upload or drag and drop</p>
                                        <p class="text-sm text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                        <p id="file-name" class="text-sm text-primary font-medium mt-2 hidden"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Upload Guidelines -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="text-sm text-blue-700">
                                    <p class="font-medium mb-1">Image Guidelines:</p>
                                    <ul class="text-blue-600 space-y-1">
                                        <li>• Square images work best (1:1 aspect ratio)</li>
                                        <li>• Minimum size: 200x200 pixels</li>
                                        <li>• Supported formats: JPEG, PNG, GIF</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <button type="submit" 
                                class="flex-1 sm:flex-none bg-gradient-to-r from-primary to-secondary text-white px-8 py-3 rounded-xl font-semibold hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg flex items-center justify-center group">
                            <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Update Profile
                        </button>
                        
                        <button type="reset" 
                                class="flex-1 sm:flex-none bg-gray-100 text-gray-700 px-8 py-3 rounded-xl font-semibold hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-300 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Reset
                        </button>
                    </div>

                    <!-- Security Note -->
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mt-6">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Your profile information is secure and will only be visible to you and administrators.
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function updateFileName(input) {
            const fileNameElement = document.getElementById('file-name');
            const fileName = input.files[0]?.name;
            
            if (fileName) {
                fileNameElement.textContent = `Selected: ${fileName}`;
                fileNameElement.classList.remove('hidden');
            } else {
                fileNameElement.classList.add('hidden');
            }
        }

        // Add smooth hover effects
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitButton = form.querySelector('button[type="submit"]');
            
            form.addEventListener('submit', function(e) {
                submitButton.innerHTML = `
                    <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Updating...
                `;
                submitButton.disabled = true;
            });
        });
    </script>
</body>
</html>