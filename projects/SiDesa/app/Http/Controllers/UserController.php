<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function account_list_view()
    {
        $users = User::where('role_id', 2)->where('status', '!=', 'submitted')->get();
        return view('pages.account-list.index', compact('users'));
    }

    public function account_request_view()
    {
        $users = User::where('status', 'submitted')->get();

        return view("pages.account-request.index", compact("users"));
    }

    public function account_approval(Request $request, User $user)
    {
        $for = $request->input('for');

        $user = User::findOrFail($user->id);
        $user->status = $for == "approve" || $for == "activate" ? "approved" : "rejected";
        $user->save();

        // if (in_array($for, ['activate', 'deactivate'])) {
        //     return back()
        //         ->with('success', $for == 'activate' ? "Berhasil mengaktifkan akun" : "Berhasil menonaktifkan akun");
        // }

        switch ($for) {
            case 'activate':
                return back()->with('success', "Berhasil mengaktifkan akun");
            case 'deactivate':
                return back()->with('success', "Berhasil menonaktifkan akun");
        }
        return back()
            ->with('success', $for == 'approve' ? "Berhasil menyetujui akun" : "Berhasil menolak akun");
    }

}
