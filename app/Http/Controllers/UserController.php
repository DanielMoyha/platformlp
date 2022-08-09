<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /** PROFILE (psicólogos) */
    public function profile()
    {
        return view('psicologo.profile.profile');
    }

    public function editProfile(User $user)
    {
        return view('psicologo.profile.edit-profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request, User $user)
    {
        // $user = User::findOrFail($user);
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            // 'email' => 'required',
            // 'role_id' => 'required',
            //'ci' => 'required',
        ]);
        $user->update($request->all());
        // return back()->with("status", "Datos actualizados correctamente!");
        return redirect()->route('psicologo.profile')->with("status", "Datos actualizados correctamente!");
    }
}
