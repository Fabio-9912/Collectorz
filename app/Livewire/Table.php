<?php

namespace App\Livewire;

use App\Models\Announcement;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $announcements;
    public $result;
    public function mount() {
        $this->loadAnnouncements();
        $this->result = $this->exchangeRates();
    }
    #[On('announcement-create')]
    public function loadAnnouncements() {
        $this->announcements = Announcement::all(); 
    }
    public function exchangeRates() {
        $exchangeRates = app(ExchangeRate::class);
        $result = $exchangeRates->convert(1, 'EUR', 'GBP', Carbon::now());
        return $result;
    }
    public function delete (Announcement $announcement) {
        $announcement->delete();
        $this->loadAnnouncements();
    }

    public function edit(Announcement $announcement) {
        $this->dispatch('announcement-edit', announcement: $announcement)->to(CreateAnnouncement::class);
    }
    public function render()
    {
        return view('livewire.table');
    }
}
