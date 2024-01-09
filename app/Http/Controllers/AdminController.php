<?php

namespace App\Http\Controllers;
use App\Models\AddBarangay;
use App\Models\seniorCitizen;
use App\Models\barangayUsers;
use App\Models\adminTables;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $brgyCount = AddBarangay::whereNotNull('barangayName')->count();
        $seniorCount = seniorCitizen::count();
        $withPensionCount = seniorCitizen::where('pensionstatus','with pension')->count();
        $withoutPensionCount = seniorCitizen::where('pensionstatus','without pension')->count();
        $femaleCount = seniorCitizen::where('gender','Female')->count();
        $maleCount = seniorCitizen::where('gender','Male')->count();

        return view('admin.index', compact('brgyCount','seniorCount','withPensionCount','withoutPensionCount','femaleCount','maleCount'));
    }
    // start barangay
    public function AdminAddBarangay()
    {

        return view('admin.add-barangay');
    }

    // add barangay
    public function AdminAddBarangayPersonel(Request $request)
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
// start add admin
    public function Admin()

    {
        $admin = adminTables::all();

        return view('admin.admin-manage',  compact('admin'));
    }

    public function AdminAddAdmin(Request $request)
    {

        $request->validate([
            'fullName' => 'required|max:255',
            'contactNumber' => 'required|max:255',
            'userName' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        $hashedPassword = Hash::make($request->input('password'));

        adminTables::create([
            'fullName' => $request->input('fullName'),
            'contactNumber' => $request->input('contactNumber'),
            'userName' => $request->input('userName'),
            'password' => $hashedPassword,
        ]);
        return redirect()->route('admin')
        ->with('alert-success', 'Added Barangay User successfully.');

    }
    // start delete admin
    public function AdminDeleteAdminUser(Request $request, $id)
        {
            $adminDel = adminTables::findOrFail($id);
            $adminDel->delete();

            return response()->json(['message' => 'Item deleted successfully']);
        }

        // start update admin
        public function AdminUpdateAdminUser(Request $request, $id)
        {
            $adminuser = adminTables::find($id);

            if (! $adminuser) {
                return redirect()->back()->with('error', 'barangay user not found.');
            }
            $adminuser->fullName = $request->fname;
            $adminuser->contactNumber = $request->contact;
            $adminuser->userName = $request->uname;

            $adminuser->save();

            return response()->json(['message' => 'updated successfully']);
        }

    // end aadmin
    // start add brgy user
    public function ViewBarangay()
    {
        $brgy = AddBarangay::all();

        $brgyUsers = barangayUsers::all();


        return view('admin.barangay', compact('brgy','brgyUsers'));
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
        $hashedPassword = Hash::make($request->input('password'));

        barangayUsers::create([
            'barangayID' => $request->input('barangayID'),
            'fullName' => $request->input('fullName'),
            'contactNumber' => $request->input('contactNumber'),
            'userName' => $request->input('userName'),
            'password' => $hashedPassword,
        ]);
        return redirect()->route('admin.barangay')
        ->with('alert-success', 'Added Barangay User successfully.');

    }

    // start delete brgy User

    public function AdminDeleteBarangayUser(Request $request, $id)
    {
        // Find and delete the item
        $barangayUser = barangayUsers::findOrFail($id);
        $barangayUser->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }

    // start update barangay user

    public function AdminUpdateBarangayUser(Request $request, $id)
    {
        $brgyuser = barangayUsers::find($id);

        if (! $brgyuser) {
            return redirect()->back()->with('error', 'barangay user not found.');
        }

        $brgyuser->barangayID = $request->brgy;
        $brgyuser->fullName = $request->fname;
        $brgyuser->contactNumber = $request->num;
        $brgyuser->userName = $request->uname;

        $brgyuser->save();

        return response()->json(['message' => 'updated successfully']);
    }
    // end brgy user

    public function AdminAgeReport()
    {
        $ageBrackets = seniorCitizen::select(
            DB::raw('CASE
                WHEN age BETWEEN 0 AND 5 THEN "0 to 5"
                WHEN age BETWEEN 6 AND 10 THEN "6 to 10"
                WHEN age BETWEEN 11 AND 20 THEN "11 to 20"
                WHEN age BETWEEN 21 AND 30 THEN "21 to 30"
                WHEN age BETWEEN 31 AND 40 THEN "31 to 40"
                WHEN age BETWEEN 41 AND 50 THEN "41 to 50"
                WHEN age BETWEEN 51 AND 60 THEN "51 to 60"
                ELSE "60 up"
            END AS age_bracket'),
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('age_bracket')
        ->get();
        return view('admin.age-report' ,compact('ageBrackets'));
    }
    public function ViewBarangayReport()
    {
        // $barangayCounts = seniorCitizen::select(
        //     'brgy',
        //     DB::raw('COUNT(*) as count')
        // )
        // ->groupBy('brgy')
        // ->get();
        return view('admin.barangay-report');
    }
    public function AdminGenderReport()
    {
        $femaleCount = seniorCitizen::where('gender','Female')->count();
        $maleCount = seniorCitizen::where('gender','Male')->count();
        return view('admin.gender-report', compact('femaleCount','maleCount'));
    }
}
