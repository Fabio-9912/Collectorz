<?php

namespace App\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Livewire\Component;

class Announcements extends Component
{
    public $byCategory = null;
    public function render()
    {
        $categories = Category::all();
        $announcements = Announcement::where('is_accepted', true)->get();
                                       
        return view('livewire.announcements', compact('announcements', 'categories'));
    }
}
