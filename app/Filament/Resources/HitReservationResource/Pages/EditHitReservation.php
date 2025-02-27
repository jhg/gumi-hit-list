<?php

namespace App\Filament\Resources\HitReservationResource\Pages;

use App\Filament\Resources\HitReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHitReservation extends EditRecord
{
    protected static string $resource = HitReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
