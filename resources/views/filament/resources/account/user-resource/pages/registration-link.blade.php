<x-filament::page>
    <div class="flex flex-col space-y-6">
        <div>
            <x-form.form
                method="POST"
                class="space-y-4"
                wire:submit.prevent="">
                {{ $this->form }}

                <div class="flex justify-end items-center">
                    <x-buttons.primary
                        type="submit"
                        :value="__('Send')"
                    />
                </div>
            </x-form.form>
        </div>

        <div>
            {{ $this->table }}
        </div>
    </div>
</x-filament::page>
