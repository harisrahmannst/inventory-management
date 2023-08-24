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


            <form action="{{ route('device.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="device_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device
                        Name</label>
                    <input type="text" id="device_name" name="device_name"
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
                            <option value="{{ $type->id }}">{{ $type->name_type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="device_brand_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                    <select id="device_brand_id" name="device_brand_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name_brand }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="serial_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                        Number</label>
                    <input type="text" id="serial_number" name="serial_number"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                </div>

                <div class="mb-6">
                    <label for="device_site_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site</label>
                    <select id="device_site_id" name="device_site_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($sites as $site)
                            <option value="{{ $site->id }}">{{ $site->name_site }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="device_location_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                    <select id="device_location_id" name="device_location_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name_location }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="device_rack_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rack</label>
                    <select id="device_rack_id" name="device_rack_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($racks as $rack)
                            <option value="{{ $rack->id }}">{{ $rack->name_rack }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="device_status"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device Status</label>
                    <select id="device_status" name="device_status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Digunakan">Digunakan</option>
                        <option value="Disewakan">Disewakan</option>
                        <option value="Idle">Idle</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="device_image">Upload file</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="device_image_help" id="device_image" name="device_image" type="file"
                        multiple>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="device_image_help">SVG, PNG, JPG or
                        GIF.</p>
                </div>

                <div class="mb-6">
                    <label for="device_describtion"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spesifikasi</label>
                    <textarea id="device_describtion" rows="4" name="device_describtion"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </div>

    <script>
        // Ambil elemen select site, location, dan rack
        var siteSelect = document.getElementById('device_site_id');
        var locationSelect = document.getElementById('device_location_id');
        var rackSelect = document.getElementById('device_rack_id');

        // Fungsi untuk menghapus semua opsi pada select location dan rack
        function clearLocationOptions() {
            locationSelect.innerHTML = '';
            clearRackOptions();
        }

        // Fungsi untuk menghapus semua opsi pada select rack
        function clearRackOptions() {
            rackSelect.innerHTML = '';
        }

        // Fungsi untuk menambahkan opsi location berdasarkan site yang dipilih
        function addLocationOption(locationId, locationName) {
            var option = document.createElement('option');
            option.value = locationId;
            option.textContent = locationName;
            locationSelect.appendChild(option);
        }

        // Fungsi untuk menambahkan opsi rack berdasarkan location yang dipilih
        function addRackOption(rackId, rackName) {
            var option = document.createElement('option');
            option.value = rackId;
            option.textContent = rackName;
            rackSelect.appendChild(option);
        }

        // Fungsi untuk mengatur opsi location berdasarkan site yang dipilih
        function updateLocationOptions() {
            var selectedSiteId = siteSelect.value;

            // Hapus semua opsi pada select location dan rack
            clearLocationOptions();

            // Tambahkan opsi location yang sesuai dengan site yang dipilih
            @foreach ($locations as $location)
                if ({{ $location->site_id }} == selectedSiteId) {
                    addLocationOption({{ $location->id }}, '{{ $location->name_location }}');
                }
            @endforeach
        }

        // Fungsi untuk mengatur opsi rack berdasarkan location yang dipilih
        function updateRackOptions() {
            var selectedLocationId = locationSelect.value;

            // Hapus semua opsi pada select rack
            clearRackOptions();

            // Tambahkan opsi rack yang sesuai dengan location yang dipilih
            @foreach ($racks as $rack)
                if ({{ $rack->location_id }} == selectedLocationId) {
                    addRackOption({{ $rack->id }}, '{{ $rack->name_rack }}');
                }
            @endforeach
        }

        // Event listener saat perubahan terjadi pada select site
        siteSelect.addEventListener('change', function() {
            // Perbarui opsi location dan rack
            updateLocationOptions();
            updateRackOptions();
        });

        // Event listener saat perubahan terjadi pada select location
        locationSelect.addEventListener('change', function() {
            // Perbarui opsi rack
            updateRackOptions();
        });

        // Inisialisasi opsi location dan rack berdasarkan site dan location yang dipilih saat halaman dimuat
        updateLocationOptions();
        updateRackOptions();
    </script>

</x-app-layout>
