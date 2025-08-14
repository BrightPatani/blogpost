<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
    <main class="max-w-4xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h2 class="text-4xl font-bold text-gray-800 mb-2 flex items-center">
                <i class="fas fa-newspaper text-primary mr-3"></i>
                Recent Posts
            </h2>
            <div class="h-1 w-20 bg-gradient-to-r from-primary to-secondary rounded-full"></div>
        </div>
        
        <?php if (empty($posts)): ?>
            <div class="text-center py-16">
                <div class="bg-white rounded-2xl shadow-lg p-12 max-w-md mx-auto">
                    <i class="fas fa-file-alt text-6xl text-gray-300 mb-6"></i>
                    <p class="text-xl text-gray-600 font-medium mb-4">No posts yet</p>
                    <p class="text-gray-500">Be the first to share something amazing!</p>
                </div>
            </div>
        <?php else: ?>
            <div class="space-y-8">
                <?php foreach ($posts as $post): ?>
                    <article class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-primary/20 transform hover:-translate-y-1">
                        <!-- Author Header -->
                        <div class="p-6 pb-4 border-b border-gray-50">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <img src="<?php echo $post['profile_image'] ? '../uploads/profiles/' . htmlspecialchars($post['profile_image']) : 'https://via.placeholder.com/50'; ?>" 
                                             alt="Profile" 
                                             class="w-12 h-12 rounded-full object-cover ring-2 ring-primary/20 group-hover:ring-primary/40 transition-all duration-300">
                                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800 hover:text-primary transition-colors">
                                            <?php echo htmlspecialchars($post['username']); ?>
                                        </p>
                                        <div class="flex items-center text-sm text-gray-500 mt-1">
                                            <i class="far fa-clock mr-1"></i>
                                            <?php echo date('M j, Y \a\t g:i A', strtotime($post['created_at'])); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
                                    <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <a href="index.php?controller=post&action=edit&id=<?php echo $post['id']; ?>" 
                                           class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors text-sm font-medium">
                                            <i class="fas fa-edit mr-1.5"></i>
                                            Edit
                                        </a>
                                        <a href="index.php?controller=post&action=delete&id=<?php echo $post['id']; ?>" 
                                           class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors text-sm font-medium"
                                           onclick="return confirm('Are you sure you want to delete this post?');">
                                            <i class="fas fa-trash-alt mr-1.5"></i>
                                            Delete
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Post Content -->
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 line-clamp-2 group-hover:text-primary transition-colors">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </h3>
                            
                            <!-- Post Image -->
                            <?php if ($post['post_image']): ?>
                                <div class="mb-6 relative overflow-hidden rounded-xl">
                                    <img src="../uploads/posts/<?php echo htmlspecialchars($post['post_image']); ?>" 
                                         alt="Post Image" 
                                         class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-300"></div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Content -->
                            <div class="prose prose-lg max-w-none">
                                <p class="text-gray-700 leading-relaxed line-clamp-4">
                                    <?php echo nl2br(htmlspecialchars($post['content'])); ?>
                                </p>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="px-6 pb-6">
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex items-center space-x-6 text-sm text-gray-500">
                                    <button class="flex items-center space-x-2 hover:text-primary transition-colors">
                                        <i class="far fa-heart"></i>
                                        <span>Like</span>
                                    </button>
                                    <button class="flex items-center space-x-2 hover:text-primary transition-colors">
                                        <i class="far fa-comment"></i>
                                        <span>Comment</span>
                                    </button>
                                    <button class="flex items-center space-x-2 hover:text-primary transition-colors">
                                        <i class="far fa-share"></i>
                                        <span>Share</span>
                                    </button>
                                </div>
                                
                                <button class="text-primary hover:text-secondary transition-colors font-medium text-sm">
                                    Read More
                                    <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            
            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="bg-gradient-to-r from-primary to-secondary text-white px-8 py-3 rounded-full font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center mx-auto space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Load More Posts</span>
                </button>
            </div>
        <?php endif; ?>
    </main>

 

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate cards on scroll
            const cards = document.querySelectorAll('article');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>