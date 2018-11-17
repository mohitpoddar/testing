<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails; // if needed override the default Laravel notification

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails; // if needed  override the default Laravel notification

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    ///**
    // * Send the password reset notification.
    // *
    // * @param  string  $token
    // * @return void
    // */
    //public function sendPasswordResetNotification($token)
    //{
    //    $this->notify(new ResetPasswordNotification($token));
    // }

}
