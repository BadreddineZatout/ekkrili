<?php

namespace App\Filament\Resources\AdResource\Pages;

use App\Models\Location;
use App\Filament\Resources\AdResource;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;

class CreateAd extends CreateRecord
{
    protected static string $resource = AdResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $location = Location::create([
            'address' => $this->data['address'],
            'postal_code' => $this->data['postal_code'],
            'city' => $this->data['city'],
            'state' => $this->data['state'],
            'latitude' => $this->data['latitude'],
            'longitude' => $this->data['longitude'],
        ]);

        return static::getModel()::create([
            ...$data,
            'location_id' => $location->id
        ]);
    }
}
