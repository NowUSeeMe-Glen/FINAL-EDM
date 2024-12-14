<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="flex w-full max-w-5xl bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="w-1/2 bg-gradient-to-r from-red-500 to-pink-500 text-white flex items-center justify-center p-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">Welcome Back!</h2>
                <p class="mb-4">To keep connected with us please login with your personal info</p>
                <a href="login.php" class="inline-block py-2 px-4 border border-white rounded-md hover:bg-white hover:text-red-500">Sign In</a>
               <div class="mt-4 flex justify-center space-x-4">
                <button class="p-2 border rounded-full text-white hover:bg-white hover:text-red-500"><i class="fab fa-facebook-f"></i></button>
                <button class="p-2 border rounded-full text-white hover:bg-white hover:text-red-500"><i class="fab fa-google"></i></button>
                <button class="p-2 border rounded-full text-white hover:bg-white hover:text-red-500"><i class="fab fa-tiktok"></i></button>

               </div>
            </div>
        </div>
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-bold text-center mb-4">Create your account</h2>
        
            <form id="registerform" class="space-y-5">
                <div>
                    
                    <input type="text" id="username" name="username" placeholder="Username" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    
                    <input type="email" id="email" name="email" placeholder="Email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    
                    <input type="password" id="password" name="password"  placeholder="Password"required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                if ($('#password').val() !== $('#confirm_password').val()) {
                    $('#response').html('Passwords do not match');
                    return;
                }
                $.ajax({
                    type: "post",
                    url: "../../src/routes/routes.php",
                    data: {
                        type: "register",
                        user: $('#username').val(),
                        email: $('#email').val(),
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
