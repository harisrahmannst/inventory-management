<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Devices') }}
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


            <form action="{{ route('device.update', $device->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="device_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device
                        Name</label>
                    <input type="text" id="device_name" name="device_name" value="{{ $device->device_name }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                </div>

                {{-- Form Untuk tipe perangkat --}}
                <div class="mb-6">
                    <label for="device_type_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                    <select id="device_type_id" name="device_type_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                                {{ $device->device_type_id == $type->id ? 'selected' : '' }}>{{ $type->name_type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="device_brand_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                    <select id="device_brand_id" name="device_brand_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}"
                                {{ $device->device_brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name_brand }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="serial_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                        Number</label>
                    <input type="text" id="serial_number" name="serial_number" value="{{ $device->serial_number }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                </div>

                <div class="mb-6">
                    <label for="device_site_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site</label>
                    <select id="device_site_id" name="device_site_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($sites as $site)
                            <option value="{{ $site->id }}"
                                {{ $device->device_site_id == $site->id ? 'selected' : '' }}>{{ $site->name_site }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="device_location_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                    <select id="device_location_id" name="device_location_id" value="{{ $device->device_name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}"
                                {{ $device->device_location_id == $location->id ? 'selected' : '' }}>
                                {{ $location->name_location }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="device_rack_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rack</label>
                    <select id="device_rack_id" name="device_rack_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($racks as $rack)
                            <option value="{{ $rack->id }}"
                                {{ $device->device_rack_id == $rack->id ? 'selected' : '' }}>
                                {{ $rack->name_rack }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="device_status"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device Status</label>
                    <select id="device_status" name="device_status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Digunakan" {{ $device->device_status == 'Digunakan' ? 'selected' : '' }}>
                            Digunakan</option>
                        <option value="Disewakan" {{ $device->device_status == 'Disewakan' ? 'selected' : '' }}>
                            Disewakan</option>
                        <option value="Idle" {{ $device->device_status == 'Idle' ? 'selected' : '' }}>Idle</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="device_image">Upload file</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="device_image_help" id="device_image" name="device_image" type="file"
                        value="{{ $device->device_image ?? '' }}">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="device_image_help">SVG, PNG, JPG or
                        GIF.</p>
                </div>

                <div class="mb-6">
                    <label for="device_describtion"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spesifikasi</label>
                    <textarea id="device_describtion" rows="4" name="device_describtion"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $device->device_describtion }}</textarea>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
