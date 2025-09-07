<?php

namespace App\Filament\Admin\Resources\Patients\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PatientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Información Personal')
                ->columns(2)
                ->schema([
                    TextInput::make('first_name')
                        ->label('Nombres')
                        ->required(),

                    TextInput::make('last_name')
                        ->label('Apellidos')
                        ->required(),

                    TextInput::make('document_number')
                        ->label('Nº Documento (RUT/DNI)')
                        ->required()
                        ->unique(ignoreRecord: true),

                    DatePicker::make('birth_date')
                        ->label('Fecha de Nacimiento'),
                ]),

            Section::make('Información de Contacto')
                ->columns(2)
                ->schema([
                    TextInput::make('email')
                        ->label('Correo Electrónico')
                        ->email(),

                    TextInput::make('phone')
                        ->label('Teléfono'),
                ]),

            Textarea::make('address')
                ->label('Dirección')
                ->columnSpanFull(),
        ]);
    }
}