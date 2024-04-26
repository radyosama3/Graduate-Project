<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NavbarComponent extends Component
{
    public $auth;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->auth = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar-component');
    }
}
