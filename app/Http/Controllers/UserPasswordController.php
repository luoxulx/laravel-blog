<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPasswordsRequest;
use App\User;

class UserPasswordController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = auth()->user();

        $this->authorize('update', $user);

        return view('users.password', ['user' => $user]);
    }

    /**
     * Generate a personnal access token for the specified resource in storage.
     *
     * @param  UserPasswordsRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserPasswordsRequest $request)
    {
        $user = auth()->user();

        $this->authorize('update', $user);

        $user->update($request->only('password'));

        return redirect()->route('users.password')->withSuccess(__('users.password_updated'));
    }
}
