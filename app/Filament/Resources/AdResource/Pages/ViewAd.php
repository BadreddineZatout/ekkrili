<?php

namespace App\Filament\Resources\AdResource\Pages;

use App\Filament\Resources\AdResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewAd extends ViewRecord
{
    protected static string $resource = AdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Action::make('Valider')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->hidden(fn () => (! auth()->user()->hasRole('super_admin')) || $this->record->is_published)
                ->action(function () {
                    $this->record->is_published = true;
                    $this->record->save();

                    return Notification::make()
                        ->title('Annonce validé et publié')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation(),
            Action::make('Réfuser')
                ->color('danger')
                ->icon('heroicon-m-x-circle')
                ->hidden(fn () => (! auth()->user()->hasRole('super_admin')) || ! $this->record->is_published)
                ->action(function () {
                    $this->record->is_published = false;
                    $this->record->save();

                    return Notification::make()
                        ->title('Annonce refusé')
                        ->danger()
                        ->send();
                })
                ->requiresConfirmation(),
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
