<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Newsletter\Facades\Newsletter;

class MailChimpController extends Controller
{
    public function subscribe(Request $request)
   {
       $email = $request->input('email');
       Newsletter::subscribe($email);
       return redirect()->back()->with('success', 'Ti sei registrato alla newsletter');
   }

}
