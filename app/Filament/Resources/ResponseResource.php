<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResponseResource\Pages;
use App\Filament\Resources\ResponseResource\RelationManagers;
use App\Models\Response;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResponseResource extends Resource
{
    protected static ?string $model = Response::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')->relationship('student_id','name')->searchable()->preload()->label('student')->required(),
                Select::make('survey_question_id')->relationship('survey_question_id','survey_id')->searchable()->preload()->label('survey')->required(),
                Forms\Components\TextInput::make('response_note')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('comment')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                tables\Columns\TextColumn::make('student_id.name')->sortable()->label('student'),
                tables\Columns\TextColumn::make('survey_question_id.survey_id')->sortable()->label('survey'),
                Tables\Columns\TextColumn::make('response_note')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comment')
                    ->searchable(),
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
            'index' => Pages\ListResponses::route('/'),
            'create' => Pages\CreateResponse::route('/create'),
            'edit' => Pages\EditResponse::route('/{record}/edit'),
        ];
    }    
}
