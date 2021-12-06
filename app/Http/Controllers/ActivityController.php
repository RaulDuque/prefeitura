<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Contact;
use App\Models\Receptivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::query()
        ->select('id', 'time', 'description', 'status', 'pendencies', 'receptivity_id', 'activity_type_id', 'contact_id',)
        ->with('contact:id,name', 'activityType:id,name', 'receptivity:id,name', 'contact.cityHall:id,name')
        ->orderBy('id')
        ->latest()
        ->get();

        return view('activity.index', ['activities' => $activities]);
    }


    public function create()
    {
        $activityTypes = ActivityType::orderBy('name')->get(['id', 'name']);
        $receptivity = Receptivity::orderBy('name')->get(['id', 'name']);
        $contacts = Contact::orderBy('name')->get(['id', 'name']);

        return view('activity.create', ['activityTypes' => $activityTypes, 'receptivity' => $receptivity, 'contacts' => $contacts]);
    }


    public function store()
    {
        $validatedData = request()->validate([
            'time' => 'required',
            'description' => 'required|max:255',
            'status' => 'required|max:255',
            'pendencies' => 'required|max:255',
            'receptivity_id' => 'required|max:255',
            'activity_type_id' => 'required|max:255',
            'contact_id' => 'required|max:255',
        ]);

        $activities = Activity::create($validatedData);

        return redirect()->route('activity.index', $activities);

    }


    public function show($id)
    {
        $activity = load(['contact'=> fn ($query) =>$query
        ->select('id', 'time', 'description', 'status', 'pendencies', 'receptivity_id', 'activity_type_id', 'contact_id',)
        ->with('contact:id,name', 'activityType:id,name', 'receptivity:id,name')
        ->where('id', $id)
        ->orderBy('id')
        ->first();

        $contacts = Contact::orderBy('name')->get(['id', 'name']);

        return view('activity.show', ['activity' => $activity, 'contacts' => $contacts]);
    }


    public function edit($id)
    {
        $contacts = Contact::orderBy('name')->get(['id', 'name']);
        $activityTypes = ActivityType::orderBy('name')->get(['id', 'name']);
        $receptivity = Receptivity::orderBy('name')->get(['id', 'name']);

        return view('activity.edit', ['activity' => Activity::findOrFail($id), 'contacts' => $contacts, 'activityTypes' => $activityTypes, 'receptivity' => $receptivity]);

    }


    public function update(Request $request, Activity $activity)
    {
        $validatedData = $request->validate([
            'time' => 'required',
            'description' => 'required|max:255',
            'status' => 'required|max:255',
            'pendencies' => 'required|max:255',
            'receptivity_id' => 'required|max:255',
            'activity_type_id' => 'required|max:255',
            'contact_id' => 'required|max:255',
        ]);

        $activity->update($validatedData);

        return redirect()->route('activity.index',['activity'=>$activity]);
    }



    public function destroy($id)
    {
        //
    }
}
