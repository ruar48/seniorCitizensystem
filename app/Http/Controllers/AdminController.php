<?php

namespace App\Http\Controllers;
use App\Models\AddBarangay;
use App\Models\seniorCitizen;
use Illuminate\Support\Facades\Hash;

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
            'fullName' => 'required|max:255',
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
    public function AdminUpdateBarangay(Request $request, $id)
    {
        $brgy = AddBarangay::find($id);

        if (! $brgy) {
            return redirect()->back()->with('error', 'barangay not found.');
        }

        $brgy-> barangayName = $request->brgy;
        $brgy-> contactNumber= $request->contact;
        $brgy-> email = $request->email;
        $brgy->contactPerson = $request->contactPerson;
        $brgy->contactPersonNumber = $request->contactPersonNumber;

        $brgy->save();

        return response()->json(['message' => 'barangay updated successfully']);
    }


    public function AdminManageBarangay()
    {
        $barangay = AddBarangay::all();
        return view('admin.manage-barangay', compact('barangay'));
    }
     // end barangay

    //  start senior citizen
    public function AdminManageSenior()
    {
        $senior = seniorCitizen::all();
        return view('admin.manage-senior', compact('senior'));
    }

    // add senior
    public function AdminAddSeniorCitizen(Request $request)
    {
        $request->validate([
            'seniorID' => 'required|max:255',
            'firstName' => 'required|max:255',
            'middleName' => 'max:255',
            'lastName' => 'required|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'birthday' => 'required|date',
            'age' => 'integer',
            'birthPlace' => 'required|max:255',
            'address' => 'required',
            'contactNumber' => 'required|max:20',
            'pensionstatus' => 'required|max:255',
            'monthlyPension' => 'required|numeric',
            'status' => 'required|max:255',
            'emergencyContactPerson' => 'required|max:255',
            'emergencyContactPersonNumber' => 'required|max:20',
            'emergencyContactPersonAddress' => 'required',
        ]);

        seniorCitizen::create($request->all());

        return redirect()->route('admin.add-barangay')
            ->with('alert-success', 'Added Barangay successfully.');
    }
    // update senior

    public function AdminUpdateSenior(Request $request, $id)
    {
        $senior = seniorCitizen::find($id);

        if (! $senior) {
            return redirect()->back()->with('error', 'barangay not found.');
        }

        $senior-> seniorID= $request->srID;
        $senior-> firstName= $request->firstName;
        $senior-> middleName = $request->middleName;
        $senior->lastName = $request->lastName;
        $senior->gender = $request->gender;
        $senior-> birthday= $request->bday;
        $senior-> age= $request->age;
        $senior-> address = $request->address;
        $senior->monthlyPension = $request->monthlyPension;
        $senior->status = $request->status;
        $senior-> emergencyContactPerson= $request->contactPerson;
        $senior-> emergencyContactPersonNumber = $request->contactNumber;
        $senior->emergencyContactPersonAddress = $request->contactAddress;
        $senior->save();

        return response()->json(['message' => 'Senior Citezen updated successfully']);
    }

// start delete senior
public function AdminDeleteSenior(Request $request, $id)
{
    // Find and delete the item
    $seniorDel = seniorCitizen::findOrFail($id);
    $seniorDel->delete();

    return response()->json(['message' => 'Item deleted successfully']);
}
    public function AdminAddSenior()
    {
        return view('admin.add-senior');
    }
    // end senior citizen


    // $hashedPassword = Hash::make($request->input('password'));

    public function Admin()
    {
        return view('admin.admin');
    }
    // start add brgy user
    public function ViewBarangay()
    {
        $brgy = AddBarangay::all();
        return view('admin.barangay', compact('brgy'));
    }

    public function AdminAddBrgyUser(Request $request)
    {
        $request->validate([
            'barangayID' => 'required|max:255',
            'fullName' => 'required|max:255',
            'contactNumber' => 'required|max:255',
            'userName' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        AddBarangay::create($request->all());

        return response()->json(['message' => 'Added successfully']);


    }
    // end brgy user

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