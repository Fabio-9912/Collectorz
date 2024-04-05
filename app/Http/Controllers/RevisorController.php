<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Mail\RejectFeedback;
use App\Models\Announcement;
use App\Models\User;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $exchangeRates = app(ExchangeRate::class);
        $result = $exchangeRates->convert(1, 'EUR', 'GBP', Carbon::now());
        $announcementsNullCounter = Announcement::where('user_id', '!=', Auth::user()->id)->where('is_accepted', null)->count();
        $announcements = Announcement::where('is_accepted', null)
            ->where('user_id', '!=', Auth::user()->id)
            ->take(1)->get();
        return view('revisor.index', compact('announcements', 'announcementsNullCounter', 'result'));
    }
    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->is_accepted(true);
        
        if ((App::isLocale('en'))) {
            return back()->with('success', 'Ad posted on platform.');
        }
        if ((App::isLocale('es'))) {
            return back()->with('success', 'Anuncio publicado en la plataforma.');
        }
        if ((App::isLocale('it'))) {
            return back()->with('success', 'Annuncio inserito in piattaforma');
        }
    }
    public function rejectAnnouncement(Announcement $announcement, Request $request)
    {
        $data = [
            'image' => $request->image,
            'description' => $request->description,
        ];
        $otherData =[
            'title' => $request->title,
            'name' => $announcement->user->name
        ];
        
        Mail::to($announcement->user->email)->send(new RejectFeedback($data, $otherData));
        $announcement->is_accepted(false);
        if ((App::isLocale('en'))) {
            return back()->with('unsuccess', 'Ad rejected.');
        }
        if ((App::isLocale('es'))) {
            return back()->with('unsuccess', 'Anuncio rechazado.');
        }
        if ((App::isLocale('it'))) {
            return back()->with('unsuccess', 'Annuncio rifiutato');
        }
    }
    public function workWithUs()
    {
        return view('revisor.work-with-us');
    }
    public function becomeRevisor(Request $request)
    {
        $data = [
            'description' => $request->description
        ];
        Mail::to('admin@collectorz.it')->send(new BecomeRevisor(Auth::user(), $data));

        if ((App::isLocale('en'))) {
            return redirect()->route('homepage')->with('success', 'Congratulations, your request for Collectorz Reviewer has been successfully submitted.');
        }
        if ((App::isLocale('es'))) {
            return redirect()->route('homepage')->with('success', 'Felicidades, tu solicitud de Revisor de Collectorz ha sido enviada correctamente.');
        }
        if ((App::isLocale('it'))) {
            return redirect()->route('homepage')->with('success', 'Complimenti, la tua richiesta di Collectorz Revisor è stata inviata correttamente.');
        }
    }
    public function makeRevisor(User $user)
    {
        Artisan::call('collectorz:makeUserRevisor', ["email" => $user->email]);

        if ((App::isLocale('en'))) {
            return redirect()->route('homepage')->with('success', 'Congratulations, the user has become a reviewer.');
        }
        if ((App::isLocale('es'))) {
            return redirect()->route('homepage')->with('success', 'Felicidades, el usuario se ha convertido en revisor.');
        }
        if ((App::isLocale('it'))) {
            return redirect()->route('homepage')->with('success', 'Complimenti, L\'utente è diventato revisore.');
        }
    }
}
