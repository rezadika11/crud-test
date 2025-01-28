<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        try {
            // Store the department in the database
             $save = Department::create($validate);
             return redirect(route('departments.index'))->with('success', 'Departments success saved.');
        } catch (\Exception $e) {
            return back()->with('error', 'Departments not saved.');
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
        $departments = Department::find($id);

        return view('department.edit', compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        try {
            // Store the department in the database
             $save = Department::where('id',$id)->update([
                'name' => $request->name,
             ]);

             return redirect(route('departments.index'))->with('success', 'Departments success update.');
        } catch (\Exception $e) {
            return back()->with('error', 'Departments not updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Delete the department from the database
             $delete = Department::destroy($id);

             return redirect(route('departments.index'))->with('success', 'Departments success deleted.');
        } catch (\Exception $e) {
            return back()->with('error', 'Departments not deleted.');
        }
    }
}
