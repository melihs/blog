<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Setting;
use Illuminate\Http\Request;
use App\Contact;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('admin.contactForm');
    }

    public function send(ContactRequest $request)
    {
        $validated = $request->validated();
        $setting = Setting::find(1);
        $getMail = $setting->email;
        $address = $setting->title;
        $data = array_add($validated,'sitetitle',$address);
        Mail::to($getMail)->send(new ContactForm($data));
        alert()->success('Başarılı', 'E-posta gönderildi')->autoClose('2000');
        return back();


//        Mail::to($request->email)->send(new ContactForm($contact));
    }
}
