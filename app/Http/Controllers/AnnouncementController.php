<?php

namespace App\Http\Controllers;

use App\Mail\ContactSeller;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('homepage', 'about', 'index', 'show', 'edit', 'setLocale', 'searchAnnouncements');
    }
    public function homepage()
    {
        $exchangeRates = app(ExchangeRate::class);
        $result = $exchangeRates->convert(1, 'EUR', 'GBP', Carbon::now());
        $announcements = Announcement::latest()->take(10)->where('is_accepted', true)->get();
        $categories = Category::all();
        $announcementTop = Announcement::where('price', '>=', 1000)->where('price', '<', 16000)->where('is_accepted', true)->get();
        
        return view('index', compact('categories', 'announcements', 'result', 'announcementTop'));
    }
    public function about()
    {
        return view('about');
    }
    // public function newBadge() {
    //     $newAnnouncement = Announcement::all()->first()->created_at->diffForHumans();
    //     $newAnnouncementToArray = explode(' ', $newAnnouncement);
    //     return $newAnnouncementToArray;
    // }
    public function index()
    {
        $exchangeRates = app(ExchangeRate::class);
        $result = $exchangeRates->convert(1, 'EUR', 'GBP', Carbon::now());
        $categories = Category::all();
        $announcements = Announcement::all();
        return view('announcements.index', compact('announcements', 'categories', 'result'));
    }
    public function create()
    {
        return view('announcements.create');
    }

    public function show(Announcement $announcement): View
    {
        $exchangeRates = app(ExchangeRate::class);
        $result = $exchangeRates->convert(1, 'EUR', 'GBP', Carbon::now());
        $announcementsPerCategories = Announcement::where('is_accepted', true)->where('category_id', $announcement->category->id)->count();
        $announcements = Announcement::all();
        if ($announcement->is_accepted === 0) return abort(404);
        return view('announcements.show', compact('announcement', 'announcements', 'announcementsPerCategories', 'result'));
    }

    public function searchAnnouncements(Request $request)
    {
        $exchangeRates = app(ExchangeRate::class);
        $result = $exchangeRates->convert(1, 'EUR', 'GBP', Carbon::now());
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('announcements.index', compact('announcements', 'result'));
    }

    public function setLocale($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function contactForm(Announcement $announcement)
    {
        return view('announcements.contact-form', compact('announcement'));
    }

    public function contactSeller(Request $request, Announcement $announcement)
    {
        $data = [
            'description' => $request->description,
            'image' => $announcement->images()->first()->getUrl(300, 350)
        ];
        Mail::to($announcement->user->email)->send(new ContactSeller(Auth::user(), $data));
        
        if ((App::isLocale('en'))) {
            return redirect(route('homepage'))->with('success', 'Congratulations, you have sent a contact email to the seller.');
        }
        if ((App::isLocale('es'))) {
            return redirect(route('homepage'))->with('success', 'Felicitaciones, has enviado un correo electrónico de contacto al vendedor.');
        }
        if ((App::isLocale('it'))) {
            return redirect(route('homepage'))->with('success', 'Complimenti, hai inviato una mail di contatto al venditore.');
        }
    }
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return back()->with('success', 'Annuncio eliminato');
    }
}
