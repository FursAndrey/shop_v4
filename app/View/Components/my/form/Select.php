<?php

namespace App\View\Components\my\form;

use Illuminate\View\Component;

class Select extends Component
{
    private $options;
    private $oldSelected;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options, $oldSelected = null)
    {
        $this->options = $options;
        $this->oldSelected = $oldSelected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(
            'components.my.form.select',
            [
                'options' => $this->options,
                'oldSelected' => $this->oldSelected,
            ]
        );
    }
}
