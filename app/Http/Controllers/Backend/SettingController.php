<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    public function index()
    {
        $admin = auth('admin')->user();
        return view('backend.settings.index', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = auth('admin')->user();

        if ($admin->id != $id) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('admins')->ignore($admin->id),
            ],
            'password' => 'nullable|min:6|confirmed',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.login')->with('success', 'Account updated successfully');
    }

    public function destroy($id)
    {
        $admin = auth('admin')->user();

        if ($admin->id != $id) {
            abort(403);
        }

        auth('admin')->logout();
        $admin->delete();

        return redirect()->route('admin.login')->with('success', 'Account deleted successfully');
    }
}
