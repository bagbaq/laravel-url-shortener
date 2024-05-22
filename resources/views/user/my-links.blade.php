<style>
    body {
        background-image: url('{{ asset('media/login-register-bg.jpg') }}');
    }
</style>
<x-layout title="My Links">
    <h1 class="font-bold text-5xl text-white w-full text-center mt-5">My Links</h1>
    <div class="w-full h-screen flex justify-center items-center">
        <div class="bg-gray-800 border-2 border-lime-500 shadow-md flex flex-col my-links-holder m-5 md:m-0 h-2/4 justify-center items-center rounded-md overflow-y-auto">
            <div class="flex flex-col max-w-full md:w-4/5 p-2 md:p-0 h-4/5">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-0">
                        <div class="overflow-hidden rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">#</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Main Link</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Shortened Link</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Visits</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Send E-Mail?</th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($links as $link)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $link->id }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ $link->main_url }}" title="{{ $link->main_url }}" class="text-blue-500 hover:underline">{{ $link->main_url }}</a></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ url($link->shortened_url) }}" title="{{ url($link->shortened_url) }}" class="text-blue-500 hover:underline">{{ url($link->shortened_url) }}</a></td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $link->visits }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!! $link->send_email == 1 ? '<i class="bi bi-check-square-fill text-green-500 text-2xl"></i>' : '<i class="bi bi-slash-circle text-red-500 text-2xl"></i>'  !!}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-red-500">
                                            <form action="{{ url('delete-link/' . $link->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="p-2 bg-red-500 font-bold text-white rounded-xl">DEL</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:px-20 px-3 mt-5">
                <a href="{{ url('new-link') }}" title="Create a new shortened link..." class="p-3 text-white bg-green-600 rounded-xl shadow transition hover:bg-green-700 w-32 font-semibold block text-center float-right">New link</a>
            </div>
        </div>
    </div>
</x-layout>
