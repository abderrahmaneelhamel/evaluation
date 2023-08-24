<?php

namespace App\Filament\Resources\ResponseNoteResource\Pages;

use App\Filament\Resources\ResponseNoteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResponseNotes extends ListRecords
{
    protected static string $resource = ResponseNoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
