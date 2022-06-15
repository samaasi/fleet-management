<?php

namespace App\Filament\Resources\Account;

use App\Enums\Misc\ReligionEnum;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Account\Driver;
use Filament\Resources\Resource;
use App\Enums\Account\GenderEnum;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Textarea;
use App\Enums\Account\MaritalStatusEnum;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\HasManyRepeater;
use App\Filament\Resources\Account\DriverResource\Pages;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\Account\DriverResource\RelationManagers;

class DriverResource extends Resource
{
    protected static ?int $navigationSort = 3;

    protected static ?string $model = Driver::class;

    protected static ?string $navigationLabel = 'Drivers';

    protected static ?string $navigationGroup = 'Account';

    protected static ?string $navigationIcon = 'icon-driver-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(4)
                    ->schema([
                            Wizard::make([
                                Step::make('Personal')
                                    ->description(__('Driver Personal Information'))
                                    ->schema([
                                        Grid::make(6)
                                            ->schema([
                                                    SpatieMediaLibraryFileUpload::make('passport')
                                                        ->avatar()
                                                        ->collection(Driver::DRIVER_PASSPORT_MEDIA_COLLECTION)
                                                        ->columnSpan(6),
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
                                                    TextInput::make('other_name')
                                                        ->label(__('Other name'))
                                                        ->placeholder(__('Other name'))
                                                        ->columnSpan(2),
                                                    TextInput::make('mothers_maiden_name')
                                                        ->label(__('Mothers maiden name'))
                                                        ->placeholder(__('Mothers maiden name'))
                                                        ->helperText(__('Surname of your mother before she got married.'))
                                                        ->required()
                                                        ->columnSpan(3),
                                                    TextInput::make('national_identity_number')
                                                        ->label(__('NIN'))
                                                        ->placeholder(__('NIN'))
                                                        ->helperText(__('National Identification Number'))
                                                        ->required()
                                                        ->columnSpan(3),
                                                    DatePicker::make('date_of_birth')
                                                        ->label(__('Date of birth'))
                                                        ->required()
                                                        ->columnSpan(2),
                                                    Select::make('gender')
                                                        ->label(__('Gender'))
                                                        ->placeholder(__('Select gender'))
                                                        ->options(GenderEnum::options())
                                                        ->required()
                                                        ->columnSpan(2),
                                                    Select::make('marital_status')
                                                        ->label(__('Marital status'))
                                                        ->options(MaritalStatusEnum::options())
                                                        ->placeholder(__('Select marital status'))
                                                        ->required()
                                                        ->columnSpan(2),
                                                    TextInput::make('place_of_birth')
                                                        ->label(__('Place of birth'))
                                                        ->placeholder(__('Place of birth'))
                                                        ->helperText(__('Where they gave birth to you.'))
                                                        ->required()
                                                        ->columnSpan(4),
                                                    Select::make('religion')
                                                        ->label(__('Religion'))
                                                        ->placeholder(__('Select religion'))
                                                        ->options(ReligionEnum::options())
                                                        ->required()
                                                        ->columnSpan(2),
                                                    TextInput::make('nationality')
                                                        ->label(__('Nationality'))
                                                        ->placeholder(__('Nationality'))
                                                        ->required()
                                                        ->columnSpan(2),
                                                    TextInput::make('state_of_origin')
                                                        ->label(__('State of origin'))
                                                        ->placeholder(__('State of origin'))
                                                        ->required()
                                                        ->columnSpan(2),
                                                    TextInput::make('local_govt')
                                                        ->label(__('Local govt.'))
                                                        ->placeholder(__('Local govt.'))
                                                        ->required()
                                                        ->columnSpan(2),
                                                    TextInput::make('community')
                                                        ->label(__('Community'))
                                                        ->placeholder(__('Community'))
                                                        ->required()
                                                        ->columnSpan(3),
                                                    TextInput::make('compound_name')
                                                        ->label(__('Compound name'))
                                                        ->placeholder(__('Compound name'))
                                                        ->required()
                                                        ->columnSpan(3),
                                            ]
                                        ),
                                        ]
                                    ),
                                Step::make('Contact')
                                    ->description(__('Driver Contact Information'))
                                    ->schema([
                                        HasManyRepeater::make('contacts')
                                            ->label(__(''))
                                            ->relationship('contacts')
                                            ->schema([
                                                Grid::make(4)
                                                    ->schema([
                                                        TextInput::make('address')
                                                            ->label(__('Address'))
                                                            ->placeholder(__('Address'))
                                                            ->columnSpan(4),
                                                        TextInput::make('nearest_bus_stop')
                                                            ->label(__('Nearest Bus Stop / Landmark'))
                                                            ->placeholder(__('Nearest Bus Stop / Landmark'))
                                                            ->columnSpan(4),
                                                        TextInput::make('city')
                                                            ->label(__('City'))
                                                            ->placeholder(__('City'))
                                                            ->columnSpan(2),
                                                        TextInput::make('local_govt')
                                                            ->label(__('Local Govt.'))
                                                            ->placeholder(__('Local Govt.'))
                                                            ->columnSpan(1),
                                                        TextInput::make('state')
                                                            ->label(__('State'))
                                                            ->placeholder(__('State'))
                                                            ->columnSpan(1),
                                                        TextInput::make('phone')
                                                            ->label(__('Phone number'))
                                                            ->placeholder(__('Phone number'))
                                                            ->columnSpan(2),
                                                        TextInput::make('email')
                                                            ->label(__('Email address'))
                                                            ->placeholder(__('Email address'))
                                                            ->columnSpan(2),
                                                        Textarea::make('note')
                                                            ->label(__('Description'))
                                                            ->placeholder(__('Description'))
                                                            ->helperText(__('Additional note to locate address.'))
                                                            ->columnSpan(4),
                                                        Toggle::make('default')
                                                            ->label(__('Make current'))
                                                            ->columnSpan(1)

                                                    ]
                                                )
                                            ]
                                        )
                                        ->collapsible()
                                        ->minItems(1)
                                        ->maxItems(4)
                                        ]
                                    ),
                                Step::make('Guarantor')
                                    ->description(__('Driver Guarantor Information'))
                                    ->schema([
                                            HasManyRepeater::make('guarantors')
                                                ->label(__(''))
                                                ->relationship('guarantors')
                                                ->schema([
                                                    Grid::make(6)->schema([
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
                                                        TextInput::make('other_name')
                                                            ->label(__('Other name'))
                                                            ->placeholder(__('Other name'))
                                                            ->columnSpan(2),
                                                        SpatieMediaLibraryFileUpload::make('documents')
                                                            ->collection('documents')
                                                            ->multiple()
                                                            ->minFiles(2)
                                                            ->maxFiles(5),
                                                        /*TextInput::make('')
                                                            ->label(__(''))
                                                            ->placeholder(__(''))
                                                            ->required(),
                                                        'national_identification_number'
                                                        'gender'
                                                        'date_of_birth'
                                                        'phone'
                                                        'email'
                                                        'bank_name'
                                                        'bank_account_number'
                                                        'employment_status'
                                                        'financial_status'
                                                        'employer_address'
                                                        'address'
                                                        'city'
                                                        'state'
                                                        'country'
                                                        'relationship'*/
                                                    ])
                                                ])
                                                ->minItems(3)
                                                ->maxItems(5)
                                                ->collapsible()

                                        ]
                                    )
                            ])->columnSpan(4)
                    ]
                )
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\DriverAddressesRelationManager::class,
            RelationManagers\DriverLicensesRelationManager::class,
            RelationManagers\DriverGuarantorsRelationManager::class,
            // TODO Document upload relationship manager
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDrivers::route('/'),
            'create' => Pages\CreateDriver::route('/create'),
            'edit' => Pages\EditDriver::route('/{record}/edit'),
        ];
    }
}
