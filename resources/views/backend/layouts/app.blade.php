<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-indigo-700 text-white transition-all duration-300">

            <!-- Header -->
            <div class="flex items-center justify-between p-4 bg-indigo-800">
                <h1 id="sidebarTitle" class="text-xl font-bold whitespace-nowrap">
                    Admin Panel
                </h1>
                <button id="toggleSidebar" class="text-2xl font-bold">
                    ☰
                </button>
            </div>

            <!-- Navigation -->
            <nav id="sidebarNav" class="mt-6 space-y-2">

                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2 hover:bg-indigo-600 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-900' : '' }}">
                    🏠
                    <span class="menu-text">Dashboard</span>
                </a>

                <!-- Students -->
                <a href="{{ route('admin.students.index') }}"
                    class="flex items-center gap-3 px-4 py-2 hover:bg-indigo-600 {{ request()->routeIs('admin.students.*') ? 'bg-indigo-900' : '' }}">
                    🎓
                    <span class="menu-text">Students</span>
                </a>

                <!-- Courses -->
                <a href="{{ route('admin.courses.index') }}"
                    class="flex items-center gap-3 px-4 py-2 hover:bg-indigo-600 {{ request()->routeIs('admin.courses.*') ? 'bg-indigo-900' : '' }}">
                    📚
                    <span class="menu-text">Courses</span>
                </a>

                <!-- Teachers -->
                <a href="{{ route('admin.teachers.index') }}"
                    class="flex items-center gap-3 px-4 py-2 hover:bg-indigo-600 {{ request()->routeIs('admin.teachers.*') ? 'bg-indigo-900' : '' }}">
                    👨‍🏫
                    <span class="menu-text">Teachers</span>
                </a>

                <!-- Schedule -->
                <a href="{{ route('admin.schedule.index') }}"
                    class="flex items-center gap-3 px-4 py-2 hover:bg-indigo-600 {{ request()->routeIs('admin.schedule.*') ? 'bg-indigo-900' : '' }}">
                    📅
                    <span class="menu-text">Schedule</span>
                </a>

                <!-- Reports -->
                <a href="{{ route('admin.reports.index') }}"
                    class="flex items-center gap-3 px-4 py-2 hover:bg-indigo-600 {{ request()->routeIs('admin.reports.*') ? 'bg-indigo-900' : '' }}">
                    📊
                    <span class="menu-text">Reports</span>
                </a>

                <!-- Settings -->
                <a href="{{ route('admin.settings.index') }}"
                    class="flex items-center gap-3 px-4 py-2 hover:bg-indigo-600 {{ request()->routeIs('admin.settings.*') ? 'bg-indigo-900' : '' }}">
                    ⚙️
                    <span class="menu-text">Settings</span>
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 hover:bg-red-600">
                        🚪
                        <span class="menu-text">Logout</span>
                    </button>
                </form>

            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>

    </div>

    <script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');
    const title = document.getElementById('sidebarTitle');
    const menuTexts = document.querySelectorAll('.menu-text');

    // Load state from localStorage
    let isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';

    function updateSidebar() {
        if (isCollapsed) {
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-16');
            title.classList.add('hidden');
            menuTexts.forEach(el => el.classList.add('hidden'));
        } else {
            sidebar.classList.remove('w-16');
            sidebar.classList.add('w-64');
            title.classList.remove('hidden');
            menuTexts.forEach(el => el.classList.remove('hidden'));
        }
    }

    // Initial render
    updateSidebar();

    toggleBtn.addEventListener('click', () => {
        isCollapsed = !isCollapsed;
        localStorage.setItem('sidebar-collapsed', isCollapsed);
        updateSidebar();
    });
    </script>



</body>

</html>