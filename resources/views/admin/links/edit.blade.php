<x-admin.layout>
    <h1 class="text-4xl font-semibold">Edit Link - <span class="font-bold theme-primary-color">{{ $link->shortened_url }}</span></h1>

    <form action="{{ url('admin/links/' . $link->id) }}" method="POST" class="admin-form">
        <div class="admin-input-holder">
            <label class="font-semibold" for="shortened_url">Shortened URL</label>
            <input type="text" name="shortened_url" id="shortened_url" value="{{ $link->shortened_url }}" required>
        </div>
        @error('shortened_url')
            <p class="font-semibold text-red-600 my-2">{{ $message }}</p>
        @enderror
        <div class="admin-input-holder">
            <label class="font-semibold" for="main_url">Main URL</label>
            <input type="text" name="main_url" id="main_url" value="{{ $link->main_url }}" required>
        </div>
        @error('main_url')
        <p class="font-semibold text-red-600 my-2">{{ $message }}</p>
        @enderror
        <div class="admin-input-holder">
            <label class="font-semibold" for="send_email">Send E-Mail</label>
            <input class="w-min" type="checkbox" name="send_email" id="send_email" {{ $link->send_email == 1 ? 'checked' : null }}>
        </div>
        <button type="submit" class="p-3 mt-5 bg-green-600 hover:bg-green-700 transition font-semibold w-full rounded-xl">Submit</button>

        @csrf
        @method('PUT')
    </form>
</x-admin.layout>
