<?php

namespace App\Filament\Resources\MathExamResource\Pages;

use App\Filament\Resources\MathExamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMathExams extends ListRecords
{
    protected static string $resource = MathExamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
