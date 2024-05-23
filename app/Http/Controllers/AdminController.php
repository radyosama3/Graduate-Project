<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adduser()
    {
        return view('admin.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:users,userId|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'type' => ['required', Rule::in(['student', 'instructor', 'admin'])],
            'class_room' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = new User();
        $user->userId = $request->userId;
        $user->name = $request->userName;
        $user->email = $request->userEmail;
        $user->role = $request->userRole;
        $user->class = $request->Class;
        $user->level = $request->level;
        $user->number = $request->userNumber;
        $user->password = Hash::make($request->userPassword);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->back()->with('success', 'User added successfully.');
    }
   
}
