<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Admin;

class SettingController extends Controller
{
    // Show profile settings
    public function index()
    {
        $admin = auth('admin')->user();
        return view('backend.settings.index', compact('admin'));
    }

    // Update admin profile
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'old_password' => 'required|string',
            'password' => 'nullable|string|confirmed|min:6',
        ]);

        // Check old password
        if (!Hash::check($request->old_password, $admin->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.login')->with('success', 'Profile updated successfully! Please login again.');
    }

    // Delete admin account
    public function destroy(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'delete_password' => 'required|string',
        ]);

        if (!Hash::check($request->delete_password, $admin->password)) {
            return redirect()->back()->withErrors(['delete_password' => 'Password is incorrect.']);
        }

        $admin->delete();

        return redirect()->route('admin.login')->with('success', 'Account deleted successfully!');
    }
}
