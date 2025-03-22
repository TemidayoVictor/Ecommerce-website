<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email'
        ]);

        // Save to database
        $newsletter = Newsletter::create([
            'email' => $request->email
        ]);

        // Send email to admin
        Mail::raw("New newsletter subscriber: " . $request->email, function ($message) {
            $message->to('admin@example.com')
                    ->subject('New Newsletter Subscription');
        });


        return response()->json(['success' => 'Thank you for subscribing!']);
    }

    // Show all subscribers in the admin dashboard
    public function index()
    {
        $subscribers = Newsletter::latest()->paginate(10);
        return view('admin.newsletter.index', compact('subscribers'));
    }

    public function destroy($id)
{
    $subscriber = Newsletter::find($id);

    if (!$subscriber) {
        return redirect()->back()->with('error', 'Subscriber not found.');
    }

    $subscriber->delete();

    return redirect()->back()->with('success', 'Subscriber deleted successfully.');
}

}
