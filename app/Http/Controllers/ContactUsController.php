<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //


    public function showForm()
    {
        return view('contact.contact_form');
    }

    public function saveContact(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',

            'email' => 'required|email|unique:contact_us,email',
            'phone' => 'required',

            'subject' => 'required',
        ]);

        Contactus::create([
            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'subject' => $request->subject,
        ]);

        return redirect()->route('contact_us_table')->with('success', 'Feedback submitted successfully!');
    }


    public function ContactUs_table()
    {
        $contacts = Contactus::latest()->get();

        return view('contact_us_table',compact('contacts'));
    }
    public function viewContact($id)
    {
        $contacts = Contactus::find($id);

        return view('contact.view_contact', compact('contacts'));
    }

    public function editContact($id)
    {
        $contacts = Contactus::find($id);

        return view('contact.edit_contact', compact('contacts'));
    }

    public function updateContact(Request $request, $id)
    {

        $request->validate([

            'name' => 'required|max:255',

            'email' => 'required|email|max:255',

            'phone' => 'required|max:20',

            'subject' => 'required|max:255',
        ]);

        $contacts = Contactus::findOrFail($id);

        $contacts->name = $request->input('name');

        $contacts->email = $request->input('email');

        $contacts->phone = $request->input('phone');

        $contacts->subject = $request->input('subject');

        $contacts->save();

        return redirect()->route('contact_us_table')->with('success', 'Contact updated successfully.');
    }

    public function deleteContact($id)
    {
        $contacts = Contactus::find($id);

        $contacts->delete();

        return redirect()->route('contact_us_table')->with('success', 'Contact deleted successfully.');
    }

    public function searchContact(Request $request)
    {
        $search = $request->search;

        $contacts = Contactus::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->get();

        return view('contact_us_table', compact('contacts', 'search'));
    }
}
