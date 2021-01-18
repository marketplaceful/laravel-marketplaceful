<?php

namespace Marketplaceful\View\Components\Layouts;

use Illuminate\View\Component;

class Guest extends Component
{
    public function render()
    {
        return view('marketplaceful::layouts.guest');
    }
}
