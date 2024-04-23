<style>
    body {
        background-image: url('{{ asset('media/login-register-bg.jpg') }}');
    }
</style>
<x-layout title="Login">
    <div class="w-full h-screen flex justify-center items-center">
        <form class="bg-gray-800 border-2 border-lime-500 shadow-md p-10 flex flex-col login-register-form h-2/4 justify-center items-center rounded-md" action="{{ url('login') }}" method="post">
            <h1 class="mb-3 font-bold text-5xl text-white">Login</h1>
            @csrf
            <x-form.input name="username" icon="bi bi-person-fill" placeholder="Username"></x-form.input>
            <x-form.input name="password" type="password" icon="bi bi-asterisk" placeholder="*********"></x-form.input>

            <div class="flex items-center mb-4 w-full">
                <input id="remember_me" type="checkbox" name="remember_me" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                <label for="remember_me" class="ms-2 mx-2 text-sm font-medium text-white">Remember Me</label>
            </div>

            @error('status')
            <p class="text-red-500 font-semibold w-full text-sm">{{ $message }}</p>
            @enderror

            <a class="text-white font-semibold mb-3 w-full hover:underline hover:text-blue-500 transition" href="{{ url('register') }}" title="Register">Don't have a account?</a>
            <button type="submit" class="p-3 bg-green-500 rounded text-white w-full">Log in</button>
        </form>
    </div>
</x-layout>
