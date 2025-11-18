<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return view('update');
    }

    // public function menu(){
    //     $id = Auth::id();
    //     $user = User::findOrFail($id);
    //     return view('panel/components/menu', compact('user'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function edit()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('panel/edit', compact('user'));
    }

    /**
     * Display the specified resource.
     */
    public function show()

    {
        $id = Auth::id();
        $user = User::find($id);
        return view('panel/profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $id = Auth::id();
        $user = User::find($id);
        $data = $request->validate([
            'login' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email,' . $user->id,
            'password' => 'nullable|string|confirmed|min:8',
            'phone_number' => 'required|numeric|phone:BJ',

        ]
    ,
      [
        'phone_number.phone' =>'This :attribute must be a valid number.',
      ]
    );

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('profile.show')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/')
            ->with('success', 'User deleted successfully');
    }
}
