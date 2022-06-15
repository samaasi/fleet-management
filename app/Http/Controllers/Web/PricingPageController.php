<?php

namespace App\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class PricingPageController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.pricing');
    }
}
