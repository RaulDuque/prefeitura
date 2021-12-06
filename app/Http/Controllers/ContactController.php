<?php

namespace App\Http\Controllers;

use App\Models\CityHall;
use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::query()
            ->select('id', 'name', 'term','contact_type_id','city_hall_id')
            ->with('cityHall:id,name,phone,city_id','contactType:id,name','cityHall.city:id,name')
            ->orderBy('name')
            ->latest()
            ->get();
        // dd($contacts);
        return view('contacts.index', ['contacts' => $contacts]);
    }


    public function create()
    {
        $contactTypes = ContactType::orderBy('name')->get(['id', 'name']);

        $cityHalls = CityHall::orderBy('name')->get(['id', 'name', 'phone']);

        return view('contacts.create', ['cityHalls' => $cityHalls, 'contactTypes' => $contactTypes]);
    }


    public function store()
    {
        $validateData = request()->validate([
            'name' => 'required|max:255',
            'term' => 'required|max:255',
            'contact_type_id' => 'required',
            'city_hall_id' => 'required',
        ]);
        $contacts = Contact::create($validateData);
        return redirect()->route('contacts.index', $contacts);
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', ['contacts' => $contact]);
    }

    public function edit(Contact $contact)
    {
        $contactTypes = ContactType::orderBy('name')->get(['id', 'name']);
        $cityHalls = CityHall::orderBy('name')->get(['id', 'name','phone']);
        return view('contacts.edit', ['cityHalls' => $cityHalls ,'contactTypes' => $contactTypes, 'contact' => $contact]);
    }

    public function update(Contact $contact, Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'term' => 'required|max:255',
            'contact_type_id' => 'required',
            'city_hall_id' => 'required',
        ]);

        $contact->update($validateData);

        return redirect()->route('contacts.index', $contact)-with('success', 'Contact updated successfully');
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
    }
}
