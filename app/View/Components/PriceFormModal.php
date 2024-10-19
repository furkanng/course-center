<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PriceFormModal extends Component
{
    public string $modalId;
    public string $action;
    public string $method;
    public string $title;
    public string $price;
    public string $discounted;
    public string $status;


    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $action, $method, $title, $price, $discounted, $status)
    {
        $this->modalId = $modalId;
        $this->action = $action;
        $this->method = $method;
        $this->title = $title;
        $this->price = $price;
        $this->discounted = $discounted;
        $this->status = $status;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.price-form-modal');
    }
}
