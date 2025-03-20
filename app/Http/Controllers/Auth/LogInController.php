<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import User model
use Illuminate\Support\Facades\Hash; // Import Hash for password checking
use Illuminate\Support\Facades\Response; // Import Response facade
use Illuminate\Support\Facades\Log; // Import Log facade for debugging

class LoginController extends Controller
{
    public function username()
    {
        return 'username'; // Using 'username' for authentication
    }

    public function login(Request $request)
    {
        // Validate input fields
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if the username exists
        $user = User::where('username', $credentials['username'])->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Incorrect username.');
        }

        // Check if the password is correct
        if (!Hash::check($credentials['password'], $user->password)) {
            return redirect()->back()->with('error', 'Incorrect password');
        }

        // Authenticate user
        Auth::login($user);
      
        return redirect('/dashboard')->with('success', 'Successfully logged in!'); // Redirect to dashboard
    }

    protected $redirectTo = '/dashboard';
}
