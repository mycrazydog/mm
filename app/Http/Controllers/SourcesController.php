<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Requests\SourcesFormRequest;
use Illuminate\Http\Request;


use App\Source;
use App\Project;


use Sentinel;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Form;
use View;

class SourcesController extends Controller
{
    
    protected $source;
      public function __construct(Source $source)
      {
          $this->source = $source;
      }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //    
        $sources = $this->source->orderBy('name', 'ASC')->paginate(25);  
        return view('manage.sources', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function create()
	{
	    //
	    $page_id = 'source';
	    // Show the page
	    return view('manage.forms.create', compact('page_id'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SourcesFormRequest $request)
    {
        //       
        $source = new Source;
        $source -> name = $request->name;        
        $source -> save();          
        return \Redirect::route('manage.sources.index', array($source->id))
            ->with('message', 'Your source has been created!');
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
		$result = Source::findOrFail($id);
		$page_id = 'source';        
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
    public function update(SourcesFormRequest $request, $id)
    {
        //
        $source = Source::findOrFail($id);
	    $source -> name = $request->name;
	    $source -> save();
	    
	    return \Redirect::route('manage.sources.index', array($source->id))
	        ->with('message', 'Your source has been updated!');     
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
    }
}
