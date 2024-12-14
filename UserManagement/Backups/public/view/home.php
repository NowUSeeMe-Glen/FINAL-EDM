<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="bg-gray-900 text-white">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-16 bg-gray-800 h-screen flex flex-col items-center py-48 space-y-16">
            <a href="#" class="text-gray-400 hover:text-white">
                <i class="fas fa-home text-xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
                <i class="fas fa-credit-card text-xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
                <i class="fas fa-chart-bar text-xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
                <i class="fas fa-cog text-xl"></i>
            </a>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 p-4">
            <header class="flex justify-end items-center mb-4">
                <div class="flex items-center">
                    <span class="mr-4">Glen.</span>
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center border-2 border-white">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </header>
            <main class="grid grid-cols-3 gap-4">
                <section class="col-span-2">
                    <div class="bg-gray-800 p-4 rounded-lg mb-4">
                        <h2 class="text-xl font-semibold mb-2">My Cards</h2>
                        <div class="bg-gradient-to-r from-pink-500 to-red-500 p-4 rounded-lg">
                            <p class="text-lg">VISA</p>
                            <p class="text-2xl font-bold">1234 5678 9012 3456</p>
                        </div>
                    </div>
                    <div class="bg-gray-800 p-4 rounded-lg">
                        <h2 class="text-xl font-semibold mb-2">Activity</h2>
                        <canvas id="activityChart"></canvas>
                    </div>
                </section>
                <aside>
                    <div class="bg-gray-800 p-4 rounded-lg mb-4">
                        <h2 class="text-xl font-semibold mb-2">Recent Transactions</h2>
                        <ul>
                            <li class="flex justify-between">
                                <span>Apple Store</span>
                                <span>$144.56</span>
                            </li>
                            <li class="flex justify-between">
                                <span>McDonald</span>
                                <span>$44.56</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-gray-800 p-4 rounded-lg">
                        <h2 class="text-xl font-semibold mb-2">Payment</h2>
                        <canvas id="paymentChart"></canvas>
                    </div>
                </aside>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx1 = document.getElementById('activityChart').getContext('2d');
        const activityChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr'],
                datasets: [{
                    label: 'Activity',
                    data: [10, 20, 15, 30],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                }]
            }
        });

        const ctx2 = document.getElementById('paymentChart').getContext('2d');
        const paymentChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Grocery', 'Shopping', 'Education'],
                datasets: [{
                    label: 'Payment',
                    data: [300, 500, 200],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>
</html>
