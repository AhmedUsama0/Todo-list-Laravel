<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class SendMailController extends Controller
{
    public function resetPasswordMail() {
        Mail::to(request('email'))->send(new ResetPasswordMail());
        return redirect('/password/reset')->with('msg','A link sent to your email');
    }
}
