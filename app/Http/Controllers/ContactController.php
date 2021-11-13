<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactMessageSubmitted;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $input = $request->all();

        $toData = [
            'name' => $input['name'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'message' => $input['message'],
        ];
        $fromData = [
            'name' => $input['name'],
            'subject' => 'You message has been sent',
        ];
        Notification::route('mail', env('MAIL_USERNAME'))->notify(new ContactMessageSubmitted($toData));
        Notification::route('mail', $input['email'])->notify(new ContactMessageSubmitted($fromData));

        return back()->with('status', 'contact-message-sent');
    }
}
