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
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:14'],
            'age' => ['required'],
            'user_profile_image' => ['image', 'mimes: jpg, jpeg, png'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (! $request->hasFile('user_profile_image')){
            if ($request->gender == 'male'){
                $path = 'uploaded_files/user_profile_image/defaultMale.png';
            }else{
                $path = 'uploaded_files/user_profile_image/defaultFemale.png';
            }
        }else{
            $image_name = time() . '_' . $request->user_profile_image->getClientOriginalName();
            $request->user_profile_image->move(public_path('uploaded_files/user_profile_image'), $image_name);
            $path = 'uploaded_files/user_profile_image/'. $image_name;
        }

//        dd($request, $path);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'age' => $request->age,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'user_profile_image' => $path,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
