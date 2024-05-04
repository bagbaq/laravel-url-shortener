<x-layout title="Account Settings">
    <div class="w-full h-screen flex justify-center items-center">
        <form class="bg-gray-800 border-2 border-lime-500 shadow-md p-10 flex flex-col h-2/4 justify-center items-center rounded-md" action="{{ url('settings') }}" method="post">
            <h1 class="mb-3 font-bold text-5xl text-white">Profile Settings</h1>
            @csrf
            @method('PUT')
            <x-form.input name="username" icon="bi bi-person-fill" placeholder="Username" default_value="{{ auth()->user()->username }}"></x-form.input>
            <x-form.input name="E-Mail" form_name="email" icon="bi bi-envelope" placeholder="E-Mail" default_value="{{ auth()->user()->email }}"></x-form.input>

            <button type="submit" class="p-3 bg-green-500 rounded text-white w-full">Save</button>
        </form>
    </div>
</x-layout>
