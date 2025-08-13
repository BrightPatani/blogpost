<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Blog</title>
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
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="bg-gray-50 min-h-screen max-w-screen-lg mx-auto">
    
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="container mx-auto px-4 py-6">
            <!-- Blog Title -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-light text-gray-900 tracking-wide">My Blog</h1>
                <div class="w-16 h-0.5 bg-primary mx-auto mt-3"></div>
            </div>

            <!-- Navigation  bar-->
            <nav class="text-center">
                <div class="inline-flex items-center gap-8 text-sm font-medium">
                    <a href="index.php" 
                       class="text-gray-700 hover:text-primary transition-colors duration-200 py-2">
                        Home
                    </a>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="index.php?controller=post&action=create" 
                           class="text-gray-700 hover:text-primary transition-colors duration-200 py-2">
                            Create Post
                        </a>
                        <a href="index.php?controller=user&action=profile" 
                           class="text-gray-700 hover:text-primary transition-colors duration-200 py-2">
                            Profile
                        </a>
                        <a href="logout.php" 
                           class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="index.php?controller=user&action=login" 
                           class="text-gray-700 hover:text-primary transition-colors duration-200 py-2">
                            Login
                        </a>
                        <a href="index.php?controller=user&action=register" 
                           class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-secondary transition-colors duration-200">
                            Register
                        </a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main class="container mx-auto mt-8 px-4">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
            <h2 class="text-2xl font-light text-gray-900 mb-4">Welcome</h2>
            <p class="text-gray-600 max-w-2xl mx-auto leading-relaxed">
                A simple place to share thoughts and connect with others through meaningful content.
            </p>
            
            <?php if (!isset($_SESSION['user_id'])): ?>
                <div class="mt-6 space-x-4">
                    <a href="index.php?controller=user&action=register" 
                       class="inline-block bg-primary text-white px-6 py-2 rounded-lg hover:bg-secondary transition-colors duration-200">
                        Get Started
                    </a>
                    <a href="index.php?controller=user&action=login" 
                       class="inline-block text-gray-600 hover:text-primary transition-colors duration-200">
                        Sign In →
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <style>

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
    
        a {
            text-decoration: none;
        }
        
        * {
            transition-property: color, background-color, border-color;
            transition-duration: 200ms;
            transition-timing-function: ease-in-out;
        }
    </style>
</body>
</html>

