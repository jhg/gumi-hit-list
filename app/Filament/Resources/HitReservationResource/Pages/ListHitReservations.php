<?php

namespace App\Filament\Resources\HitReservationResource\Pages;

use App\Filament\Resources\HitReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHitReservations extends ListRecords
{
    protected static string $resource = HitReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
