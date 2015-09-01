<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Requests\DepartmentsFormRequest;
use Illuminate\Http\Request;


use App\Department;
use App\Project;
use App\Source;

use Sentinel;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Form;
use View;

class DepartmentsController extends Controller
{
    
    protected $department;
      public function __construct(Department $department)
      {
          $this->department = $department;
      }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //    
        $departments = $this->department->orderBy('name', 'DESC')->paginate(25);  
        return view('manage.departments', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $page_id = 'department';
        // Show the page
        return view('manage.forms.create', compact('page_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(DepartmentsFormRequest $request)
    {
        // 
        $department = new Department;
        $department -> name = $request->name;       
        $department -> save();        

        return \Redirect::route('manage.departments.index', array($department->id))
            ->with('message', 'Your department has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $result = Department::findOrFail($id);
        $page_id = 'department';        
        // Show the page        
        return view('manage.forms.edit',compact('result','page_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(DepartmentsFormRequest $request, $id)
    {          
        //
        $department = Department::findOrFail($id);
	    $department -> name = $request->name;
	    $department -> save();
	    
	    return \Redirect::route('manage.departments.index', array($department->id))
	        ->with('message', 'Your department has been updated!');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $department = Department::findOrFail($id);
        $department->delete();
        return \Redirect::route('manage.departments.index');
        
    }
}
