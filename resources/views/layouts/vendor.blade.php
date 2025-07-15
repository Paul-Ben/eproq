<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vendor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
            class="fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-gray-200 shadow-lg flex flex-col transform transition-all duration-300 ease-in-out translate-x-0">
            <div class="flex items-center px-6 py-6 border-b border-gray-100">
                <img src="{{asset('/assets/images/benue-logo.png')}}" alt="Logo" class="w-10 h-10 mr-3 sidebar-logo" />
                <div class="sidebar-title-block">
                    <div class="font-bold text-[#232323] text-lg leading-tight">BSPP</div>
                    <div class="text-xs text-gray-500 font-jaka">Vendor Portal</div>
                </div>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="#" class="sidebar-link block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition side-link-active flex items-center">
                    <span class="sidebar-icon mr-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M3 6h18M3 18h18" /></svg></span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
                <a href="#" class="sidebar-link block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition flex items-center">
                    <span class="sidebar-icon mr-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h4m0 0V7a4 4 0 00-4-4H7a4 4 0 00-4 4v10a4 4 0 004 4h4" /></svg></span>
                    <span class="sidebar-text">My Tenders</span>
                </a>
                @role('contractor')
                <a href="#" class="sidebar-link block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition flex items-center">
                    <span class="sidebar-icon mr-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                    <span class="sidebar-text">Bid Submissions</span>
                </a>
                @endrole
                <a href="{{ route('vendor.adddocument') }}" class="sidebar-link block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition flex items-center">
                    <span class="sidebar-icon mr-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg></span>
                    <span class="sidebar-text">Document Upload</span>
                </a>
                <a href="#" class="sidebar-link block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition flex items-center">
                    <span class="sidebar-icon mr-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" /></svg></span>
                    <span class="sidebar-text">Profile</span>
                </a>
                <a href="#" class="sidebar-link block px-4 py-3 rounded-lg font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition flex items-center">
                    <span class="sidebar-icon mr-3"><svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0a1.724 1.724 0 002.573.982c.797-.545 1.855.253 1.414 1.13a1.724 1.724 0 002.287 2.287c.877-.441 1.675.617 1.13 1.414a1.724 1.724 0 00.982 2.573c.921.3.921 1.603 0 1.902a1.724 1.724 0 00-.982 2.573c.545.797-.253 1.855-1.13 1.414a1.724 1.724 0 00-2.287 2.287c.441.877-.617 1.675-1.414 1.13a1.724 1.724 0 00-2.573.982c-.3.921-1.603.921-1.902 0a1.724 1.724 0 00-2.573-.982c-.797.545-1.855-.253-1.414-1.13a1.724 1.724 0 00-2.287-2.287c-.877.441-1.675-.617-1.13-1.414a1.724 1.724 0 00-.982-2.573c-.921-.3-.921-1.603 0-1.902a1.724 1.724 0 00.982-2.573c-.545-.797.253-1.855 1.13-1.414a1.724 1.724 0 002.287-2.287c-.441-.877.617-1.675 1.414-1.13.684.468 1.6.468 2.284 0z" /><circle cx="12" cy="12" r="3" /></svg></span>
                    <span class="sidebar-text">Settings</span>
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
            class="flex-1 flex flex-col min-h-screen transition-all duration-300 ease-in-out ml-64">
            <!-- Top Navigation -->
            <header
                class="sticky top-0 z-40 bg-white border-b border-gray-200 shadow-sm flex items-center justify-between px-6 h-20">
                <div class="flex items-center space-x-3">
                    <!-- Hamburger for all screens -->
                    <button id="sidebarCollapse" type="button" class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 mr-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <!-- User Info Dropdown -->
                <div class="relative">
                    <button id="userMenuBtn" class="flex items-center space-x-3 focus:outline-none" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="text-right">
                            <span class="block font-semibold text-[#232323]">John Doe</span>
                            <span class="block text-xs text-gray-500">john.doe@email.com</span>
                        </span>
                        <svg class="w-6 h-6 ml-1 text-green-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="userDropdown"
                        class="hidden absolute right-0 mt-2 w-44 bg-white border border-gray-100 rounded-lg shadow-lg z-50">
                        <a href="{{route('profile.edit')}}"
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
     @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
    </script>
    @if ($errors->any())
        <script>
            toastr.error("{{ $errors->first() }}");
        </script>
    @endif
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarCollapse = document.getElementById('sidebarCollapse');
        const overlay = document.getElementById('overlay');
        const mainContent = document.getElementById('main-content');
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userDropdown = document.getElementById('userDropdown');
        const sidebarTitleBlock = document.querySelector('.sidebar-title-block');
        const sidebarLogo = document.querySelector('.sidebar-logo');

        // Function to toggle sidebar visibility (for mobile)
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

        // Function to collapse/expand sidebar (for all screens)
        function collapseSidebar() {
            const isCollapsed = sidebar.classList.contains('w-16');
            if (isCollapsed) {
                sidebar.classList.remove('w-16', 'bg-gray-100');
                sidebar.classList.add('w-64', 'bg-white');
                mainContent.classList.remove('ml-16');
                mainContent.classList.add('ml-64');
                if (sidebarTitleBlock) sidebarTitleBlock.classList.remove('hidden');
                if (sidebarLogo) sidebarLogo.classList.remove('mx-auto');
                // Show sidebar text
                document.querySelectorAll('.sidebar-text').forEach(el => el.classList.remove('hidden'));
            } else {
                sidebar.classList.remove('w-64', 'bg-white');
                sidebar.classList.add('w-16', 'bg-gray-100');
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-16');
                if (sidebarTitleBlock) sidebarTitleBlock.classList.add('hidden');
                if (sidebarLogo) sidebarLogo.classList.add('mx-auto');
                // Hide sidebar text
                document.querySelectorAll('.sidebar-text').forEach(el => el.classList.add('hidden'));
            }
        }

        // Initialize sidebar as visible on large screens, hidden on small screens
        function initSidebar() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
                mainContent.classList.remove('ml-0');
                if (!sidebar.classList.contains('w-16')) {
                    mainContent.classList.add('ml-64');
                } else {
                    mainContent.classList.add('ml-16');
                }
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                mainContent.classList.remove('ml-64', 'ml-16');
                mainContent.classList.add('ml-0');
            }
        }

        window.addEventListener('DOMContentLoaded', function() {
            // Only reference the top nav hamburger
            var sidebarCollapseBtn = document.getElementById('sidebarCollapse');
            if (sidebarCollapseBtn) {
                sidebarCollapseBtn.addEventListener('click', collapseSidebar);
            }
            if (typeof sidebarToggle !== 'undefined' && sidebarToggle) sidebarToggle.addEventListener('click', toggleSidebar);
            if (typeof overlay !== 'undefined' && overlay) overlay.addEventListener('click', toggleSidebar);
            window.addEventListener('resize', initSidebar);
            window.addEventListener('load', initSidebar);

            // User dropdown toggle
            if (typeof userMenuBtn !== 'undefined' && userMenuBtn) userMenuBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                userDropdown.classList.toggle('hidden');
            });

            // Close user dropdown when clicking outside
            document.addEventListener('click', () => {
                userDropdown.classList.add('hidden');
            });
        });
    </script>
</body>

</html>