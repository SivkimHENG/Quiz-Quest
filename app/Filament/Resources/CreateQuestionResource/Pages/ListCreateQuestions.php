<?php

namespace App\Filament\Resources\CreateQuestionResource\Pages;

use App\Filament\Resources\CreateQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCreateQuestions extends ListRecords
{
    protected static string $resource = CreateQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
