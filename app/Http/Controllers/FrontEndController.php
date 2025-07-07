<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    public function about()
    {
        return view('frontend.about');
    }

    public function tenders()
    {
        return view('frontend.tenders');
    }

    public function awards()
    {
        return view('frontend.awards');
    }

    public function news()
    {
        return view('frontend.news');
    }

    public function press()
    {
        return view('frontend.press');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country_code' => 'required|string',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
            'agree_to_policy' => 'required|accepted',
        ]);

        try {
            Mail::to('admin@example.com')->send(
                new ContactFormSubmission(
                    $validated['first_name'],
                    $validated['last_name'],
                    $validated['email'],
                    $validated['country_code'] . $validated['phone'],
                    $validated['message']
                )
            );

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Optionally log the error: \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to send message. Please try again.');
        }
    }
}
