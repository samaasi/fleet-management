<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Livewire\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\ComponentContainer;
use App\Providers\RouteServiceProvider;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use App\View\Components\Layouts\Authentication;
use Filament\Forms\Concerns\InteractsWithForms;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

/** @property ComponentContainer $form */
class Login extends Component implements HasForms
{
    use WithRateLimiting;
    use InteractsWithForms;

    public ?string $email = '';
    public ?string $password = '';
    public ?bool $remember = false;

    public function mount()
    {
        if (Auth::check()) {
            redirect()->intended(RouteServiceProvider::HOME);
        }

        $this->form->fill();
    }

    public function authenticate(): RedirectResponse|Redirector|null
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->addError('email', __('filament::login.messages.throttled', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => ceil($exception->secondsUntilAvailable / 60),
            ]));

            return null;
        }

        $data = $this->form->getState();

        if (! Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ], $data['remember'])) {
            $this->addError('email', __('Unable to login'));

            return null;
        }

        return redirect(RouteServiceProvider::HOME);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label(__('Email address'))
                ->email()
                ->required()
                ->placeholder(__('Email address'))
                ->autocomplete(),
            TextInput::make('password')
                ->label(__('Password'))
                ->hint('[Forgot password?](forgot-password)')
                ->password()
                ->placeholder(__('Password'))
                ->required(),
            Checkbox::make('remember')
                ->label(__('Remember me')),
        ];
    }

    public function render(): View
    {
        return view('livewire.auth.login', [
            'title' => __('Sign in to your account')
        ])->layout(Authentication::class);
    }
}
