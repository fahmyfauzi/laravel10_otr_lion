<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmationModal extends Component
{
    public $modalId;
    public $title;
    public $message;
    public $action;
    public $statusValue;

    /**
     * Create a new component instance.
     */
    public function __construct($modalId = 'confirmationModal', $title = 'Konfirmasi', $message = 'Apakah Anda yakin ingin menghapus ini?', $action, $statusValue)
    {
        $this->modalId = $modalId;
        $this->title = $title;
        $this->message = $message;
        $this->action = $action;
        $this->statusValue = $statusValue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.confirmation-modal');
    }
}
