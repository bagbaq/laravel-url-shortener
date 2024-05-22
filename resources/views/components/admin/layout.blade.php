@props(['title' => 'Dashboard'])
<!doctype html>
<html lang="{{ Lang::locale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - {{ $title }}</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="flex w-full admin-layout-holder min-h-screen">
        <div class="admin-dashboard">
            <h1 class="admin-dashboard-title">Admin Panel</h1>
            <div class="admin-dashboard-list">
                <a class="admin-dashboard-list-item" href="{{ url('admin/') }}" title="Home">Home</a>
                <a class="admin-dashboard-list-item" href="{{ url('admin/users') }}" title="Users">Users</a>
                <a class="admin-dashboard-list-item" href="{{ url('admin/links') }}" title="Links">Links</a>
            </div>

            <a href="{{ url('') }}" class="absolute bottom-8 left-9 font-bold text-blue-800 underline">< Back to site</a>
        </div>
        <div class="admin-content">{{ $slot }}</div>
    </div>

    <div class="admin-mobile-dashboard lg:hidden">
        <h1 class="admin-mobile-dashboard-title">Admin Panel</h1>
        <div class="admin-mobile-dashboard-list space-y-2 pt-3">
            <a class="admin-mobile-dashboard-list-item" href="{{ url('admin/') }}" title="Home">Home</a>
            <a class="admin-mobile-dashboard-list-item" href="{{ url('admin/users') }}" title="Users">Users</a>
            <a class="admin-mobile-dashboard-list-item" href="{{ url('admin/links') }}" title="Links">Links</a>
        </div>

        <a href="{{ url('') }}" class="mt-10 text-white font-semibold block">< Back to site</a>
    </div>

    @if(session()->has('notification'))
        <div class="fixed bottom-5 right-5 bg-blue-500 text-white p-5 rounded-xl">
            <p>{{ session('notification') }}</p>
        </div>
    @endif
</body>
