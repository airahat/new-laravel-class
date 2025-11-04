<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\RegisterConfirmationMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use App\Models\Roles;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles= Roles::all();
        return view('admin.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
                'first_name' => 'required|min:2|max:20',
                'last_name' => ['required', 'min:2', 'max:20'],
                'email' => 'required|email',
                // 'photo' => ['mimes:jpg,png,jpeg', 'image', 'max:2048', 'dimensions:1/1,width=200,height=200'],
                'password' => ['required', 'min:6', 'confirmed']
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id' => $request->role,
            // 'photo' => $photo,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));
        $u = User::select('u.first_name', 'u.last_name', 'r.name as role')
        ->from('users as u')
        ->join('roles as r', 'u.role_id', '=', 'r.id')
        ->where('u.id', $user->id)
        ->first();
        // dd($u);
         Mail::to($user->email)->send(new RegisterConfirmationMail($u));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
