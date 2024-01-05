<?php

namespace App\Http\Controllers;
use App\Models\AddBarangay;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }
    // start barangay
    public function AdminAddBarangay()
    {

        return view('admin.add-barangay');
    }

    // add barangay
    public function AdminAddBarangayPerson(Request $request)
    {
        $request->validate([
            'barangayName' => 'required|max:255',
            'contactNumber' => 'required|max:255',
            'email' => 'required|max:255',
            'contactPerson' => 'required|max:255',
            'contactPersonNumber' => 'required|max:255',
        ]);

        AddBarangay::create($request->all());

        return redirect()->route('admin.add-barangay')
            ->with('alert-success', 'Added Barangay successfully.');

    }

    // delete barangay
    public function AdminDeleteBarangay(Request $request, $id)
    {
        // Find and delete the item
        $barangayDel = AddBarangay::findOrFail($id);
        $barangayDel->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }
    // edit barangay
    public function updateDataCalamity(Request $request, $id)
    {
        $calamity = calamityType::find($id);

        if (! $calamity) {
            return redirect()->back()->with('error', 'Calamity not found.');
        }

        $calamity->calamity_name = $request->calamity_name;
        $calamity->save();

        return response()->json(['message' => 'Calamity updated successfully']);
    }

    // end barangay
    public function AdminManageBarangay()
    {
        $barangay = AddBarangay::all();
        return view('admin.manage-barangay', compact('barangay'));
    }
    public function AdminManageSenior()
    {
        return view('admin.manage-senior');
    }
    public function AdminAddSenior()
    {
        return view('admin.add-senior');
    }
    public function Admin()
    {
        return view('admin.admin');
    }
    public function ViewBarangay()
    {
        return view('admin.barangay');
    }

    public function AdminAgeReport()
    {
        return view('admin.age-report');
    }
    public function ViewBarangayReport()
    {
        return view('admin.barangay-report');
    }
    public function AdminGenderReport()
    {
        return view('admin.gender-report');
    }
}