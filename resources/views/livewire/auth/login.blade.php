<div>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>

    <x-form.form
        method="POST"
        class="space-y-6"
        wire:submit.prevent="authenticate"
    >
        {{ $this->form }}

        <div class="flex justify-end items-center">
            <x-buttons.primary
                type="submit"
                :value="__('Login')"
            />
        </div>
    </x-form.form>
</div>
