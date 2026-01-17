<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-semibold mb-2">Welcome, {{ Auth::guard('admin')->user()->name }}!</h2>
    <p class="text-gray-600">Here is a quick overview of your system.</p>
</div>
