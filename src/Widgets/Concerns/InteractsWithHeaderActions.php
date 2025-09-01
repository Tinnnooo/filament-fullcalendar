<?php

namespace Noin\FilamentFullCalendar\Widgets\Concerns;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;

trait InteractsWithHeaderActions
{
    /**
     * @var array<Action | ActionGroup>
     */
    protected array $cachedHeaderActions = [];

    public function bootedInteractsWithHeaderActions(): void
    {
        $this->cacheHeaderActions();
    }

    protected function cacheHeaderActions(): void
    {
        /** @var array<string, Action | ActionGroup> */
        $actions = $this->headerActions();

        foreach ($actions as $action) {
            if ($action instanceof ActionGroup) {
                $action->livewire($this);

                if (! $action->getDropdownPlacement()) {
                    $action->dropdownPlacement('bottom-end');
                }

                /** @var array<string, Action> $flatActions */
                $flatActions = $action->getFlatActions();

                $this->mergeCachedActions($flatActions);
                $this->cachedHeaderActions[] = $action;

                continue;
            }

            $this->cacheAction($action);
            $this->cachedHeaderActions[] = $action;
        }
    }

    /**
     * @return array<Action | ActionGroup>
     */
    public function getCachedHeaderActions(): array
    {
        return $this->cachedHeaderActions;
    }

    /**
     * @return array<Action | ActionGroup>
     */
    protected function headerActions(): array
    {
        return [];
    }
}
