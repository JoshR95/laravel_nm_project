<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Block access for demo
        abort(403, 'Profile access is disabled for this demo.');
        // ** UNCOMMENT THIS TO ADD BACK THE PROFILE EDIT PAGE
        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Block access for demo
        abort(403, 'Profile access is disabled for this demo.');
        // $request->user()->fill($request->validated());
        // ** UNCOMMENT THIS TO ADD BACK THE PROFILE EDIT PAGE
        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }
        // $request->user()->save();
        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Block access for demo
        abort(403, 'Profile access is disabled for this demo.');
        // ** UNCOMMENT THIS TO ADD BACK THE PROFILE EDIT PAGE
        // $request->validateWithBag('userDeletion', [
        //     'password' => ['required', 'current_password'],
        // ]);
        // $user = $request->user();
        // Auth::logout();
        // $user->delete();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // return Redirect::to('/');
    }
}
