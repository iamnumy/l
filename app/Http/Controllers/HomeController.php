<?php

namespace App\Http\Controllers;

use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function sendNotification()
    {
        $user = User::first();

        $details = [
            'greeting' => 'Hi ',
            'body' => 'You are logged in',
        ];

        Notification::send($user, new EmailNotification($details));

        dd('done');
    }
}
