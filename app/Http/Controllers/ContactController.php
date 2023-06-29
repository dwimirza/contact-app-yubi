<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                'name' => 'required|unique:contact',
                'email' => 'required',
                'number' => 'required',
        ]);

        Contact::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'number' => $validatedData['number'],
        ]);

        return redirect()->route('home')->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
            $contact = Contact::where('id', $contact->id)->first();
            return view('contact.edit', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
            
                $contact = Contact::where('id', $contact->id)->first();
                return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:contact,name,' . $id,
            'email' => 'required',
            'number' => 'required',
        ]);
    
        $contact = Contact::findOrFail($id);
    
        $contact->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'number' => $validatedData['number'],
        ]);
    
        return redirect('/home')->with('success', 'Contact updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
            
            $contact = Contact::findOrFail($contact->id);
            $contact->delete();
    
            return redirect()->route('home')->with('success', 'Contact deleted successfully.');
    }
}
