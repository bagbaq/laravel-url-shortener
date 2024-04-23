@props(['title' => 'Home'])
<!doctype html>
<html lang="{{ Lang::locale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL Shortener - {{ $title }}</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gray-300">
    <div class="header w-full bg-gray-800">
        <div class="nav w-full p-5">
            <ul class="flex text-white font-semibold justify-between">
                <a href="{{ url('') }}" title="URL-Shortener">
                    <img class="" src="{{ asset('media/logo.png') }}" alt="Logo">
                </a>
                @auth
                    <div class="flex">
                        <li class="mx-3">
                            <a href="{{ url('') }}" class="hover:text-blue-500 hover:underline transition" title="Home Page">
                                Home
                            </a>
                        </li>
                        <li class="mx-3">
                            <a href="{{ url('my-links') }}" class="hover:text-blue-500 hover:underline transition" title="My Links">
                                My Links
                            </a>
                        </li>
                        <li>
                            <form action="{{ url('log-out') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="font-semibold hover:text-blue-500 hover:underline transition">Log Out</button>
                            </form>
                        </li>
                    </div>
                @else
                    <div class="flex">
                        <li>
                            <a href="{{ url('register') }}" class="hover:text-blue-500 hover:underline transition" title="Register">
                                Register
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('login') }}" class="hover:text-blue-500 hover:underline transition" title="Login">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Login
                            </a>
                        </li>
                    </div>
                @endauth
            </ul>
        </div>
    </div>

    {{ $slot }}

    <footer class="bg-gray-800 w-full h-20 mt-5 flex p-2 text-white font-bold justify-between items-center sm:px-10">
        <a href="{{ url('contact') }}" title="Contact" class="transition hover:text-blue-500 hover:underline">Contact Us</a>
        <div>URL-SH © Copyright {{ date('Y') }}</div>
    </footer>

    @if(session()->has('notification'))
        <div class="fixed bottom-5 right-5 bg-blue-500 text-white p-5 rounded-xl">
            <p>{{ session('notification') }}</p>
        </div>
    @endif
</body>
</html>
