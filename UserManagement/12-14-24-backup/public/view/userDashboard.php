<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white h-screen">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Dashboard</h2>
            </div>
            <nav class="mt-10">
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-home"></i> Home
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-user"></i> Profile
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <a class="mt-4">
                <a href="../../src/controller/logoutController.php" class="block py-2 px-4 rounded bg-red-500 hover:bg-red-700">Logout</a>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-4">Welcome to your Dashboard</h1>
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded-lg shadow-md bg-blue-500 text-white">
                    <h2 class="text-xl font-bold mb-2">Users</h2>
                    <p class="text-gray-700"></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md bg-green-500 text-white">
                    <h2 class="text-xl font-bold mb-2">Admins</h2>
                    <p class="text-gray-700"></p>
                </div>

            </div>
        </main>
    </div>
</body>
</html>