<x-admin.layout>
    <h1 class="text-4xl font-semibold">Welcome, <span class="font-bold">{{ ucwords(Auth::user()->username) }}</span></h1>

    <div class="flex flex-row space-x-4 mt-5 admin-card-holder">
        <a href="{{ url('admin/users') }}" class="admin-card p-10 rounded-xl font-bold">
            <div class="admin-card-count">{{ $user_count }}</div>
            <div class="admin-card-title">Users</div>
        </a>
        <a href="{{ url('admin/links') }}" class="admin-card p-10 rounded-xl font-bold">
            <div class="admin-card-count">{{ $link_count }}</div>
            <div class="admin-card-title">Links</div>
        </a>
    </div>
</x-admin.layout>
