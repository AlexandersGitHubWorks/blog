<?php

namespace App\Http\Controllers;

use App\Services\Contracts\Newsletter;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter): RedirectResponse
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $exception) {
            throw ValidationException::withMessages(['email' => 'This email can not be added to our newsletter.']);
        }

        return redirect()->route('home')->with('success', 'Your email was added to our newsletter.');
    }
}
