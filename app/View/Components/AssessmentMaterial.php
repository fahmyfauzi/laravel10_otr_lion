<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AssessmentMaterial extends Component
{
    public $index;
    public $name;
    public $label;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($index, $name, $label, $value)
    {
        $this->index = $index;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.assessment-material');
    }
}
