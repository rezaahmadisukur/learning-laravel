<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function account_request_view()
    {
        $users = User::where('status', 'submitted')->get();

        return view("pages.account-request.index", compact("users"));
    }

    public function account_approval(Request $request, User $user)
    {
        $for = $request->input('for');

        $user = User::findOrFail($user->id);
        $user->status = $for == "approve" ? "approved" : "rejected";
        $user->save();

        return back()
            ->with('success', $for == 'approve' ? "Berhasil menyetujui akun" : "Berhasil menolak akun");
    }
}
