<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user_image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        /* dd($user_images); */
        return view('pages.user.profile.index', [
            'title' => "Item Detail",
            'user' => $user,
            'user_image' => $user_image,
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $request->validate([
            'nohp' => 'numeric|unique:users,nohp,' . $user->id,
        ]);
        /* dd($request->all()); */
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        }

        if ($request->profile_photo != null) {
            $user_image = user_image::where('user_id', $user->id)->first();
            if (isset($user_image)) {
                $request->validate([
                    'profile_photo' => 'required|image|max:20000',
                ]);
                $user_image->user_id = $user->id;

                $fileName = $request->profile_photo->getClientOriginalName();
                $request->profile_photo->move(public_path('img/profile'), $fileName);
                /* dd($fileName); */
                $user_image->image = $fileName;
                $user_image->save();
            } else {
                $request->validate([
                    'profile_photo' => 'required|image|max:20000',
                ]);
                $user_image = new user_image;
                $user_image->user_id = $user->id;

                $fileName = $request->profile_photo->getClientOriginalName();
                $request->profile_photo->move(public_path('img/profile'), $fileName);
                /* dd($fileName); */
                $user_image->image = $fileName;
                $user_image->save();
            }
        }

        $user->save();
        return redirect()->route('profile')->with('success', 'Profile Successfully Updated');
    }
}
