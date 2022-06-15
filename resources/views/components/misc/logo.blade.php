<div class="flex justify-center items-center">
    <a href="{{ route('welcome') }}"
       {{ $attributes->merge(['class' => 'font-medium tracking-widest text-gray-700 dark:text-indigo-300 no-underline']) }}
    >
        {{ __('Fleet') }}
    </a>
</div>
