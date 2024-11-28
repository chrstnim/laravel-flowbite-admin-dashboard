<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="#">
    <meta name="author" content="#">
    <meta name="generator" content="Laravel">

    <title>Dashboard - </title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="canonical" href="{{ request()->fullUrl() }}">

    @if(isset($page->params['robots']))
        <meta name="robots" content="{{ $page->params['robots'] }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" href="/favicon.ico">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Dark/Light Mode Toggle Script -->
    <script>
        const toggleButton = document.getElementById('theme-toggle');
        const iconMoon = document.getElementById('icon-moon');
        const iconSun = document.getElementById('icon-sun');

        toggleButton.addEventListener('click', () => {
            if (localStorage.getItem('color-theme') === 'dark') {
                localStorage.setItem('color-theme', 'light');
                document.documentElement.classList.remove('dark');
                iconSun.classList.add('hidden');
                iconMoon.classList.remove('hidden');
            } else {
                localStorage.setItem('color-theme', 'dark');
                document.documentElement.classList.add('dark');
                iconMoon.classList.add('hidden');
                iconSun.classList.remove('hidden');
            }
        });
    </script>
</head>

@php
    $whiteBg = isset($params['white_bg']) && $params['white_bg'];
@endphp

<body class="{{ $whiteBg ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' }}">
    <!-- Navbar -->
    <x-navbar-dashboard />

    <!-- Main Layout -->
    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        <!-- Sidebar -->
        <div class="w-64 h-full fixed top-0 left-0 bg-gradient-to-b from-gray-800 to-gray-900 text-white shadow-lg">
    <div class="flex justify-center items-center p-6 bg-gray-900">
        <h2 class="text-2xl font-semibold">Admin Dashboard</h2>
    </div>

    <!-- Sidebar Menu -->
    <ul class="space-y-4 mt-6">
        <!-- Dashboard Item -->
        <li>
            <a href="#" class="flex items-center py-3 px-4 hover:bg-indigo-700 rounded-lg transition duration-300 text-white">
                <i class="fas fa-tachometer-alt text-xl mr-3"></i> Dashboard
            </a>
        </li>

        <!-- Superadmin Item -->
        <li>
            <a href="#" class="flex items-center py-3 px-4 hover:bg-indigo-700 rounded-lg transition duration-300 text-white">
                <i class="fas fa-cogs text-xl mr-3"></i> Superadmin
            </a>
        </li>

        <!-- Admin Item -->
        <li>
            <a href="#" class="flex items-center py-3 px-4 hover:bg-indigo-700 rounded-lg transition duration-300 text-white">
                <i class="fas fa-user-shield text-xl mr-3"></i> Admin
            </a>
        </li>

        <!-- Finance Item -->
        <li>
            <a href="#" class="flex items-center py-3 px-4 hover:bg-indigo-700 rounded-lg transition duration-300 text-white">
                <i class="fas fa-wallet text-xl mr-3"></i> Finance
            </a>
        </li>

        <!-- Job Provider Item -->
        <li>
            <a href="#" class="flex items-center py-3 px-4 hover:bg-indigo-700 rounded-lg transition duration-300 text-white">
                <i class="fas fa-briefcase text-xl mr-3"></i> Penyedia Lowongan
            </a>
        </li>

        <!-- Job Application Item -->
        <li>
            <a href="#" class="flex items-center py-3 px-4 hover:bg-indigo-700 rounded-lg transition duration-300 text-white">
                <i class="fas fa-paper-plane text-xl mr-3"></i> Pengirim Lamaran
            </a>
        </li>

                <!-- Dark/Light Mode Toggle -->
        </div>

        <!-- Main Content Area -->
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900 p-6">
            
            <!-- Header with Search and Notifications -->
            <x-header-dashboard />

            <!-- Dashboard Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1: Analytics -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Total Users</h3>
                    <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">1,235</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total registered users in the system.</p>
                </div>

                <!-- Card 2: Revenue -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Revenue</h3>
                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">$35,750</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total revenue generated this month.</p>
                </div>

                <!-- Card 3: Activity -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Recent Activity</h3>
                    <ul class="space-y-2 text-gray-500 dark:text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i> User John completed his registration.
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i> Revenue report updated.
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i> New user added to the system.
                        </li>
                    </ul>
                </div>

                <!-- Card 4: Job Vacancy -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Job Vacancy: Web Developer</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">We are looking for an experienced web developer to join our team.</p>
                    <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500">Apply Now</a>
                </div>
            </div>

            <!-- Footer -->
            <x-footer-dashboard />
        </div>
    </div>

   
</body>
</html>
