<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile(User $user)
    {
        $exchangeRates = app(ExchangeRate::class);
        $result = $exchangeRates->convert(1, 'EUR', 'GBP', Carbon::now());
        $announcements = Announcement::all();
        return view('auth.profile', compact('announcements', 'result'));
    }
}
