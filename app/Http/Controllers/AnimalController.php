<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all()->toArray();
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('displayall') == false) {
            return view('animals.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // form validation
        $animal = $this->validate(request(), [
            'name' => 'required',
            'dob' => 'required',
            'description' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image2' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);
        //Handles the uploading of the image
        if ($request->hasFile('image') && $request->hasFile('image2')) {
            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileNameWithExt2 = $request->file('image2')->getClientOriginalName();
            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);
            //Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $extension2 = $request->file('image2')->getClientOriginalExtension();
            //Gets the filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $fileNameToStore2 = $filename2 . '_' . time() . '.' . $extension2;
            //Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            $path2 = $request->file('image2')->storeAs('public/images', $fileNameToStore2);
        } else {
            $fileNameToStore = 'noimage.jpg';
            $fileNameToStore2 = 'noimage.jpg';
        }
        // create a Animal object and set its values from the input
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->dob = $request->input('dob');
        $animal->description = $request->input('description');
        $animal->group = $request->input('group');
        $animal->availability = $request->input('availability');
        $animal->image = $fileNameToStore;
        $animal->image2 = $fileNameToStore2;
        $animal->created_at = now();
        // save the Animal object
        $animal->save();
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
        $animal = Animal::find($id);
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        return view('animals.edit', compact('animal'));
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
        $animal = Animal::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'dob' => 'required'
        ]);
        $animal->name = $request->input('name');
        $animal->dob = $request->input('dob');
        $animal->description = $request->input('description');
        $animal->group = $request->input('group');
        $animal->availability = $request->input('availability');
        $animal->updated_at = now();
        //Handles the uploading of the image
        if ($request->hasFile('image')) {
            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileNameWithExt2 = $request->file('image2')->getClientOriginalName();
            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);
            //Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $extension2 = $request->file('image2')->getClientOriginalExtension();
            //Gets the filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $fileNameToStore2 = $filename2 . '_' . time() . '.' . $extension2;
            //Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            $path2 = $request->file('image2')->storeAs('public/images', $fileNameToStore2);
        } else {
            $fileNameToStore = 'noimage.jpg';
            $fileNameToStore2 = 'noimage.jpg';
        }
        $animal->image = $fileNameToStore;
        $animal->image2 = $fileNameToStore2;
        $animal->save();
        return redirect('animals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->deleteAnimalEntry($id);
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('animals');
    }

    public function deleteAnimalEntry($id)
    {
        $animal = \App\Models\Adoption::where('animalID', $id);
        $animal->delete();
    }

    // public function display()
    // {
    //     $accountsQuery = User::all();
    //     if (Gate::denies('displayall')) {
    //         $accountsQuery = $accountsQuery->where('userid', auth()->user()->id);
    //     }
    //     return view('/display', array('accounts' => $accountsQuery));
    // }
}
