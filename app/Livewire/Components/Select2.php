<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Select2 extends Component
{
    public $selectedValues = []; // Selected values
    public $options = [];        // Dropdown options
    public $multiple = false;    // Multiple selection mode
    public $placeholder = 'Select an option'; // Placeholder text
    public $elementId;           // Unique identifier for this component

    public function mount($elementId, $selectedValues = [], $options = [], $multiple = false, $placeholder = 'Select an option')
    {
        $this->elementId = $elementId;
        $this->selectedValues = $selectedValues;
        $this->options = $options;
        $this->multiple = $multiple;
        $this->placeholder = $placeholder;
    }

    public function updatedSelectedValues()
    {
        // Emit a unique event for this component
        $this->dispatch("select2Updated-{$this->elementId}", $this->selectedValues);
    }

    public function render()
    {
        return view('livewire.components.select2');
    }
}
