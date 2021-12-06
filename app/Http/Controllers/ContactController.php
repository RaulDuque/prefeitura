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

        return redirect()->route('contacts.show', $contacts);
    }

    public function show(Contact $contacts)
    {
        return view('contacts.show', ['contacts' => $contacts]);
    }

    public function edit()
    {
        $cityHalls = CityHall::orderBy('name')->get(['id', 'name','phone']);
        return view('contacts.edit', ['cityHalls' => $cityHalls]);
    }

    public function update(Contact $contacts)
    {
        $validateData = request()->validate([
            'name' => 'required|max:255',
            'term' => 'required|max:255',
            'contact_type_id' => 'required',
            'city_hall_id' => 'required',
        ]);

        $contacts->update($validateData);

        return redirect()->route('contacts.index', $contacts)-with('success', 'Contact updated successfully');
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
    }
}
