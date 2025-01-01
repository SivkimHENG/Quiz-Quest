<?php

namespace App\Filament\Resources\CreateQuestionResource\Pages;

use App\Filament\Resources\CreateQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCreateQuestion extends EditRecord
{
    protected static string $resource = CreateQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
