<footer class="bg-gray-900">
    <div class="max-w-7xl mx-auto py-6 md:py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="sr-only">{{ __('Footer') }}</h2>
        <div class="flex items-center justify-between">
            <div class="flex order-2 text-indigo-600">
                <a href="{{ route('welcome') }}"
                   class="text-xs font-semibold uppercase text-indigo-300 no-underline"
                >
                    <span class="text-gray-400">{{ __('Powered By: ') }}</span>
                    <span>{{ __(' SED Initiative') }}</span>
                </a>
            </div>
            <p class="text-base text-gray-400">
                &copy; {{ Date('Y') }} {{ __('Fleet.') }}
            </p>
        </div>
    </div>
</footer>
