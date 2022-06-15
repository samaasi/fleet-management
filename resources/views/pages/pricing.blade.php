<x-layouts.base>
    <div class="bg-white dark:bg-gray-900">
        <div class="bg-gray-50 dark:bg-gray-900">
            <div class="relative">
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                    <div class="flex justify-between items-center border-b-2 border-gray-100 dark:border-gray-700 py-6 md:justify-start md:space-x-10">
                        <div class="flex justify-start lg:w-0 lg:flex-1">
                            <x-misc.logo class="text-3xl"/>
                        </div>
                        <div class="flex items-center justify-end space-x-8 md:flex-1 lg:w-0">
                            @auth
                            <a href="{{ route('dashboard') }}"
                               class="whitespace-nowrap text-base font-medium text-gray-400 hover:text-gray-500"
                            >
                                {{ __('Dashboard') }}
                            </a>
                            @endauth
                            <a href="{{ route('pages.pricing') }}"
                               class="whitespace-nowrap text-base font-medium text-gray-400 hover:text-gray-500"
                            >
                                {{ __('Pricing') }}
                            </a>
                            @guest
                            <a href="{{ route('login') }}"
                               class="whitespace-nowrap text-base font-medium text-indigo-300 hover:text-indigo-500"
                            >
                                {{ __('Sign in') }}
                            </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            {{-- Header section --}}
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-base font-semibold text-cyan-600 dark:text-indigo-600 uppercase tracking-wide">
                        {{ __('Pricing') }}
                    </h1>
                    <p class="mt-1 text-4xl font-extrabold text-gray-900 dark:text-gray-400 sm:text-5xl sm:tracking-tight lg:text-6xl">
                        {{ __('All-in-one fleet management') }}
                    </p>
                    <p class="max-w-xl mx-auto mt-5 text-xl text-gray-500">
                        {{ __('By managing your fleet on The Connected Operations Platform everyone from the field to the back office operates on the same real-time data.') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="relative bg-white dark:bg-gray-700">
            <div class="absolute inset-0" aria-hidden="true">
                <div class="absolute inset-y-0 right-0 w-1/2 bg-gray-900"></div>
            </div>
            <div class="relative max-w-7xl mx-auto lg:grid lg:grid-cols-2 lg:px-8">
                <div class="bg-white dark:bg-gray-700 rounded-tr-md rounded-br-md py-16 px-4 sm:py-24 sm:px-6 lg:px-0 lg:pr-8">
                    <div class="max-w-lg mx-auto lg:mx-0">
                        <h2 class="text-base font-semibold tracking-wide text-cyan-600 uppercase">
                            Full-featured
                        </h2>
                        <p class="mt-2 text-2xl font-extrabold text-gray-900 sm:text-3xl">
                            Everything you need to talk with your customers
                        </p>
                        <dl class="mt-12 space-y-10">
                            <div class="relative">
                                <dt>
                                    <div class="absolute h-12 w-12 bg-gradient-to-r from-cyan-600 to-green-400 rounded-md flex items-center justify-center">
                                        <x-icon-compliance class="h-6 w-6 text-white"/>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">
                                        {{ __('Simplified compliance in a centralized dashboard') }}
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    {{ __('Save time and money on compliance management. Simplify compliance across your operations with intuitive workflows to reduce administrative overhead and compliance risk.') }}
                                </dd>
                            </div>
                            <div class="relative">
                                <dt>
                                    <div class="absolute h-12 w-12 bg-gradient-to-r from-cyan-600 to-green-400 rounded-md flex items-center justify-center">
                                        <x-icon-compliance class="h-6 w-6 text-white"/>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">
                                        {{ __('Automated workflows to reduce day-to-day tasks') }}
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    {{ __('Streamline communication from the office to the field. Go paperless to simplify reporting and administration and maximize fleet productivity.') }}
                                </dd>
                            </div>

                            <div class="relative">
                                <dt>
                                    <div class="absolute h-12 w-12 bg-gradient-to-r from-cyan-600 to-green-400 rounded-md flex items-center justify-center">
                                        <x-icon-asset-security class="h-6 w-6 text-white"/>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">
                                        {{ __('Asset Security') }}
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    {{ __('Fleet uses geofencing to enhance asset security. Geofencing allows any internet-enabled device with a GPS or asset tracker application to set up a virtual boundary around a particular location using mapping technology. It also enables users to establish action triggers, such that when an asset enters or leaves the pre-defined boundaries, users receive an alert – either via text messages, emails, or push notifications') }}
                                </dd>
                            </div>

                            <div class="relative">
                                <dt>
                                    <div class="absolute h-12 w-12 bg-gradient-to-r from-cyan-600 to-green-400 rounded-md flex items-center justify-center">
                                        <x-icon-driver-behaviour class="h-6 w-6 text-white"/>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">
                                        {{ __('Driver Behaviour') }}
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    {{ __('Highly developed fleet management and vehicle telematics systems collect a full range of data in real-time and for transport and fleet managers. By combining received data from the vehicle tracking system and the on-board computer, it is possible to form a profile for any given driver (average speed, frequency of detours, breaks, severity of manoeuvres, choice of gears, etc.). This data can be used to highlight drivers with dangerous habits and to suggest remedial training applicable to the issues, or to ensure that drivers are meeting KPIs. Fleet management apps have shown to reduce driving incidents') }}
                                </dd>
                            </div>

                            <div class="relative">
                                <dt>
                                    <div class="absolute h-12 w-12 bg-gradient-to-r from-cyan-600 to-green-400 rounded-md flex items-center justify-center">
                                        <x-icon-send class="h-6 w-6 text-white"/>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">
                                        {{ __('Vehicle Maintenance') }}
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Tincidunt sollicitudin interdum nunc sit risus at bibendum vitae. Urna, quam ut sit justo non, consectetur et varius.
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-cyan-600 to-green-400 py-16 px-4 sm:py-24 sm:px-6 lg:bg-none lg:flex lg:items-center lg:justify-end lg:px-0 lg:pl-8">
                    <div class="max-w-lg mx-auto w-full space-y-8 lg:mx-0">
                        <div>
                            <h2 class="sr-only">Price</h2>
                            <p class="relative grid grid-cols-2">
                              <span class="flex flex-col text-center">
                                <span class="text-5xl font-extrabold text-white tracking-tight">{{ __('₦110K') }}</span>
                                <span class="mt-2 text-base font-medium text-cyan-100">{{ __('Per year') }}</span>
                              </span>
                                <span class="pointer-events-none absolute h-12 w-full flex items-center justify-center font-bold text-xl text-indigo-600" aria-hidden="true">
                                    {{ __('OR') }}
                                  </span>
                                <span>
                                <span class="flex flex-col text-center">
                                  <span class="text-5xl font-extrabold text-white tracking-tight">{{ __('₦10K') }}</span>
                                  <span class="mt-2 text-base font-medium text-cyan-100">{{ __('Per month') }}</span>
                                </span>
                              </span>
                            </p>
                        </div>
                        <ul role="list" class="rounded overflow-hidden grid gap-px sm:grid-cols-2">
                            <li class="bg-cyan-700 bg-opacity-50 py-4 px-4 flex items-center text-base text-white">
                                <x-icon-check class="h-6 w-6 text-cyan-200"/>
                                <span class="ml-3">{{ __('No per user fees') }}</span>
                            </li>

                            <li class="bg-cyan-700 bg-opacity-50 py-4 px-4 flex items-center text-base text-white">
                                <x-icon-check class="h-6 w-6 text-cyan-200"/>
                                <span class="ml-3">{{ __('Unlimited Cars') }}</span>
                            </li>

                            <li class="bg-cyan-700 bg-opacity-50 py-4 px-4 flex items-center text-base text-white">
                                <x-icon-check class="h-6 w-6 text-cyan-200"/>
                                <span class="ml-3">{{ __('Unlimited storage') }}</span>
                            </li>

                            <li class="bg-cyan-700 bg-opacity-50 py-4 px-4 flex items-center text-base text-white">
                                <x-icon-check class="h-6 w-6 text-cyan-200"/>
                                <span class="ml-3">{{ __('24/7 support') }}</span>
                            </li>

                            <li class="bg-cyan-700 bg-opacity-50 py-4 px-4 flex items-center text-base text-white">
                                <x-icon-check class="h-6 w-6 text-cyan-200"/>
                                <span class="ml-3">{{ __('Cancel any time') }}</span>
                            </li>

                            <li class="bg-cyan-700 bg-opacity-50 py-4 px-4 flex items-center text-base text-white">
                                <x-icon-check class="h-6 w-6 text-cyan-200"/>
                                <span class="ml-3">{{ __('14 days free') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <x-misc.own-it-section/>

        <x-misc.faqs/>

        <x-misc.cta/>

        <x-misc.footer/>
    </div>
</x-layouts.base>
