<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Department;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::with('department')->get();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $position = [
            'manager' => 'Manager',
            'staff' => 'staff',
            'admin' => 'admin',
        ];
        $departmens = Department::all();
        return view('employees.create', compact('position','departmens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' =>'required|string|max:255',
            'salary' =>'required|integer',
            'position' =>'required|string|max:255',
            'department_id' =>'required',
        ]);

        try {
            //code...
            Employees::create($validate);
            return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
        } catch (\Exception $e) {
            //throw $e;
            return redirect()->route('employees.index')->with('error', 'Failed to create employee.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employees = Employees::with('department')->findOrFail($id);

        $departmens = Department::all();

        $position = [
            'manager' => 'Manager',
            'staff' => 'staff',
            'admin' => 'admin',
        ];

        return view('employees.edit', compact('employees','position','departmens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' =>'required|string|max:255',
            'salary' =>'required|integer',
            'position' =>'required|string|max:255',
            'department_id' =>'required',
        ]);

        try {
            // Update the department in the database
            $update = Employees::where('id', $id)->update([
                'name' => $request->name,
                'salary' => $request->salary,
                'position' => $request->position,
                'department_id' => $request->department_id,
            ]);

            return redirect()->route('employees.index')->with('success', 'Employees updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Employees not updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Delete the department from the database
             $delete = Employees::destroy($id);

             return redirect(route('employees.index'))->with('success', 'Employees success deleted.');
        } catch (\Exception $e) {
            return back()->with('error', 'Employees not deleted.');
        }
    }
}
