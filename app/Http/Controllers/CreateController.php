<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class CreateController extends AuthController
{    
    // show the create employee form
    public function index()
    {
		return view('create');
    }

    //save new employee
	public function SaveEmployee(Request $request)
	{
		$validated = $request->validate([
			'first_name' => 'required|max:30',
			'last_name' => 'required|max:30',
			'birthday' => 'required|date',
			'hire_date' => 'required|date',
			'salary' => 'required|integer',
			'social_security' => 'required|unique:employees,social_security|max:11'
			]);	
	
		$employee = new Employee();
		$employee->first_name = request('first_name');
		$employee->last_name = request('last_name');
		$employee->birthday = request('birthday');
		$employee->hire_date = request('hire_date');
		$employee->salary = request('salary');
		$employee->social_security  = request('social_security');
		$employee->save();
	
		return redirect()->back()->with('success', 'The employee has been saved.')->withInput(); 
	}
}
