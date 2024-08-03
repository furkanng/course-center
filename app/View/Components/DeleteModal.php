<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteModal extends Component
{
    public string $modalId;
    public string $title;
    public string $body;
    public string $action;

    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $title, $body, $action)
    {
        $this->modalId = $modalId;
        $this->title = $title;
        $this->body = $body;
        $this->action = $action;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-modal');
    }
}
