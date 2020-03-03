<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Blog News!';
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function vue(){
        $title = 'Test Vue.js';
        return view('pages.testvue')->with('title', $title);
    }
    

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'Data Scientist', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    public function getContact(){
        $title = 'Contact Us!';
        return view('pages.contact')->with('title', $title);
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'email'=> 'required|email',
            'subject'=> 'min:3',
            'message'=> 'min:3'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('pages.templateMail', $data, function($message) use($data) {
            $message->from($data['email']);
            $message->to('drmpgaspar@gmail.com');
            $message->subject($data['subject']);
        });
        $title = 'Thank you to contact us!';
        return view('pages.email')->with('title', $title);
    } 
}

