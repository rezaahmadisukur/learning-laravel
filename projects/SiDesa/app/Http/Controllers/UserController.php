<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function account_list_view()
    {
        $users = User::where('role_id', 2)
            ->where('status', '!=', 'submitted')
            ->paginate(5);
        return view('pages.account-list.index', compact('users'));
    }

    public function account_request_view()
    {
        $users = User::where('status', 'submitted')->paginate(5);
        $residents = Resident::where('user_id', null)->get();

        return view("pages.account-request.index", compact("users", "residents"));
    }

    public function account_approval(Request $request, User $user)
    {
        $request->validate([
            'for' => ['required', Rule::in(['approve', 'reject', 'activate', 'deactivate'])],
            'resident_id' => ['nullable', 'exists:residents,id'],
        ]);

        $for = $request->input('for');

        $user = User::findOrFail($user->id);
        $user->status = $for == "approve" || $for == "activate" ? "approved" : "rejected";
        $user->save();

        $resident_id = $request->input('resident_id');

        if ($request->has('resident_id') && isset($resident_id)) {
            Resident::where('id', $resident_id)
                ->update([
                    'user_id' => $user->id
                ]);
        }

        switch ($for) {
            case 'activate':
                return back()->with('success', "Berhasil mengaktifkan akun");
            case 'deactivate':
                return back()->with('success', "Berhasil menonaktifkan akun");
        }
        return back()
            ->with('success', $for == 'approve' ? "Berhasil menyetujui akun" : "Berhasil menolak akun");
    }

    public function profile_view()
    {
        return view('pages.profile.index');
    }

    public function update_profile(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $user = User::findOrFail($user->id);
        $user->name = $request->input('name');
        $user->save();

        return back()->with('success', "Berhasil mengubah data profil");

    }

    public function change_password_view()
    {
        return view('pages.profile.change-password');
    }

    public function change_password(Request $request, User $user)
    {
        $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8',
        ]);


        $user = User::findOrFail($user->id);

        $currentPasswordIsValid = Hash::check($request->input('old_password'), $user->password);

        if ($currentPasswordIsValid) {
            $user->password = $request->input('new_password');
            $user->save();
            return back()->with('success', "Berhasil mengubah password");
        }
        return back()->with('error', "Gagal mengubah password, Password lama tidak sesuai");
    }

}
