<?php

namespace App\Traits\Livewire;

trait WithToast
{
    public function notify(
        string $type = 'info',
        string $title = '',
        string $body = '',
        int $time = 4000,
        string $position = 'top-right'
    ): void {
        $this->dispatch('toast', 
            type: $type,
            title: $title,
            body: $body,
            time: $time,
            position: $position
        );
    }
}