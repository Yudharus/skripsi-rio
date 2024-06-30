<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'bagian' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        User::create($request->all());

        return redirect()->route('user')->with('success', 'User added successfully.');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'bagian' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);
    
        $user = User::find($id);
    
        if ($user) {
            $user->update($request->all());
            return redirect()->route('user')->with('success', 'User updated successfully.');
        }
    
        return redirect()->route('user')->with('error', 'user not found.');
    }

    public function destroy($id) {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('user')->with('success', 'user deleted successfully.');
        }

        return redirect()->route('user')->with('error', 'user not found.');
    }
}
