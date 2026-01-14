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

        <!-- Sidebar Desktop -->
        <aside id="sidebar" class="bg-indigo-700 text-white w-64 flex-col transition-all duration-300 hidden md:flex">

            <!-- Header -->
            <div class="flex items-center justify-between p-4 bg-indigo-800 border-b border-indigo-600">
                <h1 id="sidebarTitle" class="text-xl font-bold whitespace-nowrap">Admin Panel</h1>
                <button id="toggleSidebar" class="text-2xl font-bold hover:text-gray-300 transition">
                    ☰
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 mt-6 space-y-1 px-1">

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
                    class="flex items-center gap-3 px-4 py-2 rounded-lg 
                    transition hover:bg-indigo-600 hover:text-white 
                    {{ request()->routeIs($item['route']) || request()->routeIs($item['route'] . '.*') ? 'bg-indigo-900 font-semibold' : '' }}">
                    <i class="{{ $item['icon'] }} text-lg w-5 text-center"></i>
                    <span class="menu-text">{{ $item['label'] }}</span>
                </a>
                @endforeach

                <!-- Logout -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 mt-2 rounded-lg 
                        hover:bg-red-600 hover:text-white transition">
                        <i class="fa-solid fa-right-from-bracket text-lg w-5 text-center"></i>
                        <span class="menu-text">Logout</span>
                    </button>
                </form>
            </nav>

            <div class="p-4 text-xs text-gray-300 text-center border-t border-indigo-600">
                &copy; {{ date('Y') }} School Management
            </div>

        </aside>

        <!-- Mobile Sidebar Overlay -->
        <div id="mobileSidebar" class="fixed inset-0 z-40 bg-black bg-opacity-50 hidden md:hidden">
            <aside
                class="bg-indigo-700 text-white w-64 h-full p-4 flex flex-col shadow-lg transition-transform transform -translate-x-full">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-xl font-bold">Admin Panel</h1>
                    <button id="closeMobileSidebar" class="text-2xl font-bold hover:text-gray-300">✕</button>
                </div>

                <nav class="flex-1 space-y-1">
                    @foreach($menuItems as $item)
                    <a href="{{ route($item['route']) }}"
                        class="flex items-center gap-3 px-4 py-2 rounded-lg 
                        transition hover:bg-indigo-600 hover:text-white 
                        {{ request()->routeIs($item['route']) || request()->routeIs($item['route'] . '.*') ? 'bg-indigo-900 font-semibold' : '' }}">
                        <span class="text-lg">{{ $item['icon'] }}</span>
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

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <!-- Mobile toggle button -->
            <button id="mobileToggle"
                class="md:hidden mb-4 bg-indigo-600 text-white px-3 py-2 rounded hover:bg-indigo-700 transition">
                ☰ Menu
            </button>

            <div class="bg-white rounded-lg shadow p-6 min-h-[80vh] transition">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // Desktop sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        const title = document.getElementById('sidebarTitle');
        const menuTexts = document.querySelectorAll('.menu-text');

        let isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';

        function updateSidebar() {
            if (isCollapsed) {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-20');
                title.classList.add('hidden');
                menuTexts.forEach(el => el.classList.add('hidden'));
            } else {
                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-64');
                title.classList.remove('hidden');
                menuTexts.forEach(el => el.classList.remove('hidden'));
            }
        }

        updateSidebar();

        toggleBtn.addEventListener('click', () => {
            isCollapsed = !isCollapsed;
            localStorage.setItem('sidebar-collapsed', isCollapsed);
            updateSidebar();
        });

        // Mobile sidebar toggle
        const mobileSidebar = document.getElementById('mobileSidebar');
        const mobileToggle = document.getElementById('mobileToggle');
        const closeMobileSidebar = document.getElementById('closeMobileSidebar');

        mobileToggle.addEventListener('click', () => {
            mobileSidebar.classList.remove('hidden');
            setTimeout(() => {
                mobileSidebar.querySelector('aside').classList.remove('-translate-x-full');
            }, 50);
        });

        closeMobileSidebar.addEventListener('click', () => {
            mobileSidebar.querySelector('aside').classList.add('-translate-x-full');
            setTimeout(() => mobileSidebar.classList.add('hidden'), 300);
        });
    </script>

</body>

</html>