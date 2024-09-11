<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_data = Auth::user();
        return view('backend.profiles.index', compact('user_data'));
    }

    public function update(Request $request)
    {
        // return $request;

        $newUserData = [
            "name" => $request->name,
            "email" => $request->email,
        ];

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $profilelogoImageName = time().'.'.$image->getClientOriginalExtension();
            File::put(public_path('img') . '/' . $profilelogoImageName, File::get($image));
            $newUserData['image'] = $profilelogoImageName;
        }

        if($request->password) {
            $newPassword = bcrypt($request->password);
            $newUserData['password'] = $newPassword;
        }

        $user = User::find(Auth::user()->id);

        $user->update($newUserData);

        return back()->with('success', 'User Profile Data Updated Successfully');

    }

}
