<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Adoption;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $updateAvailability = Animal::where('id', $request->input('animalID'))->get()->first();
        $updateAvailability->availability =  $request->input('availability');
        $updateAvailability->save();

        $entry = Adoption::where('animalID', $request->input('animalID'))->where('userID', $request->input('userID'))->first();
        $entry->status = 'accepted';
        $animalID = $request->input('animalID');
        foreach (Adoption::where('animalID', $animalID)->get() as $adoption) {
            if ($adoption->userID != Auth::id()) {
                $adoption->status = 'denied';
                $adoption->save();
            }
        }
        $entry->save();
        return back()->with('success', 'Animal adoption request has been sent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a Adoption object and set its values from the input
        $adoption = new Adoption();
        $adoption->userID = Auth::user()->id;
        $adoption->animalID = $request->input('animal');
        // save the Adoption object
        $adoption->save();
        // generate a redirect HTTP response with a success message
        return back()->with('success', 'Animal has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::denies('displayall') == false) {
            $adoptions = Adoption::all()->toArray();
            return view('adoptions.index', compact('adoptions'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entry = Adoption::where('animalID', $request->input('animalID'))->where('userID', $request->input('userID'))->first();
        $entry->status = 'denied';
        $entry->save();
        return back()->with('success', 'Animal adoption request has been sent');
    }

    public function approvedView()
    {
        if (Gate::denies('displayall') == false) {
            $adoptions = Adoption::all();
            return view('adoptions.approved', compact('adoptions'));
        }
    }

    public function myRequests()
    {
        $adoptions = Adoption::all();
        return view('adoptions.myadoptions', compact('adoptions'));
    }

    public function myAnimals()
    {
        $adoptions = Adoption::all();
        return view('adoptions.myadoptions', compact('adoptions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
