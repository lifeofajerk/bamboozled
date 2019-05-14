<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EditController extends AuthController
{
	// show the edit employee form
    public function index($id)
    {	
		$employee = Employee::where('id', '=', $id)->get();
		return view('edit')->with('employee', $employee);
    }

    public function update($id, Request $request)
    {
		$validated = $request->validate([
			'id' => 'required|integer',
			'first_name' => 'required|max:30',
			'last_name' => 'required|max:30',
			'birthday' => 'required|date',
			'hire_date' => 'required|date',
			'salary' => 'required|integer',
			'social_security' => 'required|unique:employees,social_security,'. $id .'|max:11'
			]);	
	
		Employee::where('id', '=', $id)->update($request->except(['_method','_token', 'id']));
	
		return redirect()->back()->with('success', 'The employee has been updated.')->withInput();
    }

    public function delete($id)
    {
		Employee::where('id', '=', $id)->delete();
		return redirect('/dashboard/search')->with('success', 'The employee has been deleted.');
    }
}
