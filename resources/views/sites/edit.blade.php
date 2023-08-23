<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Site') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="p-4 sm:ml-64">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('site.update', $site->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="name_site" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Name</label>
                    <input type="text" id="name_site" name="name_site"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="{{ $site->name_site }}"
                        required>
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Save Changes
                </button>
            </form>

        </div>
    </div>

</x-app-layout>
