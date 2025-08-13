
<body class="bg-gray-50 min-h-screen">
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-light text-gray-900 mb-2">Create a New Post</h2>
            <div class="w-16 h-0.5 bg-primary"></div>
        </div>

        <!-- Create Post Form -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gray-50 px-8 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Share Your Story</h3>
                <p class="text-sm text-gray-600 mt-1">Fill in the details below to create your post</p>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                <form action="index.php?controller=post&action=store" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <!-- Title Field -->
                    <div class="space-y-2">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Post Title
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200 placeholder-gray-400" 
                               placeholder="Enter your post title..."
                               required>
                        <p class="text-xs text-gray-500">Choose a clear, descriptive title for your post</p>
                    </div>

                    <!-- Content Field -->
                    <div class="space-y-2">
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            Content
                        </label>
                        <textarea id="content" 
                                  name="content" 
                                  rows="8" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200 placeholder-gray-400 resize-y" 
                                  placeholder="Write your post content here..."
                                  required></textarea>
                        <p class="text-xs text-gray-500">Share your thoughts, experiences, or insights</p>
                    </div>

                    <!-- Image Upload Field -->
                    <div class="space-y-2">
                        <label for="post_image" class="block text-sm font-medium text-gray-700">
                            Post Image
                            <span class="text-gray-400 font-normal">(Optional)</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   id="post_image" 
                                   name="post_image" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200" 
                                   accept="image/*">
                        </div>
                        <p class="text-xs text-gray-500">Upload an image to make your post more engaging (JPG, PNG, GIF up to 10MB)</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <button type="submit" 
                                class="flex-1 sm:flex-none bg-primary text-white px-8 py-3 rounded-lg hover:bg-secondary focus:ring-4 focus:ring-blue-200 transition-colors duration-200 font-medium">
                            Publish Post
                        </button>
                        <button type="reset" 
                                class="flex-1 sm:flex-none bg-gray-100 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 transition-colors duration-200 font-medium">
                            Clear Form
                        </button>
                        <a href="index.php" 
                           class="flex-1 sm:flex-none text-center bg-white text-gray-600 px-8 py-3 rounded-lg border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 transition-colors duration-200 font-medium">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
            <h4 class="text-sm font-medium text-blue-900 mb-2">Writing Tips</h4>
            <div class="text-sm text-blue-800 space-y-1">
                <p>• Write a compelling title that summarizes your main point</p>
                <p>• Structure your content with clear paragraphs</p>
                <p>• Add an image to make your post more visually appealing</p>
                <p>• Proofread before publishing</p>
            </div>
        </div>
    </main>
</body>
</html>