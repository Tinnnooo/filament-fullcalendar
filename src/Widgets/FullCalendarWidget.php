<?php

namespace Noin\FilamentFullCalendar\Widgets;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\Widget;
use Noin\FilamentFullCalendar\Actions\CreateAction;
use Noin\FilamentFullCalendar\Actions\DeleteAction;
use Noin\FilamentFullCalendar\Actions\EditAction;
use Noin\FilamentFullCalendar\Actions\ViewAction;
use Noin\FilamentFullCalendar\Widgets\Concerns\CanBeConfigured;
use Noin\FilamentFullCalendar\Widgets\Concerns\InteractsWithEvents;
use Noin\FilamentFullCalendar\Widgets\Concerns\InteractsWithHeaderActions;
use Noin\FilamentFullCalendar\Widgets\Concerns\InteractsWithModalActions;
use Noin\FilamentFullCalendar\Widgets\Concerns\InteractsWithRawJS;
use Noin\FilamentFullCalendar\Widgets\Concerns\InteractsWithRecords;

class FullCalendarWidget extends Widget implements HasActions, HasForms
{
    use CanBeConfigured;
    use InteractsWithActions;
    use InteractsWithEvents;
    use InteractsWithForms;
    use InteractsWithHeaderActions;
    use InteractsWithModalActions;
    use InteractsWithRawJS;
    use InteractsWithRecords;

    protected string $view = 'filament-fullcalendar::fullcalendar';

    protected int|string|array $columnSpan = 'full';

    protected function headerActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function modalActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function viewAction(): Action
    {
        return ViewAction::make();
    }

    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views.
     *
     * @param  array{start: string, end: string, timezone: string}  $info
     */
    public function fetchEvents(array $info): array
    {
        return [];
    }

    public function getFormSchema(): array
    {
        return [];
    }
}
