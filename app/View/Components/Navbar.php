<?php

namespace App\View\Components;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $categories;
    public $announcementsCounter;
    public $nullAnnouncements;

    /**
     * Create a new component instance.
     */
    public function __construct(Category $categories, Announcement $announcementsCounter, User $user)
    {
        $this->categories = $categories->all();
        $this->announcementsCounter = $announcementsCounter->toBeRevisionedCount();
        //$this->nullAnnouncements = $user->nullAnnouncementsCount();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {   $user = Auth::user();
        return view('components.navbar', ['categories' => $this->categories, 'announcements' => $this->announcementsCounter]);
    }
}
