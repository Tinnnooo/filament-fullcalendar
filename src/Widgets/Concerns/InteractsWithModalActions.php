<?php

namespace Noin\FilamentFullCalendar\Widgets\Concerns;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Illuminate\Support\Arr;

trait InteractsWithModalActions
{
    /**
     * @var array<Action | ActionGroup>
     */
    protected array $cachedModalActions;

    protected array $modalActions = [];

    public function bootedInteractsWithModalActions(): void
    {
        $this->cacheModalActions();
    }

    protected function cacheModalActions(): void
    {
        /** @var array<string, Action | ActionGroup> */
        $actions = $this->modalActions();

        foreach ($actions as $action) {
            if ($action instanceof ActionGroup) {
                $action->livewire($this);

                if (! $action->getDropdownPlacement()) {
                    $action->dropdownPlacement('bottom-end');
                }

                $this->cachedModalActions[] = $action;

                continue;
            }

            $this->cachedModalActions[] = $action;
        }
    }

    /**
     * @return array<Action | ActionGroup>
     */
    public function getCachedModalActions(): array
    {
        if (isset($this->cachedModalActions)) {
            return $this->cachedModalActions;
        }

        $actions = [];

        foreach ($this->modalActions() as $action) {
            foreach (Arr::wrap($this->evaluate($action)) as $modalAction) {
                $actions[$modalAction->getName()] = $modalAction;
            }
        }

        return $this->cachedModalActions = $actions;
    }

    /**
     * @return array<Action | ActionGroup>
     */
    protected function modalActions(): array
    {
        return [];
    }
}
