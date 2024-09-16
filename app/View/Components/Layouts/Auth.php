<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Auth extends Component
{
    public $pageTitle = null;

    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle = null)
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.auth.app');
    }
}
