<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    // Display a listing of profiles (admins can view all users' profiles)
    public function index()
    {
        $profiles = Profile::with('user')->get();
        return view('admin.profiles.index', compact('profiles'));
    }

    // Show the form for creating a new profile
    public function create()
    {
        $users = User::doesntHave('profile')->where('role_id', '!=', 1)->get(); // Exclude super admin users
        return view('admin.profiles.create', compact('users'));
    }
    // Display the specified profile
public function show(Profile $profile)
{
    return view('admin.profiles.show', compact('profile'));
}

    // Store a newly created profile in storage
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:profiles,user_id',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile picture upload
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        Profile::create([
            'user_id' => $request->user_id,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'bio' => $request->bio,
            'profile_picture' => $profilePicturePath,
        ]);

        return redirect()->route('admin.profiles.index')->with('success', 'Profile created successfully.');
    }

    // Show the form for editing the specified profile
    public function edit(Profile $profile)
    {
        // Prevent editing super admin profiles
        if ($profile->user->role->name === 'super_admin') {
            return redirect()->route('admin.profiles.index')->with('error', 'Cannot edit Super Admin profile.');
        }

        return view('admin.profiles.edit', compact('profile'));
    }

    // Update the specified profile in storage
    public function update(Request $request, Profile $profile)
    {
        if ($profile->user->role->name === 'super_admin') {
            return redirect()->route('admin.profiles.index')->with('error', 'Cannot edit Super Admin profile.');
        }

        $request->validate([
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($profile->profile_picture && Storage::disk('public')->exists($profile->profile_picture)) {
                Storage::disk('public')->delete($profile->profile_picture);
            }

            // Store the new profile picture
            $profile->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $profile->update($request->only('phone_number', 'address', 'date_of_birth', 'bio'));

        return redirect()->route('admin.profiles.index')->with('success', 'Profile updated successfully.');
    }

    // Remove the specified profile from storage
    public function destroy(Profile $profile)
    {
        if ($profile->user->role->name === 'super_admin') {
            return redirect()->route('admin.profiles.index')->with('error', 'Cannot delete Super Admin profile.');
        }

        // Delete the profile picture if it exists
        if ($profile->profile_picture && Storage::disk('public')->exists($profile->profile_picture)) {
            Storage::disk('public')->delete($profile->profile_picture);
        }

        $profile->delete();
        return redirect()->route('admin.profiles.index')->with('success', 'Profile deleted successfully.');
    }
}
