 <?php


// Include config or auth if needed (e.g., for logged-in users)
// include 'includes/config.php';
// include 'includes/auth.php';

session_start(); // 🔹 YEH LINE ADD KARNA JARURI HAI
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayWithUs - PUBG & Free Fire Tournaments</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-900 text-white font-sans">

    <!-- Navigation Bar -->
       <!-- Navigation Bar -->
    <nav class="bg-gray-800 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold text-yellow-400">PlayWithUs</div>
            <ul class="flex space-x-6 items-center">
                <li><a href="index.php" class="hover:text-yellow-400">Home</a></li>
                
                <?php if(isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                    <!-- Only show Create Tournament for admin users -->
                    <li><a href="create_tournament.php" class="hover:text-yellow-400">Create Tournament</a></li>
                <?php endif; ?>
                
                <li><a href="join_tournament.php" class="hover:text-yellow-400">Join Tournament</a></li>
                <li><a href="leaderboard.php" class="hover:text-yellow-400">Leaderboard</a></li>
                
                <?php if(isset($_SESSION['user_id'])): ?>
                    <!-- User is logged in - Show Profile -->
                    <li class="relative group">
                        <div class="flex items-center space-x-2 cursor-pointer">
                            <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-sm text-black"></i>
                            </div>
                            <span class="text-yellow-400"><?= htmlspecialchars($_SESSION['username']) ?></span>
                            
                            <!-- Show admin badge if user is admin -->
                            <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                                <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">Admin</span>
                            <?php endif; ?>
                            
                            <i class="fas fa-chevron-down text-yellow-400 text-xs"></i>
                        </div>
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-gray-700 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="users/pages/my_profile.php" class="block px-4 py-3 hover:bg-gray-600 rounded-t-lg">
                                <i class="fas fa-user mr-2"></i>My Profile
                            </a>
                            <a href="users/pages/my_tournaments.php" class="block px-4 py-3 hover:bg-gray-600">
                                <i class="fas fa-trophy mr-2"></i>My Tournaments
                            </a>
                            
                            <!-- Admin only links -->
                            <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                                <a href="create_tournament.php" class="block px-4 py-3 hover:bg-gray-600">
                                    <i class="fas fa-plus-circle mr-2"></i>Create Tournament
                                </a>
                                <a href="admin/dashboard.php" class="block px-4 py-3 hover:bg-gray-600">
                                    <i class="fas fa-tachometer-alt mr-2"></i>Admin Dashboard
                                </a>
                            <?php endif; ?>
                            
                            <a href="users/pages/my_wallet.php" class="block px-4 py-3 hover:bg-gray-600">
                                <i class="fas fa-wallet mr-2"></i>My Wallet
                            </a>
                            <a href="users/pages/settings.php" class="block px-4 py-3 hover:bg-gray-600">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                            <div class="border-t border-gray-600">
                                <a href="logout.php" class="block px-4 py-3 hover:bg-gray-600 rounded-b-lg text-red-400">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </a>
                            </div>
                        </div>
                    </li>
                <?php else: ?>
                    <!-- User is not logged in -->
                    <li><a href="login.php" class="hover:text-yellow-400">Login</a></li>
                    <li><a href="register.php" class="hover:text-yellow-400">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Success Message Display -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-600 text-white p-4 text-center">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <!-- Hero Section -->
       <!-- Hero Section -->
    <section class="relative bg-cover bg-center min-h-screen" style="background-image: url('assets/images/hero-bg.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative container mx-auto flex flex-col justify-center items-center h-full text-center px-4">
            <h1 class="text-6xl md:text-8xl font-bold text-yellow-400 mb-6 animate-pulse">Welcome to PlayWithUs</h1>
            <p class="text-2xl md:text-3xl mb-10">Join Paid Tournaments for PUBG & Free Fire. Win Big Prizes and Compete with the Best!</p>
            <div class="flex space-x-6 mb-10">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="join_tournament.php" class="bg-yellow-500 hover:bg-yellow-600 text-black px-10 py-4 rounded-lg font-semibold transition duration-300">
                        <i class="fas fa-trophy mr-2"></i>Join Tournament
                    </a>
                    
                    <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                        <a href="create_tournament.php" class="border-2 border-yellow-500 hover:bg-yellow-500 hover:text-black px-10 py-4 rounded-lg font-semibold transition duration-300">
                            <i class="fas fa-plus-circle mr-2"></i>Create Tournament
                        </a>
                    <?php else: ?>
                        <a href="users/pages/my_profile.php" class="border-2 border-yellow-500 hover:bg-yellow-500 hover:text-black px-10 py-4 rounded-lg font-semibold transition duration-300">
                            <i class="fas fa-user mr-2"></i>My Profile
                        </a>
                    <?php endif; ?>
                    
                <?php else: ?>
                    <a href="register.php" class="bg-yellow-500 hover:bg-yellow-600 text-black px-10 py-4 rounded-lg font-semibold transition duration-300">
                        Get Started
                    </a>
                    <a href="#tournaments" class="border-2 border-yellow-500 hover:bg-yellow-500 hover:text-black px-10 py-4 rounded-lg font-semibold transition duration-300">
                        View Tournaments
                    </a>
                <?php endif; ?>
            </div>
            <!-- Bigger Image Carousel -->
            <div class="mt-8 w-full max-w-4xl flex space-x-6">
                <img src="assets/images/1.jpg" alt="PUBG" class="w-1/2 h-48 object-cover rounded-lg shadow-lg">
                <img src="assets/images/2.jpg" alt="Free Fire" class="w-1/2 h-48 object-cover rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-16 bg-gray-900">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-4xl font-bold mb-12 text-yellow-400">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-yellow-500 text-black rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">1</div>
                    <h3 class="text-xl font-semibold mb-2">Register</h3>
                    <p>Create your account and verify your details.</p>
                </div>
                <div class="text-center">
                    <div class="bg-yellow-500 text-black rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">2</div>
                    <h3 class="text-xl font-semibold mb-2">Join Tournament</h3>
                    <p>Pay the entry fee and select your game.</p>
                </div>
                <div class="text-center">
                    <div class="bg-yellow-500 text-black rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">3</div>
                    <h3 class="text-xl font-semibold mb-2">Compete</h3>
                    <p>Play and upload your results for verification.</p>
                </div>
                <div class="text-center">
                    <div class="bg-yellow-500 text-black rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">4</div>
                    <h3 class="text-xl font-semibold mb-2">Win Prizes</h3>
                    <p>Get rewarded based on your performance!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tournaments Showcase -->
    <section id="tournaments" class="py-16 bg-gray-800">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-4xl font-bold mb-12 text-yellow-400">Ongoing Tournaments</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- PUBG Tournament -->
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <img src="assets/images/1.jpg" alt="PUBG Tournament" class="w-full h-48 object-cover rounded mb-4">
                    <h3 class="text-2xl font-semibold mb-2">PUBG Squad Battle</h3>
                    <p>Entry: ₹100 | Prize: ₹5000 | Slots: 50/100</p>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="join_tournament.php" class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded mt-4 inline-block">Join Now</a>
                    <?php else: ?>
                        <a href="login.php" class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded mt-4 inline-block">Login to Join</a>
                    <?php endif; ?>
                </div>

                <!-- Free Fire Tournament -->
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <img src="assets/images/2.jpg" alt="Free Fire Tournament" class="w-full h-48 object-cover rounded mb-4">
                    <h3 class="text-2xl font-semibold mb-2">Free Fire Duo Clash</h3>
                    <p>Entry: ₹50 | Prize: ₹2500 | Slots: 30/50</p>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="join_tournament.php" class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded mt-4 inline-block">Join Now</a>
                    <?php else: ?>
                        <a href="login.php" class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded mt-4 inline-block">Login to Join</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

    <!-- User Stats Section (Only for logged in users) -->
    <?php if(isset($_SESSION['user_id'])): ?>
    <section class="py-16 bg-gray-900">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-4xl font-bold mb-12 text-yellow-400">Your Gaming Stats</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <i class="fas fa-trophy text-4xl text-yellow-500 mb-4"></i>
                    <h3 class="text-2xl font-semibold mb-2">Tournaments Joined</h3>
                    <p class="text-3xl text-yellow-400">0</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <i class="fas fa-medal text-4xl text-yellow-500 mb-4"></i>
                    <h3 class="text-2xl font-semibold mb-2">Wins</h3>
                    <p class="text-3xl text-yellow-400">0</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <i class="fas fa-coins text-4xl text-yellow-500 mb-4"></i>
                    <h3 class="text-2xl font-semibold mb-2">Total Earnings</h3>
                    <p class="text-3xl text-yellow-400">₹0</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <i class="fas fa-ranking-star text-4xl text-yellow-500 mb-4"></i>
                    <h3 class="text-2xl font-semibold mb-2">Current Rank</h3>
                    <p class="text-3xl text-yellow-400">#-</p>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Footer -->
    <footer class="bg-gray-900 py-8">
        <div class="container mx-auto text-center px-4">
            <p>&copy; 2023 PlayWithUs. All rights reserved.</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#" class="text-yellow-400 hover:text-white"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-yellow-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-yellow-400 hover:text-white"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>

