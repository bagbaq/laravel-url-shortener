<x-admin.layout>
    <h1 class="text-4xl font-semibold">Edit User - <span class="font-bold theme-primary-color">{{ $user->username }}</span></h1>

    <form action="{{ url('admin/users/' . $user->id) }}" method="POST" class="admin-form">
        <div class="admin-input-holder">
            <label class="font-semibold" for="username">Username</label>
            <input type="text" name="username" id="username" value="{{ $user->username }}" required>
        </div>
        @error('username')
            <p class="font-semibold text-red-600 my-2">{{ $message }}</p>
        @enderror
        <div class="admin-input-holder">
            <label class="font-semibold" for="email">E-Mail</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        @error('email')
            <p class="font-semibold text-red-600 my-2">{{ $message }}</p>
        @enderror
        <div class="admin-input-holder">
            <label class="font-semibold" for="admin">Admin</label>
            <input class="w-min" type="checkbox" name="admin" id="admin" {{ $user->admin == 1 ? 'checked' : null }}>
        </div>
        <button type="submit" class="p-3 mt-5 bg-green-600 hover:bg-green-700 transition font-semibold w-full rounded-xl">Submit</button>

        @csrf
        @method('PUT')
    </form>
</x-admin.layout>
