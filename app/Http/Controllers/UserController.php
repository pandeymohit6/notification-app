<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\TwilioSMS;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userlist = User::get(); //->paginate(5); we can use here if need pagination
        return view('users.userlist')->with('userlist', $userlist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, TwilioSMS $sendSms)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        // $sendSms->send();
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
}
