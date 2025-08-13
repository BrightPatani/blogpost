<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - Mini Blog</title>
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
<body class="bg-gray-50 min-h-screen">
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-light text-gray-900 mb-2">Edit Post</h2>
            <div class="w-16 h-0.5 bg-primary"></div>
        </div>

        <!-- Edit Post Form -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gray-50 px-8 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Update Your Post</h3>
                <p class="text-sm text-gray-600 mt-1">Make changes to your post content and settings</p>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                <form action="index.php?controller=post&action=update&id=<?php echo $post['id']; ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                    
                    <!-- Title Field -->
                    <div class="space-y-2">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Post Title
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200 placeholder-gray-400" 
                               value="<?php echo htmlspecialchars($post['title']); ?>"
                               required>
                        <p class="text-xs text-gray-500">Update your post title if needed</p>
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
                                  required><?php echo htmlspecialchars($post['content']); ?></textarea>
                        <p class="text-xs text-gray-500">Edit your post content</p>
                    </div>

                    <!-- Current Image Display & Upload Field -->
                    <div class="space-y-2">
                        <label for="post_image" class="block text-sm font-medium text-gray-700">
                            Post Image
                            <span class="text-gray-400 font-normal">(Optional)</span>
                        </label>
                        
                        <?php if ($post['post_image']): ?>
                            <div class="mb-4">
                                <p class="text-xs text-gray-600 mb-2">Current image:</p>
                                <div class="relative inline-block">
                                    <img src="../uploads/posts/<?php echo htmlspecialchars($post['post_image']); ?>" 
                                         alt="Current Image" 
                                         class="max-w-sm max-h-48 rounded-lg border border-gray-200 shadow-sm object-cover">
                                    <div class="absolute top-2 right-2 bg-white bg-opacity-90 text-xs text-gray-600 px-2 py-1 rounded-full">
                                        Current
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="relative">
                            <input type="file" 
                                   id="post_image" 
                                   name="post_image" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200" 
                                   accept="image/*">
                        </div>
                        <p class="text-xs text-gray-500">
                            <?php if ($post['post_image']): ?>
                                Upload a new image to replace the current one, or leave empty to keep existing image
                            <?php else: ?>
                                Upload an image to add to your post (JPG, PNG, GIF up to 10MB)
                            <?php endif; ?>
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <button type="submit" 
                                class="flex-1 sm:flex-none bg-primary text-white px-8 py-3 rounded-lg hover:bg-secondary focus:ring-4 focus:ring-blue-200 transition-colors duration-200 font-medium">
                            Update Post
                        </button>
                        <a href="index.php" 
                           class="flex-1 sm:flex-none text-center bg-white text-gray-600 px-8 py-3 rounded-lg border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 transition-colors duration-200 font-medium">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Guidelines -->
        <div class="mt-8 bg-yellow-50 border border-yellow-200 rounded-lg p-6">
            <h4 class="text-sm font-medium text-yellow-900 mb-2">Editing Guidelines</h4>
            <div class="text-sm text-yellow-800 space-y-1">
                <p>• Review your changes carefully before updating</p>
                <p>• <?php if ($post['post_image']): ?>Uploading a new image will replace the current one<?php else: ?>You can add an image to enhance your post<?php endif; ?></p>
                <p>• Use the "View Post" button to see how your changes look</p>
                <p>• Changes are saved immediately when you click "Update Post"</p>
            </div>
        </div>
    </main>

    <style>
        /* Clean form styling */
        input:focus, textarea:focus {
            outline: none;
        }
        
        /* Custom file input styling */
        input[type="file"]::-webkit-file-upload-button {
            transition: background-color 200ms ease-in-out;
        }
        
        /* Smooth transitions */
        * {
            transition-property: color, background-color, border-color, box-shadow;
            transition-duration: 200ms;
            transition-timing-function: ease-in-out;
        }
    </style>
</body>
</html>