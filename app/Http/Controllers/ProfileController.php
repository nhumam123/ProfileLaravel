<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

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
            'profile_image_path' => 'nullable',
            'summary' => 'nullable|max:1000',
            'expertise' => 'nullable|max:1000',
            'email' => 'required|email|unique:profiles,email,' . $profile->id,
            'birthday' => 'required|date',
            'contact_number' => 'nullable|max:20',
        ]);


        if ($request->hasFile('profile_image_path')) {
            $image = $request->file('profile_image_path');
            if ($image->isValid()) {
                // Delete previous profile image
                if ($profile->profile_image_path) {
                    Storage::delete('public/profiles/' . $profile->profile_image_path);
                }
                $imageName = 'profile-'. time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/profiles', $imageName);

                // Update profile_image_path in database
                $validatedData['profile_image_path'] = $imageName;
                $profile->update($validatedData);
            }
        }

        $profile->update($validatedData);

        return redirect()->route('profiles.edit')->with('success', 'Profile updated successfully!');
    }

}
