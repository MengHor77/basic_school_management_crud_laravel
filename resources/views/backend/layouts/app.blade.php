<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="flex h-screen">

        <!-- ================= SIDEBAR DESKTOP ================= -->
        <aside id="sidebar" class="bg-indigo-700 text-white w-64 flex-col transition-all duration-300 hidden md:flex">

            <!-- Header -->
            <div class="flex items-center justify-between p-4 bg-indigo-800 border-b border-indigo-600">
                <h1 id="sidebarTitle" class="text-xl font-bold whitespace-nowrap">Admin Panel</h1>
                <button id="toggleSidebar" class="text-2xl font-bold hover:text-gray-300 transition">☰</button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 mt-4 space-y-1 px-1 overflow-y-auto">

                @php
                $menuItems = [
                    ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'fa-solid fa-gauge'],
                    ['route' => 'admin.students.index', 'label' => 'Students', 'icon' => 'fa-solid fa-user-graduate'],
                    ['route' => 'admin.courses.index', 'label' => 'Courses', 'icon' => 'fa-solid fa-book-open'],
                    ['route' => 'admin.teachers.index', 'label' => 'Teachers', 'icon' => 'fa-solid fa-chalkboard-user'],
                    ['route' => 'admin.schedule.index', 'label' => 'Schedule', 'icon' => 'fa-solid fa-calendar-days'],
                    ['route' => 'admin.reports.index', 'label' => 'Reports', 'icon' => 'fa-solid fa-chart-line'],
                    ['route' => 'admin.settings.index', 'label' => 'Settings', 'icon' => 'fa-solid fa-gear'],
                ];
                @endphp

                @foreach($menuItems as $item)
                <a href="{{ route($item['route']) }}" 
                    class="flex items-center gap-3 px-4 py-2 rounded-lg transition hover:bg-indigo-600 hover:text-white 
                    {{ request()->routeIs($item['route']) || request()->routeIs($item['route'] . '.*') ? 'bg-indigo-900 font-semibold' : '' }}">
                    <i class="{{ $item['icon'] }} text-lg w-5 text-center"></i>
                    <span class="menu-text">{{ $item['label'] }}</span>
                </a>
                @endforeach

                <!-- Logout -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 mt-2 rounded-lg hover:bg-red-600 hover:text-white transition">
                        <i class="fa-solid fa-right-from-bracket text-lg w-5 text-center"></i>
                        <span class="menu-text">Logout</span>
                    </button>
                </form>
            </nav>

            <div class="p-4 text-xs text-gray-300 text-center border-t border-indigo-600">
                &copy; {{ date('Y') }} School Management
            </div>

        </aside>

        <!-- ================= MOBILE SIDEBAR ================= -->
        <div id="mobileSidebar" class="fixed inset-0 z-40 bg-black bg-opacity-50 hidden md:hidden">
            <aside class="bg-indigo-700 text-white w-64 h-full p-4 flex flex-col transform -translate-x-full transition-transform">

                <div class="flex justify-between mb-6">
                    <h1 class="text-xl font-bold">Admin Panel</h1>
                    <button id="closeMobileSidebar" class="text-2xl hover:text-gray-300">✕</button>
                </div>

                <nav class="flex-1 space-y-1 overflow-y-auto">
                    @foreach($menuItems as $item)
                    <a href="{{ route($item['route']) }}" 
                        class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-indigo-600 transition">
                        <i class="{{ $item['icon'] }}"></i>
                        <span>{{ $item['label'] }}</span>
                    </a>
                    @endforeach

                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 mt-2 rounded-lg hover:bg-red-600 hover:text-white transition">
                            🚪 Logout
                        </button>
                    </form>
                </nav>
            </aside>
        </div>

        <!-- ================= MAIN CONTENT ================= -->
        <main class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Bar -->
            <div class="bg-yellow-400 p-4 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <span class="font-semibold">Menu Filter</span>
                    <input type="search" id="menuSearch" placeholder="Search menu..." 
                        class="px-3 py-1.5 rounded-md border text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="font-semibold">Profile</div>
            </div>

            <!-- Content Area -->
            <div class="flex-1 overflow-y-auto p-4">
                <button id="mobileToggle" class="md:hidden mb-4 bg-indigo-600 text-white px-3 py-2 rounded hover:bg-indigo-700 transition">
                    ☰ Menu
                </button>

                <div class="bg-white rounded-lg shadow p-6 min-h-[70vh]">
                    @yield('content')
                </div>
            </div>

            <!-- Footer / Pagination -->
            <div class="bg-green-600 p-3 shrink-0">
                <div class="flex justify-between items-center text-white text-sm">

                    <!-- Info -->
                    <div>
                        Showing <span class="font-semibold">1</span> to
                        <span class="font-semibold">10</span> of
                        <span class="font-semibold">120</span> results
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center gap-1">
                        <button class="px-3 py-1 rounded bg-green-700 hover:bg-green-800">&laquo;</button>
                        <button class="px-3 py-1 rounded bg-white text-green-700 font-semibold">1</button>
                        <button class="px-3 py-1 rounded bg-green-700 hover:bg-green-800">2</button>
                        <button class="px-3 py-1 rounded bg-green-700 hover:bg-green-800">3</button>
                        <button class="px-3 py-1 rounded bg-green-700 hover:bg-green-800">&raquo;</button>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <!-- ================= SCRIPTS ================= -->
    <script>
    // Desktop sidebar toggle
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');
    const title = document.getElementById('sidebarTitle');
    const menuTexts = document.querySelectorAll('.menu-text');

    let isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';

    function updateSidebar() {
        sidebar.classList.toggle('w-20', isCollapsed);
        sidebar.classList.toggle('w-64', !isCollapsed);
        title.classList.toggle('hidden', isCollapsed);
        menuTexts.forEach(el => el.classList.toggle('hidden', isCollapsed));
    }
    updateSidebar();

    toggleBtn.onclick = () => {
        isCollapsed = !isCollapsed;
        localStorage.setItem('sidebar-collapsed', isCollapsed);
        updateSidebar();
    };

    // Mobile sidebar
    const mobileSidebar = document.getElementById('mobileSidebar');
    const mobileToggle = document.getElementById('mobileToggle');
    const closeMobileSidebar = document.getElementById('closeMobileSidebar');

    mobileToggle.onclick = () => {
        mobileSidebar.classList.remove('hidden');
        setTimeout(() => mobileSidebar.querySelector('aside').classList.remove('-translate-x-full'), 50);
    };
    closeMobileSidebar.onclick = () => {
        mobileSidebar.querySelector('aside').classList.add('-translate-x-full');
        setTimeout(() => mobileSidebar.classList.add('hidden'), 300);
    };

    // Sidebar menu filter
    const searchInput = document.getElementById('menuSearch');
    const menuItems = document.querySelectorAll('.menu-item');

    searchInput.addEventListener('input', () => {
        const keyword = searchInput.value.toLowerCase().trim();
        menuItems.forEach(item => {
            item.classList.toggle('hidden', !item.textContent.toLowerCase().includes(keyword));
        });
    });
    </script>

</body>
</html>
