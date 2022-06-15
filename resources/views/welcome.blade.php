<x-layouts.base>
    <div class="bg-gray-900">
        <header>
            <div class="relative">
                <div class="flex justify-between items-center max-w-7xl mx-auto px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <x-misc.logo class="text-3xl"/>
                    </div>
                    <div class="flex items-center justify-end md:flex-1 lg:w-0 space-x-3">
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
        </header>

        <main>
            <div>
                <div class="relative">
                    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-900"></div>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
                            <div class="absolute inset-0">
                                <img class="h-full w-full object-cover"
                                     src="{{ asset('images/welcome-image.jpg') }}"
                                     alt="Fleet management hero image"
                                />
                                <div class="absolute inset-0 bg-indigo-700 mix-blend-multiply"></div>
                            </div>
                            <div class="relative px-4 py-10 sm:px-6 sm:py-16 lg:py-24 lg:px-8">
                                <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                                    <span class="block text-white">
                                        {{ __('Take control of your') }}
                                    </span>
                                    <span class="block text-indigo-200 capitalize">
                                        {{ __('fleet') }}
                                    </span>
                                </h1>
                                <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">
                                    {{ __('Fleet gives your business all the relevant information on the performance of your fleet whenever you want it. In effect, it is a sophisticated database with numerous applications that enables you to record and report the key attributes that can help improve efficiencies and drive down costs by reducing downtime and improving productivity.') }}
                                </p>
                                <x-misc.powered-by/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layouts.base>
