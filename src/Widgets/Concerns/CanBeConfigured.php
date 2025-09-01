<?php

namespace Noin\FilamentFullCalendar\Widgets\Concerns;

use Noin\FilamentFullCalendar\FilamentFullCalendarPlugin;

use function Noin\FilamentFullCalendar\array_merge_recursive_unique;

trait CanBeConfigured
{
    public function config(): array
    {
        return [];
    }

    protected function getConfig(): array
    {
        return array_merge_recursive_unique(
            FilamentFullCalendarPlugin::get()->getConfig(),
            $this->config(),
        );
    }
}
