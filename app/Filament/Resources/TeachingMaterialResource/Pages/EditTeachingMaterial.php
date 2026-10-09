<?php

namespace App\Filament\Resources\TeachingMaterialResource\Pages;

use App\Filament\Resources\TeachingMaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeachingMaterial extends EditRecord
{
    protected static string $resource = TeachingMaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
