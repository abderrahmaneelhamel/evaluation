<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActionResource\Pages;
use App\Filament\Resources\ActionResource\RelationManagers;
use App\Models\Action;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActionResource extends Resource
{
    protected static ?string $model = Action::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('action_name')
                    ->required(),
                Select::make('professeur_id')->relationship('professeur_id','name')->searchable()->preload()->label('professeur')->required(),
                Select::make('subject_id')->relationship('subject_id','subject_name')->searchable()->preload()->label('subject name')->required(),
                Select::make('survey_id')->relationship('survey_id','id')->searchable()->preload()->label('survey id')->required(),
                Forms\Components\Textarea::make('action_description')
                    ->required(),
                Forms\Components\DatePicker::make('action_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('action_name')
                    ->searchable(),
                tables\Columns\TextColumn::make('professeur_id.name')->sortable()->label('professeur'),
                tables\Columns\TextColumn::make('subject_id.subject_name')->sortable()->label('subject'),
                tables\Columns\TextColumn::make('survey_id.id')->sortable()->label('survey'),
                Tables\Columns\TextColumn::make('action_description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('action_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActions::route('/'),
            'create' => Pages\CreateAction::route('/create'),
            'edit' => Pages\EditAction::route('/{record}/edit'),
        ];
    }    
}
