<x-layouts.base>
    <div class="min-h-full relative flex flex-col justify-center py-10 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <x-misc.logo class="text-7xl"/>
            <h2 class="mt-10 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-500">
                {{ $title ?? null }}
            </h2>
            <p class="mt-2 text-center text-sm text-gray-500">
                {{ __('Improving efficiency, while reducing associated risk in fleet management.') }}
            </p>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-md">
            {{ $slot ?? null }}
        </div>
        <x-misc.powered-by/>
    </div>
</x-layouts.base>
