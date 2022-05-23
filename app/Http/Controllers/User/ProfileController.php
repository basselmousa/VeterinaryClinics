<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {


        $user = auth()->user();

        return view('user.profile',compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|unique:users,email,' . auth()->id(),
            'password' => 'nullable|min:8|confirmed',
            'country' => 'required',
            'city' => 'required|not_in:0',
            'gender' => 'required|not_in:0',
            'ssn' => 'required',
            'phone_number' => 'required|min:10|max:10|unique:users,phone_number,' . auth()->id(),
            'image' => 'nullable|mimes:jpg,jpeg,png|max:10000'
        ]);


        $pass = '';
        if ($request->password !== null) {
            $pass = Hash::make($request->password);
        } else {
            $pass = auth()->user()->password;
        }

//        dd($pass == auth('doctor')->user()->password);

        $request['password'] = $pass;
        $this->update_doctor($request);
        return redirect()->route('user.profile.index')->with('success', 'Your Profile Updated Successfully');

    }

    private function update_doctor(Request $request)
    {
        return auth()->user()->update([
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'country' => $request['country'],
            'city' => $request['city'],
            'gender' => $request['gender'],
            'ssn' => $request['ssn'],
            'phone_number' => $request['phone_number'],
            'image' => $request->hasFile('image') ? $this->profile_image_update($request) : auth()->user()->image,
        ]);
    }

    private function profile_image_update(Request $request)
    {
        return $request->file('image')->store('user/' . auth()->user()->fullname . '/');
    }
}
