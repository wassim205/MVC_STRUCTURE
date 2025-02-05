<?php include 'partials/header.php';
use App\Core\Security;
?>

<?php if (!empty($webError)): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline"><?php echo $webError; ?></span>
    </div>
<?php endif; ?>

<!-- Login Page -->
<div id="loginPage" class="fixed inset-0 flex items-center justify-center p-4">
    <div class="relative bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md z-10">
        <!-- Floating background elements -->
        <div class="absolute -top-8 -left-8 w-24 h-24 bg-purple-200 rounded-full blur-xl opacity-50"></div>
        <div class="absolute -bottom-8 -right-8 w-24 h-24 bg-blue-200 rounded-full blur-xl opacity-50"></div>

        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Welcome Back</h2>

        <form class="space-y-6" method="post" action="/login">
        <input type="hidden" name="_token" value="<?= Security::generateCsrfToken() ?>">
   
            
            <div>
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email"
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-purple-500 transition-colors"
                    placeholder="Enter your email">
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-purple-500 transition-colors"
                    placeholder="••••••••">
            </div>


            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 rounded-lg hover:scale-[1.02] transition-transform">
                Log In
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="#forgot" class="text-purple-600 hover:text-purple-700 text-sm">Forgot password?</a>
        </div>

        <div class="mt-8">
            <p class="text-center text-gray-500">Or continue with</p>
            <div class="flex justify-center space-x-4 mt-4">
                <button class="p-2 rounded-full bg-white shadow-md hover:shadow-lg transition-shadow">
                    <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-6 h-6" alt="Google">
                </button>
                <button class="p-2 rounded-full bg-white shadow-md hover:shadow-lg transition-shadow">
                    <img src="https://cdn-icons-png.flaticon.com/512/15047/15047435.png" class="w-7 h-7" alt="Facebook">
                </button>
                <button class="p-2 rounded-full bg-white shadow-md hover:shadow-lg transition-shadow">
                    <img src="https://www.svgrepo.com/show/475654/github-color.svg" class="w-7 h-7" alt="GitHub">
                </button>
            </div>
        </div>

        <p class="text-center mt-8 text-gray-500">
            Don't have an account?
            <a href="/signup" class="text-purple-600 hover:text-purple-700 font-medium">Sign up</a>
        </p>
    </div>

    <!-- Animated background circles -->
    <div class="absolute top-20 left-20 w-16 h-16 bg-white/10 rounded-full floating-circle"></div>
    <div class="absolute bottom-20 right-20 w-24 h-24 bg-white/10 rounded-full floating-circle" style="animation-delay: -2s"></div>
</div>


</body>

</html>