<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Location;
use App\Task;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
      $emps = Employee::all();
      return view('employees.index', compact('emps'));
    }
    public function show($id) {
      $emp = Employee::findOrFail($id);
      return view('employees.show', compact('emp'));
    }
    public function create() {
      $locs = Location::all();
      return view('employees.create', compact('locs'));
    }
    public function store(Request $request) {

      $validatedData = $request -> validate([
        'firstname' => 'bail|required|alpha|max:60',
        'lastname' => 'required|alpha|max:60',
        'date_of_birth' => 'required|date',
        'private_code' => 'required|digits_between:1,15',
        ]);

      Employee::create($request -> all());
      return redirect() -> route('employees.index');

    }
    public function edit($id) {
      $emp = Employee::findOrFail($id);
      $locs = Location::all();
      return view('employees.edit', compact('emp','locs'));
    }
    public function update(Request $request, $id) {

      $validatedData = $request -> validate([
        'firstname' => 'bail|required|alpha|max:60',
        'lastname' => 'required|alpha|max:60',
        'date_of_birth' => 'required|date',
        'private_code' => 'required|digits_between:1,15',
        ]);

      $data = $request -> all();
      $emp = Employee::findOrFail($id);
      $emp -> update($data);

      return redirect() -> route('employees.index');

    }
    public function destroy($id) {
      $emp = Employee::findOrFail($id);
      $emp -> delete();
      return redirect() -> route('employees.index');
    }
}
