<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            //'name' => ['required', 'string', 'max:255'],
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //for image
        if ($image = $request->file('image')) {
            $destinationPath = 'images/backend/users';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $request['image'] = "$profileImage";
        }
        // image ends here

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            //'role' => $request->role,
            'image' => $profileImage,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        if(Auth::user()->role==='admin'){
            redirect('admin');
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
