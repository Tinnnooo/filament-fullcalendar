<?php

namespace Noin\FilamentFullCalendar\Actions;

use Filament\Actions\CreateAction as BaseCreateAction;
use Noin\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CreateAction extends BaseCreateAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->model(
            fn (FullCalendarWidget $livewire) => $livewire->getModel()
        );

        $this->schema(
            fn (FullCalendarWidget $livewire) => $livewire->getFormSchema()
        );

        $this->after(
            fn (FullCalendarWidget $livewire) => $livewire->refreshRecords()
        );

        $this->cancelParentActions();
    }
}
