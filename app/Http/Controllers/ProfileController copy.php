<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'profile_image' => 'nullable|url|max:255',
            'summary' => 'nullable|max:1000',
            'expertise' => 'nullable|max:1000',
            'email' => 'required|email|unique:profiles,email,' . $profile->id,
            'birthday' => 'required|date',
            'contact_number' => 'nullable|max:20',
        ]);

        $profile->update($validatedData);

        return redirect()->route('profiles.edit')->with('success', 'Profile updated successfully!');
    }
}
