<?php

namespace App\Filament\Resources\Account\UserResource\Pages;

use Filament\Facades\Filament;
use Filament\Forms\Components\Card;
use Illuminate\Support\Carbon;
use App\Models\Misc\Registration;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Illuminate\Http\RedirectResponse;
use Filament\Forms\Components\Section;
use Filament\Forms\ComponentContainer;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Concerns\InteractsWithTable;
use App\Filament\Resources\Account\UserResource;
use App\Actions\Auth\SendRegistrationLinkAction;
use App\DataTransferObjects\Auth\SendRegistrationLinkData;

/** @property ComponentContainer $form */
class RegistrationLink extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'icon-send';

    protected static string $resource = UserResource::class;

    protected static ?string $title = "Send Registration Link";

    protected static ?string $navigationLabel = "Send Registration Link";

    protected static string $view = 'filament.resources.account.user-resource.pages.registration-link';

    public function getFormSchema(): array
    {
        return [
            Section::make('Send Registration Link')
                ->id('sendLinkForm')
                ->description(__('Use the form below to send registration form link.'))
                ->schema([
                        Grid::make(6)->schema([
                            Select::make('form')
                                ->label(__('Form template'))
                                ->options(['Drivers Registration'])
                                ->required()
                                ->columnSpan(2),
                            DateTimePicker::make('duration')
                                ->label(__('Duration'))
                                ->helperText(__('How long should this link be active.'))
                                ->required()
                                ->default(now())
                                ->columnSpan(2),
                            TextInput::make('email')
                                ->label(__('Email address'))
                                ->placeholder(__('Email address'))
                                ->email()
                                ->required()
                                ->columnSpan(5),
                        ])
                ]
            )
        ];
    }

    public function sendRegistrationLink(): RedirectResponse
    {
        SendRegistrationLinkAction::execute(
            SendRegistrationLinkData::fromArray(
                $this->form->getState()
            )
        );

        $this->form->fill();

        Filament::notify(
            'success',
            __('Device successfully assigned.')
        );

        return redirect()->back();
    }

    public function getTableQuery(): Builder
    {
        return Registration::query();
    }

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('user.name')
                ->label(__('User')),
            TextColumn::make('type')
                ->label(__('Type')),
            TextColumn::make('duration')
                ->label(__('Duration'))
        ];
    }

    public function getTableActions(): array
    {
        return [

        ];
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'icon-link-send';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No links sent yet';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'You may send link using the form above.';
    }

    protected function getTableEmptyStateActions(): array
    {
        return [
            Action::make('create')
                ->label('Send Link')
                ->url('#sendLinkForm')
                ->icon('icon-send-alt')
                ->button(),
        ];
    }
}
