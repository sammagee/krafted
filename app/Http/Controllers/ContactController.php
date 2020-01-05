<?php

namespace App\Http\Controllers;

use App\Notifications\ContactMessageSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class ContactController extends Controller
{

    public function store()
    {
        Request::validate([
            'name'    => ['required', 'max:50'],
            'email'   => ['required', 'max:50', 'email'],
            'message' => ['required', 'min:10'],
        ]);

        Notification::route('mail', config('mail.to.address'))
            ->notify(new ContactMessageSent(Request::all()));

        return response()->json(['message' => __('contact.success')]);
    }

}
