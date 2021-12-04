<?php

namespace App\Http\Controllers;

use App\Models\CityHall;
use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
    {
    public function index()
    {
        $contactTypes = ContactType::query()
        ->select('id', 'name','cityhall_id')
        ->with('cityhall:id,name')
        ->latest()
        ->paginate();

        return view('contact-types.index', ['contactTypes' => ContactType::all()]);
    }

    public function create()
    {
        $cityhalls = CityHall::orderBy('name')->get([
            'id',
            'name',
        ]);
        return view('contact-types.create', ['cityhalls' => $cityhalls]);
    }

    public function store(Request $request)
    {
        $contactType = ContactType::query()
        ->select('id', 'name', 'term','cityhall_id')

        ;
    }

    public function show($id)
    {
        $contact_type = ContactType::find($id);
     return view('contact_types.show', compact('contact_type'));
    }

    public function edit($id)
    {
        $contact_type = ContactType::find($id);
        return view('contact_types.edit', compact('contact_type'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $contact_type = ContactType::find($id);
        $contact_type->name = $request->name;
        $contact_type->save();
        return redirect('contact_types');
    }

    public function destroy($id)
    {
        $contact_type = ContactType::find($id);
        $contact_type->delete();
        return redirect('contact_types');
    }
}
