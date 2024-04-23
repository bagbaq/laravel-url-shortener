<x-layout>
    <div class="p-10 md:grid md:grid-cols-2">
        <div class="bg-green-500 h-48 flex items-center px-10">
            <div class="flex flex-col">
                <h1 class="text-4xl font-bold text-white">URL Shortener Service!</h1>
                <p class="text-white italic">Shorten your link in seconds...</p>
            </div>
        </div>
        <div class="bg-blue-500 md:px-6 lg:px-10 pt-10">
            <form class="md:w-2/5 md:rounded-xl shadow-xl h-50 bg-gray-500 md:absolute p-10" action="{{ url('new-link') }}" method="GET">
                <x-form.input name="URL" form_name="url" placeholder="Enter your loong link right here..." icon="bi bi-link-45deg"></x-form.input>
                <button type="submit" class="bg-green-400 p-5 text-white font-bold rounded-xl w-full shadow-xl hover:bg-green-500 transition">Shorten!</button>
            </form>
        </div>
    </div>

    <div class="p-10 md:mt-32 mt-10 bg-blue-300 md:px-48 px-16">
        <h1 class="text-4xl font-bold text-white">URL-SH is a,</h1>
        <p class="mt-3 text-white italic">
            fast and free url shorting service. You can transform your ugly social media links, website links to beautiful 4-20 character links in seconds! Although using our service is free, you still need to create a membership.
        </p>
    </div>

    <div class="w-full h-80">
        <img src="{{ asset('media/home-bg-1.jpg') }}" alt="URL Shortener Service" class="w-full h-full object-cover">
    </div>
</x-layout>
