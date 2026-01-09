<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.pages.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'fullName' => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'message'  => 'nullable',
        ]);

        $contact = Contact::create([
            'fullName' => $request->fullName,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'message'  => $request->message,
        ]);

        Mail::to('admin@gmail.com')->send(new ContactMail($contact));
        flash()->success('Contact created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('backend.pages.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'fullName' => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'message'  => 'nullable',
        ]);

        $contact->update([
            'fullName' => $request->fullName,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'message'  => $request->message,
        ]);

        flash()->success('Contact updated successfully');
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        flash()->success('Contact deleted successfully');
        return redirect()->route('contacts.index');
    }
}
