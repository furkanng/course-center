<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CompanyInfoModal extends Component
{

    public string $modalId;
    public string $name;
    public string $companyType;
    public string $mernis;
    public string $address;
    public string $city;
    public string $district;
    public string $companyId;

    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $name, $companyType, $mernis, $address, $city, $district,$companyId)
    {
        $this->modalId = $modalId;
        $this->name = $name;
        $this->companyType = $companyType;
        $this->mernis = $mernis;
        $this->address = $address;
        $this->city = $city;
        $this->district = $district;
        $this->companyId = $companyId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.company-info-modal');
    }
}
