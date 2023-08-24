<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('branch_name')->label('branch name')
                    ->required(),
                Forms\Components\TextInput::make('branch_code')->label('branch code')
                    ->required(),
                Forms\Components\TextInput::make('levels_nbr')->label('branch_number')
                    ->required(),
                Select::make('faculty_id')->relationship('faculty_id','faculty_name')->searchable()->preload()->label('faculty name')->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                tables\Columns\TextColumn::make('branch_name')->sortable()->label('branch name'),
                tables\Columns\TextColumn::make('branch_code')->sortable()->label('branch code'),
                tables\Columns\TextColumn::make('levels_nbr')->sortable()->label('levels number'),
                tables\Columns\TextColumn::make('faculty_id.faculty_name')->sortable()->label('faculty'),
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
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }    
}
