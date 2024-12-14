<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
</head>
<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-white w-64 min-h-screen p-4">
        <h2 class="text-2xl font-bold mb-4">Admin Menu</h2>
        <ul>
            <li class="mb-2">
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a>
            </li>
            <li class="mb-2">
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Users</a>
            </li>
            <li class="mb-2">
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Settings</a>
            </li>
            <li class="mt-4">
                <a href="../../src/controller/logoutController.php" class="block py-2 px-4 rounded bg-red-500 hover:bg-red-700">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Admin Dashboard</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-2">All Users</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">ID</th>
                        <th class="py-2">Username</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Role</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once('../../src/controller/userController.php');
                    $userController = new userController();
                    $users = $userController->getAllUsers();
                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td class='border px-4 py-2'>{$user['id']}</td>";
                        echo "<td class='border px-4 py-2'>{$user['user']}</td>";
                        echo "<td class='border px-4 py-2'>{$user['email']}</td>";
                        echo "<td class='border px-4 py-2'>{$user['role']}</td>";
                        echo "<td class='border px-4 py-2'>
                                <button class='edit-role bg-blue-500 text-white px-2 py-1 rounded' data-id='{$user['id']}' data-role='{$user['role']}'>Edit</button>
                                <button class='delete-user bg-red-500 text-white px-2 py-1 rounded' data-id='{$user['id']}'>Delete</button>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Editing Role -->
    <div id="editRoleModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Edit User Role</h2>
            <form id="editRoleForm">
                <input type="hidden" id="userId" name="userId">
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="close-modal bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // Open modal
            $('.edit-role').on('click', function () {
                $('#userId').val($(this).data('id'));
                $('#role').val($(this).data('role'));
                $('#editRoleModal').removeClass('hidden');
            });

            // Close modal
            $('.close-modal').on('click', function () {
                $('#editRoleModal').addClass('hidden');
            });

            // Handle form submission
            $('#editRoleForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "../../src/routes/routes.php",
                    data: {
                        type: "editRole",
                        userId: $('#userId').val(),
                        role: $('#role').val(),
                    },
                    success: function (data) {
                        alert(data);
                        location.reload(); // Reload the page to see changes
                    },
                });
            });

            // Handle delete user
            $('.delete-user').on('click', function () {
                if (confirm('Are you sure you want to delete this user?')) {
                    const userId = $(this).data('id');
                    $.ajax({
                        type: "post",
                        url: "../../src/routes/routes.php",
                        data: {
                            type: "deleteUser",
                            userId: userId,
                        },
                        success: function (data) {
                            alert(data);
                            location.reload(); // Reload the page to see changes
                        },
                    });
                }
            });
        });
    </script>
</body>
</html>
