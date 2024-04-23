<style>
    body {
        background-image: url('{{ asset('media/login-register-bg.jpg') }}');
    }
</style>
<x-layout title="Register">
    <div class="w-full h-screen flex justify-center items-center">
        <form class="bg-gray-800 border-2 border-lime-500 shadow-md p-10 flex flex-col login-register-form h-3/4 md:h-2/4 lg:h-3/4 justify-center items-center rounded-md" action="{{ url('register') }}" method="post">
        <h1 class="mb-3 font-bold text-5xl text-white">Register</h1>
            @csrf
            <x-form.input name="username" placeholder="Enter your username..."></x-form.input>
            <x-form.input name="email" type="email" placeholder="Your E-mail address"></x-form.input>
            <x-form.input name="password" type="password" placeholder="Set a strong password"></x-form.input>

            <a class="text-white font-semibold mb-3 w-full hover:underline hover:text-blue-500 transition" href="{{ url('login') }}" title="Login">Already have an account?</a>
            <button type="submit" class="p-3 bg-green-500 rounded text-white w-full">Register</button>
        </form>
    </div>
</x-layout>
