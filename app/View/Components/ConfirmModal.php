<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmModal extends Component
{
    public string $modalId;
    public string $title;
    public string $body;
    public $action;
    public string $method;
    public string $button;

    public function __construct($modalId, $title, $body, $action, $method, $button)
    {
        $this->modalId = $modalId;
        $this->title = $title;
        $this->body = $body;
        $this->action = $action;
        $this->method = $method;
        $this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.confirm-modal');
    }
}
