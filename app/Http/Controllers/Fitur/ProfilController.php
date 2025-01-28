<?php

namespace App\Http\Controllers\Fitur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfilController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index(){
        return view('Layouts.profile');
    }    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    // public function store(Request $request){
    //     $request->validate([
    //         'profil_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'about' => 'nullable|string|max:255',
    //         'company' => 'required|string|max:255',
    //         'country' => 'required|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'phone' => 'required|string|max:255',
    //         'ig_account' => 'nullable|string|max:255',
    //         'fb_account' => 'nullable|string|max:255',
    //         'tw_account' => 'nullable|string|max:255',
    //         'linkedin_account' => 'nullable|string|max:255'
    //     ]);

    //     // Get the authenticated user
    // $user = Auth::user();

    // // Check if the user already has a profile
    // $profile = $user->profile ?? new Profile();

    // // Assign the validated data to the profile
    // $profile->about = $request->about;
    // $profile->company = $request->company;
    // $profile->country = $request->country;
    // $profile->city = $request->city;
    // $profile->address = $request->address;
    // $profile->phone = $request->phone;
    // $profile->ig_account = $request->ig_account;
    // $profile->fb_account = $request->fb_account;
    // $profile->tw_account = $request->tw_account;
    // $profile->linkedin_account = $request->linkedin_account;

    // // Handle the profile picture upload
    // if ($request->hasFile('profil_picture')) {
    //     // Store the uploaded file in the 'public/profiles' directory
    //     $path = $request->file('profil_picture')->store('profiles', 'public');
    //     $profile->profil_picture = $path; // Save the file path in the database
    // }

    // // Save the profile data
    // $user->profile->save($profile);

    // // Redirect back with a success message
    // return redirect()->route('dashboard')->with('success', 'Profile completed successfully.');
    // }

     // Method to handle the update request     
     /**
      * update
      *
      * @param  mixed $request
      * @return void
      */
     public function update(Request $request)
     {
         $request->validate([
             'profil_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'about' => 'nullable|string|max:255',
             'company' => 'required|string|max:255',
             'country' => 'required|string|max:255',
             'city' => 'required|string|max:255',
             'address' => 'required|string|max:255',
             'phone' => 'required|string|max:255',
             'ig_account' => 'nullable|string|max:255',
             'fb_account' => 'nullable|string|max:255',
             'tw_account' => 'nullable|string|max:255',
             'linkedin_account' => 'nullable|string|max:255'
         ]);
 
         // Get the authenticated user
         $user = Auth::user();
         dd($user);
         // Get the user's profile
         $profile = $user->profile;
 
         // Assign the validated data to the profile
         $profile->about = $request->about;
         $profile->company = $request->company;
         $profile->country = $request->country;
         $profile->city = $request->city;
         $profile->address = $request->address;
         $profile->phone = $request->phone;
         $profile->ig_account = $request->ig_account;
         $profile->fb_account = $request->fb_account;
         $profile->tw_account = $request->tw_account;
         $profile->linkedin_account = $request->linkedin_account;
 
         // Handle the profile picture upload
         if ($request->hasFile('profil_picture')) {
             // Store the uploaded file in the 'public/profiles' directory
             $path = $request->file('profil_picture')->store('profiles', 'public');
             $profile->profil_picture = $path; // Save the file path in the database
         }
 
         // Save the updated profile data
         $profile->save();
 
         // Redirect back with a success message
         return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
     }
}
