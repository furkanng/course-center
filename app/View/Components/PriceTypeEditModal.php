<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PriceTypeEditModal extends Component
{
    public string $modalId;
    public string $action;
    public string $method;
    public string $priceTitle;

    public string $status;


    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $action, $method, $status,$priceTitle)
    {
        $this->modalId = $modalId;
        $this->priceTitle = $priceTitle;
        $this->action = $action;
        $this->method = $method;
        $this->status = $status;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.price-type-edit-modal');
    }
}
