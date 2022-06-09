<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Mail;

class ContactController extends Controller
{
    /**
     * Render the Contact page.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Contact');
    }

    /**
     * Send the contact email.
     *
     * @param  ContactRequest  $request
     * @return RedirectResponse
     */
    public function contact(ContactRequest $request): RedirectResponse
    {
        Mail::to('sketch@sketchni.uk')->queue(new ContactMail($request->all()));
        Mail::to($request->get('email'))->queue(new ContactMail($request->all(), "A copy of your message send on SketchNI.UK"));

        return redirect()->to(route('contact'));
    }
}
