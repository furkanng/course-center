<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SssFormModal extends Component
{
    public string $modalId;
    public string $action;
    public string $method;
    public string $question;
    public string $answer;
    public string $status;
    public string $order;

    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $action, $method, $question, $answer, $status, $order)
    {
        $this->modalId = $modalId;
        $this->action = $action;
        $this->method = $method;
        $this->question = $question;
        $this->answer = $answer;
        $this->status = $status;
        $this->order = $order;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sss-form-modal');
    }
}
