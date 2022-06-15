<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\Account\User;
use Filament\Facades\Filament;
use Filament\Forms\Components\Grid;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use App\Actions\Auth\RegisterUserAction;
use Illuminate\Validation\Rules\Password;
use App\View\Components\Layouts\Authentication;
use Filament\Forms\Concerns\InteractsWithForms;
use App\DataTransferObjects\AUth\RegisteringUserData;

/** @property ComponentContainer $form */
class Register extends Component implements HasForms
{
    use InteractsWithForms;

    public ?string $email = '';
    public ?string $password = '';
    public ?string $last_name = '';
    public ?string $first_name = '';
    public ?string $passwordConfirmation = '';

    public function mount()
    {
        $this->form->fill();
    }

    public function getFormSchema(): array
    {
        return [
            Grid::make(4)
                ->schema([
                        TextInput::make('first_name')
                            ->label(__('First name'))
                            ->placeholder(__('First name'))
                            ->required()
                            ->columnSpan(2),
                        TextInput::make('last_name')
                            ->label(__('Last name'))
                            ->placeholder(__('Last name'))
                            ->required()
                            ->columnSpan(2),
                        TextInput::make('email')
                            ->label(__('Email address'))
                            ->email()
                            ->unique(User::class)
                            ->placeholder(__('Email address'))
                            ->required()
                            ->columnSpan(4),
                        TextInput::make('password')
                            ->label(__('Password'))
                            ->password()
                            ->rules([Password::default()])
                            ->placeholder(__('Password'))
                            ->same('passwordConfirmation')
                            ->columnSpan(4)
                            ->required(
                                static fn ($livewire): bool => $livewire instanceof Register,
                            ),
                ]
            ),
        ];
    }

    public function registerUser(): RedirectResponse
    {
        $user = RegisterUserAction::execute(
            RegisteringUserData::fromArray(
                $this->form->getState()
            )
        );

        ($user->exists)
            ? static::successfulAccountCreation($user)
            : static::unSuccessfulAccountCreation();

        return redirect()->back();
    }

    protected static function successfulAccountCreation(User $user): void
    {
        Filament::notify(
            'success',
            __('Account created, Please check mail to verify account.')
        );
    }

    protected static function unSuccessfulAccountCreation(): void
    {
        Filament::notify(
            'danger',
            __('Unable to create account, Please try again later.')
        );
    }

    public function render(): View
    {
        return view('livewire.auth.register', [
            'title' => __('Sign up for an account')
        ])->layout(Authentication::class);
    }
}
