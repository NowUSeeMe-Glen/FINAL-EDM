<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="flex w-full max-w-5xl bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="w-1/2 bg-gradient-to-r from-red-500 to-pink-500 text-white flex items-center justify-center p-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">Welcome Back!</h2>
                <p class="mb-4">To keep connected with us please login with your personal info</p>
                <a href="login.php" class="inline-block py-2 px-4 border border-white rounded-md hover:bg-white hover:text-red-500">Sign In</a>
            </div>
        </div>
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-bold text-center mb-4">Create your account</h2>
            <div class="flex justify-center space-x-4 mb-4">
                <button class="bg-gray-200 p-2 rounded-full"><i class="fab fa-facebook-f"></i></button>
                <button class="bg-gray-200 p-2 rounded-full"><i class="fab fa-google"></i></button>
                <button class="bg-gray-200 p-2 rounded-full"><i class="fab fa-linkedin-in"></i></button>
            </div>
            <form id="registerform" class="space-y-5">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                    <input type="text" id="username" name="username" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                    <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                </div>
            </form>
            <div id="response" class="mt-4 text-center text-red-500"></div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#registerform').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "../../src/routes/routes.php",
                    data: {
                        type: "register",
                        user: $('#username').val(),
                        pass: $('#password').val(),
                    },
                    success: function (data) {
                        $('#response').html(data);
                    },
                });
            });
        });
    </script>
</body>
</html>
