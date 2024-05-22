<x-admin.layout>
    <h1 class="text-4xl font-semibold">User Management <span class="font-bold theme-primary-color">({{ $users->total() }})</span></h1>

    <div class="relative overflow-x-auto mt-5 rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    E-Mail
                </th>
                <th scope="col" class="px-6 py-3">
                    Is Admin?
                </th>
                <th scope="col" class="px-6 py-3">
                    Created When
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->username }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                        {!! $user->admin ? '<p class="text-green-600">Yes</p>' : '<p class="text-red-600">No</p>' !!}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->created_at->diffForHumans() }}
                    </td>
                    <td class="flex pt-2 px-3">
                        <form action="{{ url('admin/users/' . $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="p-3 text-white bg-red-600 text-xs flex items-center font-semibold rounded-xl hover:bg-red-500 transition" type="submit">DEL</button>
                        </form>
                        <a class="mx-1 p-3 text-white bg-blue-600 text-xs flex items-center font-semibold rounded-xl hover:bg-blue-500 transition" href="{{ url('admin/users/' . $user->id) }}">EDIT</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="admin-users-pagination mt-5">{{ $users }}</div>
    </div>
</x-admin.layout>
