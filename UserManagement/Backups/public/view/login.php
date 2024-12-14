<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="flex w-full max-w-5xl bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-bold text-center mb-4">Sign in</h2>
            <div class="flex justify-center space-x-4 mb-4">
                <button class="bg-gray-200 p-2 rounded-full"><i class="fab fa-facebook-f"></i></button>
                <button class="bg-gray-200 p-2 rounded-full"><i class="fab fa-google"></i></button>
                <button class="bg-gray-200 p-2 rounded-full"><i class="fab fa-linkedin-in"></i></button>
            </div>
            <p class="text-center text-gray-500 mb-4">or use your account</p>
            <form id="loginForm" class="space-y-4">
                <div>
                    <input type="text" id="username" name="username" placeholder="Email" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder="Password" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <button type="submit" class="w-full py-2 px-4 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Sign In</button>
                </div>
                <div class="text-center">
                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-900">Forgot your password?</a>
                </div>
            
            </form>
        </div>
        <div class="w-1/2 bg-gradient-to-r from-pink-500 to-red-500 text-white flex items-center justify-center p-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">Hello, Friend!</h2>
                <p class="mb-4">Enter your personal details and start your journey with us</p>
                <a href="register.php" class="inline-block py-2 px-4 border border-white rounded-md hover:bg-white hover:text-red-500">Sign Up</a>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#loginForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "../../src/routes/routes.php",
                    data: {
                        type: "login",
                        user: $('#username').val(),
                        pass: $('#password').val(),
                    },
                    success: function (data) {  
                        if (data.trim() === "Login successful!") {
                            window.location.href = "home.php"; // Redirect to home.php
                        } else {
                            $('#response').html(data);
                        }
                    },
                });
            });
        });
    </script>
</body>
</html>
