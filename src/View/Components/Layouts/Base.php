<?php

namespace Marketplaceful\View\Components\Layouts;

use Illuminate\View\Component;

class Base extends Component
{
    public function render()
    {
        return view('marketplaceful::layouts.base');
    }
}
