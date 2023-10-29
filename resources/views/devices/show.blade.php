<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Devices') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="p-4 sm:ml-64">

            <div class="bg-white">
                <div class="pt-6">

                    <!-- Image gallery -->
                    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                        <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
                            <img src="{{ asset('storage/images/qrcodes/' . $device->device_name . '.png') }}"
                                alt="QR Code">
                        </div>

                        {{-- <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                            <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                                <img src="/storage/images/{{ $device->device_image }}" alt="Device Image">
                            </div>
                            <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg"
                                    alt="Model wearing plain gray basic tee."
                                    class="h-full w-full object-cover object-center">
                            </div>
                        </div> --}}

                        <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                            <img src="/storage/images/{{ $device->device_image }}" alt="Device Image">
                        </div>
                    </div>

                    <!-- Product info -->
                    <div
                        class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Description
                            </h1>
                        </div>

                        <!-- Options -->
                        <div class="mt-4 lg:row-span-3 lg:mt-0">
                            <p class="text-3xl tracking-tight text-gray-900">{{ $device->device_name }}</p>
                            <form class="mt-10">
                                <!-- Colors -->
                                <div>

                                    <div class="woocommerce-product-details__short-description">
                                        <p><strong>Serial Number</strong><br>
                                            {{ $device->serial_number }}</p>

                                        <p><strong>Status</strong><br>
                                            {{ $device->device_status }}</p>

                                        <p><strong>Type</strong><br>
                                            {{ $device->types->name_type }}</p>

                                        <p><strong>Brand</strong><br>
                                            {{ $device->brands->name_brand }}</p>

                                        <p><strong>Site</strong><br>
                                            {{ $device->sites->name_site }}</p>

                                        <p><strong>Location</strong><br>
                                            {{ $device->locations->name_location }}</p>

                                        <p><strong>Rack</strong><br>
                                            {{ $device->racks->name_rack }}</p>

                                    </div>
                                </div>

                                <!-- Sizes -->
                                <div class="mt-10">
                                    <div class="flex items-center justify-between">
                                    </div>

                                    <fieldset class="mt-4">
                                        <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">

                                            <span class="pointer-events-none absolute -inset-px rounded-md"
                                                aria-hidden="true"></span>
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                            </form>
                        </div>

                        <div
                            class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                            <!-- Description and details -->
                            <div>
                                <h3 class="sr-only">Description</h3>

                                <div class="space-y-6">
                                    <p class="text-base text-gray-900">{{ $device->device_describtion }}</p>
                                </div>
                            </div>

                            <div class="mt-10">

                            </div>
                        </div>

                        {{-- <div class="mt-10">
                                <h2 class="text-sm font-medium text-gray-900">Details</h2>

                                <div class="mt-4 space-y-6">
                                    <p class="text-sm text-gray-600">The 6-Pack includes two black, two white, and two
                                        heather gray Basic Tees. Sign up for our subscription service and be the first
                                        to get new, exciting colors, like our upcoming &quot;Charcoal Gray&quot; limited
                                        release.</p>
                                </div>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</x-app-layout>
