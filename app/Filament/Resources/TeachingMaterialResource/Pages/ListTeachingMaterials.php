<?php

namespace App\Filament\Resources\TeachingMaterialResource\Pages;

use App\Filament\Resources\TeachingMaterialResource;
use App\Models\TeachingMaterial;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTeachingMaterials extends ListRecords
{
    protected static string $resource = TeachingMaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('+ បង្កើតសម្ភារៈថ្មី'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('ទាំងអស់ (All)')
                ->badge(TeachingMaterial::count()),
            'measuring' => Tab::make('ឧបករណ៍វាស់ស្ទង់')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category', 'ឧបករណ៍វាស់ស្ទង់'))
                ->badge(TeachingMaterial::where('category', 'ឧបករណ៍វាស់ស្ទង់')->count()),
            'geometry' => Tab::make('ធរណីមាត្រ')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category', 'ធរណីមាត្រ'))
                ->badge(TeachingMaterial::where('category', 'ធរណីមាត្រ')->count()),
            'reference' => Tab::make('សៀវភៅជំនួយ')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category', 'សៀវភៅជំនួយ'))
                ->badge(TeachingMaterial::where('category', 'សៀវភៅជំនួយ')->count()),
            'experiment' => Tab::make('សម្ភារៈពិសោធន៍')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category', 'សម្ភារៈពិសោធន៍'))
                ->badge(TeachingMaterial::where('category', 'សម្ភារៈពិសោធន៍')->count()),
        ];
    }
}
