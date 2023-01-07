<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('frontend.contact.index');
    }

    public function StoreMessage(Request $request)
    {
        $contact = new Contacts();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->created_at = Carbon::now();
        $contact->save();

        $notification = array(
            'message' => 'Your Message Submitted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ContactMessage()
    {
        $contacts = Contacts::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function DeleteMessage($id)
    {
        Contacts::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Your Message Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
