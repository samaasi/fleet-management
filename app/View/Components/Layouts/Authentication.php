<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Authentication extends Component
{
    public function render(): View
    {
        return view('components.layouts.authentication');
    }
}
