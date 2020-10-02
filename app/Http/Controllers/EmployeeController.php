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
      Employee::create($request -> all());
      return redirect() -> route('employees.index');
    }
    public function edit() {

    }
    public function destroy($id) {
      $emp = Employee::findOrFail($id);
      $emp -> delete();
      return redirect() -> route('employees.index');
    }
}
