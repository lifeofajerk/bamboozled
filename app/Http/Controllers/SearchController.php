<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\DB;

class SearchController extends AuthController
{
    //show the search page
    public function index()
    {
        return view('search');
    }
    
    // find an employee to edit
    public function FindEmployee(Request $request)
    {
		$employee = Employee::where([['first_name', '=', request('first_name')], ['last_name', '=', request('last_name')]])->get();

		if (count($employee) > 0)
		{
			return redirect()->route('employee', ['id' => $employee[0]['id']]);
		}
		else
		{
			return view('search')->with('search_error', 'The employee was not found');
		}
    }
}
