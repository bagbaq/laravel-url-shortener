<style>
    body {
        background-image: url('{{ asset('media/login-register-bg.jpg') }}');
    }
</style>
<x-layout title="Create new link">
    <div class="w-full h-screen flex justify-center items-center">
        <form class="bg-gray-800 border-2 border-lime-500 shadow-md p-10 flex flex-col login-register-form h-2/3 xl:h-2/4 justify-center items-center rounded-md" action="{{ url('new-link') }}" method="post">
            <h1 class="mb-3 font-bold text-5xl text-white">Create link</h1>
            @csrf

            <x-form.input name="URL" form_name="main_url" icon="bi bi-link-45deg" placeholder="Enter your loong link right here..." default_value="{{ request()->url }}"></x-form.input>
            <x-form.input name="length" type="number" icon="bi bi-123" placeholder="Should be between 4-64"></x-form.input>

            <div class="flex items-center mb-4 w-full">
                <input id="send_email" type="checkbox" name="send_email" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                <label for="send_email" class="ms-2 mx-2 text-sm font-medium text-white">Send me e-mail once link visited</label>
            </div>

            <a class="text-white font-semibold mb-3 w-full hover:underline hover:text-blue-500 transition" href="{{ url('my-links') }}" title="Back to dashboard">Back to dashboard</a>
            <button type="submit" class="p-3 bg-green-500 rounded text-white w-full">Create</button>
        </form>
    </div>
</x-layout>
