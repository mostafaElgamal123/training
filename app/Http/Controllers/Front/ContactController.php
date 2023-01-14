<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(ContactRequest $request){

        $request->validated();

        Contact::create($request->all());

        return redirect("contact-us")->with("success","added");
    }
}
