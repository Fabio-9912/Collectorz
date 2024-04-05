<?php

namespace App\View\Components;

use App\Models\Announcement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $announcements;
    /**
     * Create a new component instance.
     */
    public function __construct(Announcement $announcements)
    {
        $this->announcements = $announcements::all();
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card', ['announcements' => $this->announcements]);
    }
}
