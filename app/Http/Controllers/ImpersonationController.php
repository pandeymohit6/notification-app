<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ImpersonationController extends Controller
{

    /**
     * User list views
     */
    public function dashboard()
    {
        return view('home');
    }

    /**
     * Impernate user to authenticate
     */
    public function impersonate($userId)
    {
        $user = User::find($userId);
        if ($user) {
            session(['original_user_id' => $userId]);
        }
        Auth::loginUsingId($userId);
        return redirect()->route('home');
    }

    /**
     * stop Impernate user
     */

    public function stopImpersonating()
    {
        session()->forget('original_user_id');
        session()->flush();
        return redirect()->route('users.index');
    }
}
