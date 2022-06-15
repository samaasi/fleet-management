<?php

namespace App\Filament\Resources\Automobile;

use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use App\Models\Automobile\VehicleMaintenance;
use App\Filament\Resources\Automobile\MaintenanceResource\Pages;
use App\Filament\Resources\Automobile\MaintenanceResource\RelationManagers;

class MaintenanceResource extends Resource
{
    protected static ?int $navigationSort = 5;

    protected static ?string $label = "Maintenance Log";

    protected static ?string $navigationGroup = 'Automobile';

    protected static ?string $model = VehicleMaintenance::class;

    protected static ?string $navigationIcon = 'icon-maintenance';

    protected static ?string $navigationLabel = 'Maintenance Logs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([// add vehicle id for only create page and relationManager
                Grid::make(6)->schema([
                    DateTimePicker::make('date_of_service')
                        ->label(__('Date of service'))
                        ->required()
                        ->columnSpan(2),
                    TextInput::make('mileage_at_service')
                        ->label(__('Mileage'))
                        ->placeholder(__('Mileage'))
                        ->helperText(__('Mileage at service time.'))
                        ->required()
                        ->columnSpan(2),
                    TextInput::make('service_provider')
                        ->label(__('Name of service provider'))
                        ->placeholder(__('Service provider'))
                        ->required()
                        ->columnSpan(6),
                    Textarea::make('note')
                        ->label(__('Note'))
                        ->placeholder(__('Write something notable..'))
                        ->hint(__('Optional'))
                        ->columnSpan(6),
                    TextInput::make('cost')
                        ->required()
                        ->columnSpan(2), // Remove bcus it should be calculated automatically from service render.
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date_of_service')
                    ->label(__('Date of service')),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MaintenanceServicesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaintenances::route('/'),
            'create' => Pages\CreateMaintenance::route('/create'),
            'edit' => Pages\EditMaintenance::route('/{record}/edit'),
        ];
    }
}
