<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\ActivationMailer;

class PageController extends Controller
{
    public function dashboard(){
        return view('backend.page.dashboard');
    }
}
