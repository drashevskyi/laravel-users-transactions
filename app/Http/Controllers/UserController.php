<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Countries;

class UserController extends Controller
{
    /**
     * Show all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): \Illuminate\Http\Response
    {
        $users = User::getUsersBy();

        return response()->view('users.index', ['users' => $users]);
    }
    
    /**
     * Show active users with an Austrian citizenship.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexActiveAt(Request $request): \Illuminate\Http\Response
    {
        $users = User::getUsersBy(User::active_true, Countries::ISO2_AT);

        return response()->view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for editing the user.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user): \Illuminate\Http\Response
    {   
        $countries = Countries::all();
        
        return response()->view('users.edit', ['userDetails' => $user->userDetails, 'countries' => $countries]);
    }

    /**
     * Update user if userDetails exist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        if (is_null($user->userDetails)) {
            abort(404);
        }
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'numeric',
        ]);
        
        $userDetails = $user->userDetails;
        $parameters = $request->all();
        $userDetails->fill($parameters);
        $userDetails->save();

        return redirect()->route('user.index')->with('message', 'User details of user with ID: '.$user->id.' updated.');
    }

    /**
     * Remove user if no userDetails created yet.
     *
     * @param  User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        if (!is_null($user->userDetails)) {
            abort(404);
        }
        
        $user->delete();
        
        return redirect()->route('user.index')->with('message', 'User with ID: '.$user->id.' deleted.');
    }
}
