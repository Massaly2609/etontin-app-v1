<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    // public function render(): View
    // {
    //     return view('layouts.guest');
    // }
    public $pageTitle;
    public $headerAction;

    public function __construct($pageTitle = null, $headerAction = null)
    {
        $this->pageTitle = $pageTitle;
        $this->headerAction = $headerAction;
    }

    public function render(): View
    {
        return view('layouts.guest', [
            'pageTitle' => $this->pageTitle,
            'headerAction' => $this->headerAction
        ]);
    }
}
