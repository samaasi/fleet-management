<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Base extends Component
{
    public function render(): View
    {
        return view('components.layouts.base');
    }
}
