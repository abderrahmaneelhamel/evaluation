<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectResource\Pages;
use App\Filament\Resources\SubjectResource\RelationManagers;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject_name')->label('subject name')
                    ->required(),
                Forms\Components\TextInput::make('subject_year')->label('subject year')
                    ->required()
                    ->numeric(),
                Select::make('level_id')->relationship('level_id','level_name')->searchable()->preload()->label('level name')->required(),
                Select::make('professeur_id')->relationship('professeur_id','name')->searchable()->preload()->label('professeur')->required(),
                Select::make('semester_id')->relationship('semester_id','semester_name')->searchable()->preload()->label('semester name')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                tables\Columns\TextColumn::make('subject_name')->sortable()->label('subject name'),
                tables\Columns\TextColumn::make('subject_year')->sortable()->label('subject year'),
                tables\Columns\TextColumn::make('level_id.level_name')->sortable()->label('level'),
                tables\Columns\TextColumn::make('semester_id.semester_name')->sortable()->label('semester'),
                tables\Columns\TextColumn::make('professeur_id.name')->sortable()->label('professeur'),
                tables\Columns\TextColumn::make('created_at')->sortable()->label('created at'),
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
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubject::route('/create'),
            'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }    
}
