<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class FrontEndController extends Controller
{

    public function HomePage()
    {
        // $userdetails = UserDetails::find(45);
        $userdetail = UserDetails::withTrashed()->paginate(7);
        // session()->put('name', 'Bilal');
        // session()->put('user_id', 47);
        session()->flash('date', date('d-M-Y'));
        return view("welcome", compact("userdetail"));
    }





    public function UserRegisterPage()
    {
        // return session()->get('user_id');
        return view("user_register");
    }

    public function Create()
    {

        return view('user.create');
    }
    public function Save(Request $request)
    {

        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:M,F',
            'address' => 'required|string',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'documents.*' => 'nullable|file|mimes:pdf,jpeg,jpg,doc,docx,zip|max:5000',
        ]);

        // Handle profile picture upload
        $profilePath = null;
        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profilePath = $profile->store('profiles', 'public');
        }

        // Handle supporting documents upload
        $documentsPaths = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $documentsPaths[] = $file->store('documents', 'public');
            }
        }

        // Save user details
        UserDetails::create([
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'profile_pic' => $profilePath,
            'documents' => json_encode($documentsPaths), // Store as JSON
        ]);

        return redirect()->route('welcome');
    }
    public function Search(Request $request)
    {
        $search = $request->input('search');

        if ($search === null || trim($search) === '') {
            return redirect()->route('welcome'); // Adjust to your home route name if different
        } elseif ($search) {
            $userdetail = UserDetails::where('name', 'like', '%' . $search . '%')
                ->orWhere('user_id', 'like', '%' . $search . '%')
                ->orWhere('dob', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->latest()
                ->paginate(8);
        } else {

            $userdetail = UserDetails::orderBy('user_id', 'desc')->paginate(7);
        }

        return view('welcome', compact('userdetail'));
    }



    public function Edit($user_id)
    {

        $userdetail = UserDetails::find($user_id);

        return view("user.edit", ['userdetail' => $userdetail]);
    }
    public function update(Request $request, $user_id)
    {
        $user = UserDetails::find($user_id);

        $user->update([
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('welcome');
    }
    public function Delete($user_id)
    {
        $user = UserDetails::find($user_id)->delete();
        return redirect()->route('welcome');
    }
    public function ViewProfile($user_id)
    {
        $userDetails = UserDetails::find($user_id);

        return view("user.profile", ['userDetails' => $userDetails]);
    }
}
