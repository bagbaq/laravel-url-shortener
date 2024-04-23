<style>
    body {
        background-image: url('{{ asset('media/login-register-bg.jpg') }}');
    }
</style>
<x-layout title="Contact Us">
    <div class="w-full h-screen flex justify-center items-center">
        <form class="bg-gray-800 border-2 border-lime-500 shadow-md p-10 flex flex-col login-register-form h-3/4 justify-center items-center rounded-md" action="{{ url('contact') }}" method="post">
            <h1 class="mb-3 font-bold text-5xl text-white">Contact Us</h1>
            @csrf
            <x-form.input name="email" icon="bi bi-envelope" placeholder="E-Mail"></x-form.input>
            <x-form.input name="subject" icon="bi bi-asterisk" placeholder="Subject of e-mail"></x-form.input>

            <div class="mb-3 w-full main-input">
                <label for="body" class="block font-bold text-white mb-2">
                    Body
                </label>
                <textarea type="text" class="resize-none block w-full bg-transparent rounded-md border-2 border-e-lime-500 focus:outline-none p-3 text-white font-semibold focus:shadow-md transition" name="body" id="body">{{ old('body') }}</textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="p-3 bg-green-500 rounded text-white w-full">Send Message</button>
        </form>
    </div>
</x-layout>
