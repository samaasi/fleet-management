<?php

namespace App\Filament\Resources\Automobile;

use Filament\Resources\Form;
use App\Models\Account\Owner;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\Automobile\Vehicle;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use App\Support\Generators\VehicleID;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Enums\Automobile\VehicleMode;
use Filament\Forms\Components\Placeholder;
use App\Enums\Automobile\VehicleColor;
use App\Enums\Automobile\VehicleDriveType;
use App\Enums\Automobile\VehicleBodyType;
use App\Enums\Automobile\VehicleCylinder;
use App\Enums\Automobile\VehicleFuelType;
use App\Enums\Automobile\VehicleGearBoxType;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\Automobile\VehicleResource\Pages;
use App\Filament\Resources\Automobile\VehicleResource\RelationManagers;

class VehicleResource extends Resource
{
    protected static ?int $navigationSort = 4;

    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'icon-car';

    protected static ?string $navigationGroup = "Automobile";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([// Add column for ID generation.
                Grid::make(4)->schema([
                    Select::make('owner_id')
                        ->label(__('Owner'))
                        ->searchable()
                        ->options(Owner::query()->get()->pluck('email', 'id')->toArray())
                        ->placeholder(__('Select owner'))
                        ->columnSpan(1),
                    Placeholder::make('')->columnSpan(2),
                    Toggle::make('advanced')
                        ->label('')
                        ->reactive()->default(true)
                        ->extraAttributes(['class' => 'mt-4'])
                        ->helperText('Toggle advanced inputs.')
                        ->columnSpan(1),
                    Section::make('BASIC')->schema([
                        Grid::make(12)->schema([
                            TextInput::make('make')
                                ->label(__('Make'))
                                ->placeholder(__('Make'))
                                ->required()
                                ->columnSpan(4),
                            TextInput::make('model')
                                ->label(__('Model'))
                                ->placeholder(__('Model'))
                                ->required()
                                ->columnSpan(4),
                            Select::make('body_type')
                                ->label(__('Body type'))
                                ->searchable()
                                ->options(VehicleBodyType::options())
                                ->placeholder(__('Type'))
                                ->required()
                                ->columnSpan(2),
                            Select::make('color')
                                ->label(__('Color'))
                                ->searchable()
                                ->options(VehicleColor::options())
                                ->placeholder(__('Color'))
                                ->required()
                                ->columnSpan(2),
                            TextInput::make('engine_number')
                                ->label(__('Engine number'))
                                ->placeholder(__('Engine number'))
                                ->required()
                                ->columnSpan(3),
                            TextInput::make('engine_type')
                                ->label(__('Engine type'))
                                ->placeholder(__('Engine type'))
                                ->hint(__('Optional'))
                                ->columnSpan(3),
                            TextInput::make('vehicle_identification_number')
                                ->label(__('Vehicle identification number'))
                                ->placeholder(__('Vehicle identification number'))
                                ->required()
                                ->columnSpan(4),
                            TextInput::make('initial_mileage')
                                ->label(__('Initial mileage'))
                                ->placeholder(__('Initial mileage'))
                                ->required()
                                ->columnSpan(2),
                            TextInput::make('series')
                                ->label(__('Model series'))
                                ->placeholder(__('Model series'))
                                ->columnSpan(2),
                            Select::make('gear_box_type')
                                ->label(__('Gear box type'))
                                ->searchable()
                                ->default(__('Automatic'))
                                ->options(VehicleGearBoxType::options())
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(3),
                            Select::make('drive_type')
                                ->label(__('Drive type'))
                                ->options(VehicleDriveType::options())
                                ->placeholder(__('Drive type'))
                                ->hint(__('Optional'))
                                ->default(__('AWD'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(2),
                            Placeholder::make('')->hidden(fn ($get) => !$get('advanced'))->columnSpan(5),
                            TextInput::make('chassis_number')
                                ->label(__('Chassis number'))
                                ->placeholder(__('Chassis number'))
                                ->required()
                                ->columnSpan(4),
                            Select::make('mode')
                                ->label(__('Mode'))
                                ->options(VehicleMode::options())
                                ->default(__('active'))
                                ->placeholder(__('Select mode'))
                                ->required()
                                ->columnSpan(2),
                            TextInput::make('usage_type')
                                ->label(__('Usage type'))
                                ->placeholder(__('Usage type Eg. Taxi'))
                                ->columnSpan(3),
                        ])
                    ]),

                    SpatieMediaLibraryFileUpload::make('IMAGES')
                        ->image()
                        ->multiple()
                        ->maxFiles(6)
                        ->hint(__('Optional'))
                        ->enableReordering()
                        ->collection(Vehicle::VEHICLES_MEDIA_COLLECTION)
                        ->placeholder(__('Click to select images for upload.'))
                        ->columnSpan(4),

                    Section::make('FUEL ECONOMY AND EMISSION')->schema([
                        Grid::make(4)->schema([
                            Select::make('fuel_type')
                                ->label(__('Fuel type'))
                                ->searchable()
                                ->default(__('Petrol'))
                                ->options(VehicleFuelType::options())
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(1),
                            TextInput::make('average_consumption')
                                ->label(__('Avg cnsmpt (L/100 KM)'))
                                ->placeholder(__('Average consumption'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(1),
                            TextInput::make('carbon_emissions')
                                ->label(__('CO2 emissions (G/KM)'))
                                ->placeholder(__('CO2 emissions'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(1),
                            TextInput::make('range')
                                ->label(__('Range (KM)'))
                                ->placeholder(__('Range'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(1),
                        ])
                    ]),

                    Section::make('PERFORMANCE')->schema([
                        Grid::make(4)->schema([
                            TextInput::make('top_speed')
                                ->label(__('Top speed (KM/H)'))
                                ->placeholder(__('Top speed'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(2),
                        ])
                    ]),

                    Section::make('DIMENSION')->schema([
                        Grid::make(6)->schema([
                            TextInput::make('length')
                                ->label(__('Length (CM)'))
                                ->placeholder(__('Length'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(2),
                            TextInput::make('height')
                                ->label(__('Height (CM)'))
                                ->placeholder(__('Height'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(2),
                            TextInput::make('curb_weight')
                                ->label(__('Curb weight (KG)'))
                                ->placeholder(__('Curb weight'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(2),
                            TextInput::make('maximum_towing_capacity_weight')
                                ->label(__('Maximum towing capacity weight (KG)'))
                                ->placeholder(__('Maximum towing capacity weight'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(3),
                            TextInput::make('trunk_capacity')
                                ->label(__('Trunk / boot capacity (L)'))
                                ->placeholder(__('Trunk / boot capacity'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(3),
                        ])
                    ]),

                    Section::make('ENGINE AND TRANSMISSION')->schema([
                        Grid::make(4)->schema([
                            TextInput::make('engine_size')
                                ->label(__('Engine size (CM3)'))
                                ->placeholder(__('Engine size'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(1),
                            Select::make('number_of_cylinder')
                                ->label(__('No. of cylinder'))
                                ->placeholder(__('No. of cylinder'))
                                ->options(VehicleCylinder::options())
                                ->default(4)
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(1),
                            TextInput::make('engine_output')
                                ->label(__('Engine output (PS)'))
                                ->placeholder(__('Engine output'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(1),
                            TextInput::make('torque')
                                ->label(__('Torque (NM)'))
                                ->placeholder(__('Torque'))
                                ->hint(__('Optional'))
                                ->visible(fn ($get) => $get('advanced'))
                                ->columnSpan(1),
                        ])
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('owner_id')
                    ->label(__('Owner')),
                TextColumn::make('make')
                    ->label(__('Make')),
                TextColumn::make('model')
                    ->label(__('Model')),
                TextColumn::make('body_type')
                    ->label(__('Body type')),
                TextColumn::make('color')
                    ->label(__('Color')),
                TextColumn::make('series')
                    ->label(__('Model series')),
                TextColumn::make('engine_number')
                    ->label(__('Engine number')),
                TextColumn::make('engine_type')
                    ->label(__('Engine type')),
                TextColumn::make('vehicle_identification_number')
                    ->label(__('Vehicle identification number')),
                TextColumn::make('chassis_number')
                    ->label(__('Chassis number')),
                TextColumn::make('initial_mileage')
                    ->label(__('Initial mileage')),
                TextColumn::make('mode')
                    ->label(__('Mode')),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\VehicleLicensesRelationManager::class,
            RelationManagers\VehicleMaintenancesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }
}
