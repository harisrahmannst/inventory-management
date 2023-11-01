<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="p-4 sm:ml-0">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <section class="bg-white dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">


                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div>
                                <a href="#"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Total Device</h5>
                                    <dt class="mb-2 text-3xl font-extrabold">{{ $deviceCount }}</dt>
                                </a>
                            </div>

                            <div>

                                <a href="#"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Total Racks</h5>
                                    <dt class="mb-2 text-3xl font-extrabold">{{ $rackCount }}</dt>
                                </a>

                            </div>

                            <div>

                                <a href="#"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Total Site</h5>
                                    <dt class="mb-2 text-3xl font-extrabold">{{ $siteCount }}</dt>
                                </a>

                            </div>
                            <div>

                                <a href="#"
                                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Total Location</h5>
                                    <dt class="mb-2 text-3xl font-extrabold">{{ $locationCount }}</dt>
                                </a>

                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>

        <figure class="max-w-screen-md mx-auto text-center">
            <svg class="w-10 h-10 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                <path
                    d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
            </svg>
            <blockquote>
                <p class="text-2xl italic font-medium text-gray-900 dark:text-white">"Memberikan layanan e-Business yang
                    inovatif, berstandar internasional dengan menjunjung tinggi Good Corporate Governance untuk
                    memberikan nilai tambah berkelanjutan bagi stakeholder."</p>
            </blockquote>
            <figcaption class="flex items-center justify-center mt-6 space-x-3">
                <img class="w-6 h-6 rounded-full" src="https://www.svgrepo.com/show/223967/profits-statistics.svg"
                    alt="profile picture">
                <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                    <cite class="pr-3 font-medium text-gray-900 dark:text-white">PT. EDI Indonesia</cite>
                    <cite class="pl-3 text-sm text-gray-500 dark:text-gray-400">Bina Nusantara</cite>
                </div>
            </figcaption>
        </figure>

    </div>

</x-app-layout>
