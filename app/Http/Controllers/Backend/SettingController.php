<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Admin;

class SettingController extends Controller
{
    public function index()
    {
        $admin = auth('admin')->user();
        return view('backend.settings.index', compact('admin'));
    }

   // Update profile
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'password' => 'nullable|confirmed|min:6',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if($request->password){
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect()->route('admin.login')->with('success', 'Account updated successfully!');
    }

    // Delete account
    public function destroy(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        // Validate password
        if(!\Hash::check($request->delete_password, $admin->password)){
            return redirect()->back()->withErrors(['delete_password' => 'Incorrect password.']);
        }

        $admin->delete();

        return redirect()->route('admin.login')->with('success', 'Account deleted successfully!');
    }

}