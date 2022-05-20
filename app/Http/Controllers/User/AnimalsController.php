<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AnimalsController extends Controller
{
    //

    public function index()
    {
        $animals = auth()->user()->animals;
        return view('user.animal.index', compact('animals'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'animal_id' => 'required',
            'gender' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:10000',
            'birth_date' => 'required',

        ]);

        auth()->user()->animals()->create([
            'file_serial_number' => Str::uuid(),
            'name' => $request->name,
            'type' => $request->type,
            'animal_id' => $request->animal_id,
            'gender' => $request->gender,
            'image' => $this->animal_image_upload($request),
            'birth_date' => Carbon::make($request->birth_date),
        ]);

        return redirect()->route('user.animals.index');
    }
    private function animal_image_upload(Request $request)
    {

        if ($request->hasFile('image')){
            return $request->file('image')->store('users/'. auth()->user()->full_name . '/');
        }
        return null;
    }

    public function destroy(Request $request, Animal $animal)
    {
        if ($animal->user_id == auth()->id()){
            $animal->delete();
            return redirect()->route('user.animals.index');
        }
        abort(401);

    }
}
