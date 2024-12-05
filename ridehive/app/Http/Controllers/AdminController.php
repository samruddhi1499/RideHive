<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Validation\Rule;



class AdminController extends Controller
{
    public function showVendors()
    {
        $vendors = User::where('role', 'Vendor')->get();
        return view('admin.vendors', compact('vendors'));
    } 

    public function showUsers()
    {

        $users = User::where('role', 'User')->get();
        return view('admin.view-users', compact('users'));
        // Fetch all users
        
    }

    public function deleteUser($user_id)
{
    // Find the user by ID and delete
    $user = \App\Models\User::find($user_id);

    if ($user) {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    return redirect()->route('admin.users')->with('error', 'User not found.');
}


public function showTransactions()
{
    // Eager load the user relationship to avoid N+1 query issues
    $payments = Payment::with('user')->get();

    return view('admin.transaction-history', compact('payments'));
}

    public function addVendor(Request $request)
{
    $request->validate([
        'vendor_name' => 'required|string|max:100',
        'vendor_email' => 'required|email|unique:users,email',
        'vendor_contact' => 'required|string|max:20',
    ]);

    \App\Models\User::create([
        'name' => $request->vendor_name,
        'email' => $request->vendor_email,
        'contact' => $request->vendor_contact, // Save contact info
        'password' => bcrypt('defaultpassword'), // Set a default password
        'role' => 'Vendor', // Assign vendor role
        'status' => 'Active', // Default status
    ]);

    return redirect()->route('admin.vendors')->with('success', 'Vendor added successfully.');
}

public function storeVendor(Request $request)
    {
        $request->validate([
            'vendor_name' => 'required|string|max:100',
            'vendor_email' => 'required|email|unique:users,email',
            'vendor_contact' => 'required|string|max:20',
        ]);

        User::create([
            'name' => $request->vendor_name,
            'email' => $request->vendor_email,
            'contact' => $request->vendor_contact,
            'password' => bcrypt('defaultpassword'), // Default password
            'role' => 'Vendor',
            'status' => 'Active',
        ]);

        return redirect()->route('admin.vendors')->with('success', 'Vendor added successfully.');
    }

    public function destroyVendor(User $user)
    {
        if ($user->role === 'Vendor') {
            $user->delete();
            return redirect()->route('admin.vendors')->with('success', 'Vendor deleted successfully.');
        }

        return redirect()->route('admin.vendors')->with('error', 'Cannot delete this user.');
    }

    public function editVendor(User $user)
{
    if ($user->role === 'Vendor') {
        return view('admin.edit-vendor', compact('user'));
    }

    return redirect()->route('admin.vendors')->with('error', 'Cannot edit this user.');
}

public function updateVendor(Request $request, User $user)
{
    if ($user->role === 'Vendor') {
        $request->validate([
            'vendor_name' => 'required|string|max:100',
            'vendor_email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->user_id, 'user_id'), // Use `user_id` as the key
            ],
            'vendor_contact' => 'required|string|max:20',
        ]);

        $user->update([
            'name' => $request->vendor_name,
            'email' => $request->vendor_email,
            'contact' => $request->vendor_contact,
        ]);

        return redirect()->route('admin.vendors')->with('success', 'Vendor updated successfully.');
    }

    return redirect()->route('admin.vendors')->with('error', 'Cannot update this user.');
}


}
