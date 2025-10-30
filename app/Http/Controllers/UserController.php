<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\support\Facades\DB;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::from("users as u")
            ->select("u.id", "u.first_name", "u.email", "u.role_id","u.photo", "r.name as role")
            ->join("roles as r", "u.role_id", "=", "r.id")

            ->orderBy("u.id", "desc")
            ->paginate(10);
        // dd($users);
        return view("admin.pages.users.index", compact("users"));
    }
    //     public function index() {
    //     $users = User::from("users as u")
    //     ->select("u.id", "u.first_name","u.email", "u.role_id", "r.name as role")
    //     ->join("roles as r", "u.role_id", "=", "r.id")

    //     ->orderBy("u.id", "desc")
    //     ->get();
    //     // dd($users);
    //     return view("admin.pages.users.index", compact("users"));
    // }
    //     public function index() {
    //     $users = User::select("users.id", "users.first_name", "users.role_id", "roles.name")
    //     ->join("roles", "users.role_id", "=", "roles.id")
    //     ->where("users.role_id", 3)
    //     ->orderBy("users.id", "desc")
    //     ->get();
    //     dd($users);
    // }
    //     public function index() {
    //     $users = DB::table("users as u")
    //     ->select("u.id", "u.first_name", "u.role_id", "r.name as role")
    //     ->join("roles as r", "u.role_id", "=", "r.id")
    //     ->where("u.role_id", 3)
    //     ->orderBy("u.id", "desc")
    //     ->get();
    //     dd($users);
    // }


    public function show($id)
    {
        // $user = User::find($id);
        $user = User::select("u.id", "u.first_name", "u.email", "u.role_id", "u.photo", "r.name as role")
            ->from("users as u")
            ->join("roles as r", "u.role_id", "=", "r.id")
            ->where("u.id", $id)
            ->orderBy("u.id", "desc")
            ->first();
        return view('admin.pages.users.show', compact("user"));
        // return view('pages.about');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        // $user = User::where("user_id", $id)->first(); if something other that id
        $user->delete();
        // dd("Deleted");
        return redirect()->route("users.index")->with("success", "User Deleted Successfully");
    }
    public function create()
    {

        $roles = Roles::all();
        // dd($roles);
        return view("admin.pages.users.create", compact("roles"));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                // 'first_name' => 'required|min:2|max:20',
                // 'last_name' => ['required', 'min:2', 'max:20'],
                // 'email' => 'required|email',
                'photo' => ['mimes:jpg,png,jpeg', 'image', 'max:2048', 'dimensions:1/1,width=200,height=200'],
                // 'password' => ['required', 'min:6', 'confirmed']

            ],
            [
                'photo.mimes' => 'Profile image must be jpg or png ',
                'photo.dimensions' => 'Image dimensions must be 200x200 ',
            ]
        );

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('users', 'public');
        } else {
            $photo = null;

        }

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id' => $request->role,
            'photo' => $photo,
            'password' => Hash::make($request->password)
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully!');
    }


    public function edit($id)
    {

        $user = User::find($id);
        $roles = Roles::all();
        $page = request('page', 1);

        // dd($page);
        return view("admin.pages.users.edit", compact("user", "roles", "page"));
    }
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);


        $request->validate([
            'first_name' => 'required|min:2|max:20',
            'last_name' => ['required', 'min:2', 'max:20'],
            'email' => 'required|email',

        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id' => $request->role,

        ]);


        return redirect()->route('users.index', ['page' => $request->page])
            ->with('success', 'User updated successfully!');
    }



}
