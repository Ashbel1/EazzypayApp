<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();
            $message = count($users) > 0 ? 'Users retrieved successfully.' : 'No users found.';
            
            return view('users.show', compact('users', 'message'));
        } catch (\Exception $e) {
            $message = 'An error occurred while retrieving users: ' . $e->getMessage();
            
            return view('users.show', compact('message'));
        }
    }

    public function create()
    {
        return view('Users.create');
    }

    public function edit()
        {
            $userId = Auth::id();
            // Fetch the user data using the authenticated user ID
            $user = User::findOrFail($userId);
            return view('users.edit', compact('user'));
        }
    
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'lastname' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:8',
        ]);
    
        try {
            $user = User::findOrFail($id);
            $user->lastname = $validatedData['lastname'];
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            
            if (!empty($validatedData['password'])) {
                $user->password = bcrypt($validatedData['password']);
            }
            
            $user->save();
    
            return redirect()->back()->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the user: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'lastname' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
    
        try {
            $user = new User();
            $user->lastname = $validatedData['lastname'];
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = bcrypt($validatedData['password']);
            $user->save();
    
            return redirect()->back()->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the user: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
    
            return redirect()->back()->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the user: ' . $e->getMessage());
        }
    }

    // password changing functionality
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'confirm_password' => 'required|same:new_password',
        ]);
    
        $user = Auth::user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return redirect()->route('home')->with('success', 'Password changed successfully!');
    }
}
