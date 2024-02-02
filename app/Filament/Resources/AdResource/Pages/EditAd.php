<?php

namespace App\Filament\Resources\AdResource\Pages;

use App\Filament\Resources\AdResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAd extends EditRecord
{
    protected static string $resource = AdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['address'] = $this->record->location?->address;
        $data['city'] = $this->record->location?->city;
        $data['state'] = $this->record->location?->state;
        $data['postal_code'] = $this->record->location?->postal_code;
        $data['latitude'] = $this->record->location?->latitude;
        $data['longitude'] = $this->record->location?->longitude;

        return $data;
    }
}
