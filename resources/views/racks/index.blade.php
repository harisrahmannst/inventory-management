<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Racks') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="p-4 sm:ml-64">

            @if (session('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert" id="success-alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif
            
            <form action="{{ route('rack.create') }}" method="get">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    New</button>
            </form>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Rack Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Lcoation Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Create At
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($racks as $rack)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $rack->name_rack }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $rack->location->name_location }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $rack->created_at->format('d F Y H:i') }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <a href="{{ route('rack.edit', $rack->id) }}"
                                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                            Edit
                                        </a>
                                        <a href="{{ route('rack.destroy', $rack->id) }}" 
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" 
                                            onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this Rack?')) document.getElementById('delete-form-{{ $rack->id }}').submit();">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $rack->id }}" action="{{ route('rack.destroy', $rack->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
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

    <script>
        // Automatically close the success alert after 3 seconds
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 3000);
    </script>
</x-app-layout>

