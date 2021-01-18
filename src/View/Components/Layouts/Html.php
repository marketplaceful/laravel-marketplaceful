<?php

namespace Marketplaceful\View\Components\Layouts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Html extends Component
{
    /** @var string */
    protected $title;

    public function __construct(string $title = '')
    {
        $this->title = $title;
    }

    public function render(): View
    {
        return view('marketplaceful::layouts.html');
    }

    public function title(): string
    {
        return $this->title ?: (string) config('app.name', 'Marketplaceful');
    }
}
