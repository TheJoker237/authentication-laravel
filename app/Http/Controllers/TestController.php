<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Mail\TestMarkdownMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('bar');    
    }

    public function foo()
    {
        if(!Gate::allows('access-admin')){
            abort('403');
        }
        return(view('test.foo'));
    }

    public function bar()
    {
        // $user = ['email' => 'user@mail.com', 'name' => 'Mr truc'];
        // Mail::to($user['email'])->send(new TestMail($user));
        
        Mail::to('test@gmailcom')->send(new TestMarkdownMail());
        return(view('test.bar'));
    }

    
}