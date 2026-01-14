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
                <h1 id="sidebarTitle" class="text-xl font-bold whitespace-nowrap">SM Admin</h1>
                <button id="toggleSidebar" class="text-2xl font-bold hover:text-gray-300 transition">☰</button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 mt-6 space-y-1 px-1 overflow-y-auto">

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
                @php
                // Check if the current route matches this menu item or any of its child routes
                $isActive = request()->routeIs(str_replace('.index', '*', $item['route']));
                @endphp

                @if($isActive)
                <a href="{{ route($item['route']) }}"
                    class="menu-item flex items-center gap-3 px-4 py-2 rounded-lg transition bg-indigo-900 font-semibold text-white">
                    <i class="{{ $item['icon'] }} text-lg w-5 text-center"></i>
                    <span class="menu-text">{{ $item['label'] }}</span>
                </a>
                @else
                <a href="{{ route($item['route']) }}"
                    class="menu-item flex items-center gap-3 px-4 py-2 rounded-lg transition hover:bg-indigo-600 hover:text-white">
                    <i class="{{ $item['icon'] }} text-lg w-5 text-center"></i>
                    <span class="menu-text">{{ $item['label'] }}</span>
                </a>
                @endif
                @endforeach


                <!-- Logout -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 w-full px-4 py-2 mt-2 rounded-lg hover:bg-red-600 hover:text-white transition">
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
            <aside
                class="bg-indigo-700 text-white w-64 h-full p-4 flex flex-col transform -translate-x-full transition-transform">

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
                        <button type="submit"
                            class="flex items-center gap-3 w-full px-4 py-2 mt-2 rounded-lg hover:bg-red-600 hover:text-white transition">
                            🚪 Logout
                        </button>
                    </form>
                </nav>
            </aside>
        </div>

        <!-- ================= MAIN CONTENT ================= -->
        <main class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Bar with Dropdown Search -->
            <div class="bg-indigo-600 p-4 flex justify-between items-center relative">
                <div class="flex-1 relative">
                    <input type="text" id="menuSearch" placeholder="Search menu..."
                        class="w-96 px-3 py-1.5 rounded-md text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                    <!-- Dropdown -->
                    <div id="menuDropdown"
                        class="absolute left-0 right-0 mt-1 bg-white shadow-lg rounded-md max-h-60 overflow-y-auto hidden z-50 w-96">
                    </div>
                </div>
                <div class="font-semibold ml-3 text-white">Profile</div>
            </div>

            <!-- Content Area -->
            <div class="flex-1 overflow-y-auto p-4">
                <button id="mobileToggle"
                    class="md:hidden mb-4 bg-indigo-600 text-white px-3 py-2 rounded hover:bg-indigo-700 transition">
                    ☰ Menu
                </button>

                <div class="bg-white rounded-lg shadow p-6 min-h-[70vh]">
                    @yield('content')
                </div>
            </div>

            <!-- Footer / Pagination -->
            <div class="bg-green-600 p-3 shrink-0">
                <div class="flex justify-between items-center text-white text-sm">

                    <div>
                        Showing <span class="font-semibold">1</span> to
                        <span class="font-semibold">10</span> of
                        <span class="font-semibold">120</span> results
                    </div>

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

    // ================= MENU DROPDOWN FILTER =================
    const menuSearchInput = document.getElementById('menuSearch');
    const menuDropdown = document.getElementById('menuDropdown');

    // Collect menu data from sidebar
    const menuData = Array.from(document.querySelectorAll('.menu-item')).map(item => {
        return {
            label: item.querySelector('.menu-text').textContent,
            href: item.getAttribute('href')
        };
    });

    menuSearchInput.addEventListener('input', () => {
        const keyword = menuSearchInput.value.toLowerCase().trim();
        menuDropdown.innerHTML = '';

        if (!keyword) {
            menuDropdown.classList.add('hidden');
            return;
        }

        const matches = menuData.filter(item => item.label.toLowerCase().includes(keyword));

        if (matches.length === 0) {
            menuDropdown.innerHTML = `<div class="px-3 py-2 text-gray-500 text-sm">No results found</div>`;
        } else {
            matches.forEach(item => {
                const div = document.createElement('div');
                div.className = "px-3 py-2 cursor-pointer hover:bg-indigo-100 text-gray-800";
                div.textContent = item.label;
                div.onclick = () => window.location.href = item.href;
                menuDropdown.appendChild(div);
            });
        }

        menuDropdown.classList.remove('hidden');
    });

    // Hide dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!menuSearchInput.contains(e.target) && !menuDropdown.contains(e.target)) {
            menuDropdown.classList.add('hidden');
        }
    });
    </script>

</body>

</html>