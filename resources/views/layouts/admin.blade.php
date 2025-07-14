<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E-Procurement|Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        .font-sora {
            font-family: "Sora", sans-serif;
        }

        .font-jaka {
            font-family: "Sora", sans-serif;
        }

        .side-link-active {
            background: #f0f9ff;
            color: #02611a;
            border-left: 4px solid #02611a;
        }
    </style>
</head>

<body class="bg-gray-50 font-sora">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-gray-200 shadow-lg flex flex-col transform transition-transform duration-300 ease-in-out translate-x-0">
            <div class="flex items-center px-6 py-6 border-b border-gray-100">
                <img src="{{asset('/assets/images/benue-logo.png')}}" alt="Logo" class="w-10 h-10 mr-3" />
                <div>
                    <div class="font-bold text-[#232323] text-lg leading-tight">BSPP</div>
                    <div class="text-xs text-gray-500 font-jaka">Admin Portal</div>
                </div>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="#"
                    class="block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition side-link-active">
                    Dashboard
                </a>
                <a href="#"
                    class="block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
                    My Tenders
                </a>
                <a href="#"
                    class="block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
                    Bid Submissions
                </a>
                <a href="#"
                    class="block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
                    Profile
                </a>
                <a href="#"
                    class="block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
                    Settings
                </a>
            </nav>
            <div class="px-6 py-4 border-t border-gray-100">
                <a href="#" class="block text-red-600 font-medium hover:underline">Logout</a>
            </div>
        </aside>

        <!-- Overlay for small screens -->
        <div id="overlay"
            class="fixed inset-0 bg-black bg-opacity-30 z-20 hidden transition-opacity duration-300 lg:hidden"></div>

        <!-- Main content -->
        <div id="main-content"
            class="flex-1 flex flex-col min-h-screen transition-margin duration-300 ease-in-out ml-64">
            <!-- Top Navigation -->
            <header
                class="sticky top-0 z-40 bg-white border-b border-gray-200 shadow-sm flex items-center justify-between px-6 h-20">
                <!-- Sidebar toggle button -->
                <button id="sidebarToggle" aria-label="Toggle sidebar"
                    class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 lg:hidden">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Logo and title -->
                <div class="flex items-center space-x-3">
                    {{-- <img src="/assets/images/benue-logo.png" alt="Logo" class="w-10 h-10" />
                    <span class="hidden md:inline-block font-bold text-[#232323] text-lg">BSPP</span> --}}
                </div>

                <!-- User Info Dropdown -->
                <div class="relative">
                    <button id="userMenuBtn" class="flex items-center space-x-3 focus:outline-none" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="text-right">
                            <span class="block font-semibold text-[#232323]">{{Auth::user()->name}}</span>
                            <span class="block text-xs text-gray-500">{{Auth::user()->email}}</span>
                        </span>
                        <svg class="w-6 h-6 ml-1 text-green-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="userDropdown"
                        class="hidden absolute right-0 mt-2 w-44 bg-white border border-gray-100 rounded-lg shadow-lg z-50">
                        <a href="#"
                            class="block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-700 font-medium">Profile</a>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50 font-medium">Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-8 bg-gray-50 overflow-auto">
                <h2 class="text-2xl font-bold text-[#232323] mb-6">Welcome, Admin!</h2>
                <div class="rounded-xl bg-white shadow p-8">
                    <p class="text-gray-700">This is your dashboard. Here you can view your tenders, manage bids, and
                        update your profile.</p>
                </div>
                @yield('content')
            </main>
        </div>
    </div>
    <footer
        class="w-full bg-white border-t border-gray-200 py-3 px-6 flex items-center justify-between text-gray-600 text-sm font-sora fixed bottom-0 left-0">
        <div class="flex-1 text-center">
            2025 all rights reserved
        </div>
        <div>
            Powered by <span class="font-semibold">BDIC</span>
        </div>
    </footer>

    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const overlay = document.getElementById('overlay');
        const mainContent = document.getElementById('main-content');
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userDropdown = document.getElementById('userDropdown');

        // Function to toggle sidebar visibility
        function toggleSidebar() {
            const isHidden = sidebar.classList.contains('-translate-x-full');
            if (isHidden) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                mainContent.classList.remove('ml-0');
                mainContent.classList.add('ml-64');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-0');
            }
        }

        // Initialize sidebar as visible on large screens, hidden on small screens
        function initSidebar() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
                mainContent.classList.remove('ml-0');
                mainContent.classList.add('ml-64');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-0');
            }
        }

        sidebarToggle.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        window.addEventListener('resize', initSidebar);
        window.addEventListener('load', initSidebar);

        // User dropdown toggle
        userMenuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
        });

        // Close user dropdown when clicking outside
        document.addEventListener('click', () => {
            userDropdown.classList.add('hidden');
        });
    </script>
</body>

</html>