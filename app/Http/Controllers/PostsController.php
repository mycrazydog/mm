<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Requests\PostsFormRequest;
use Illuminate\Http\Request;

use App\Post;
use App\Department;
use App\Project;
use App\Source;
use App\Staff;

use Sentinel;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Form;
use View;
use DB;

class PostsController extends Controller
{
    
    protected $post;
      public function __construct(Post $post)
      {
          $this->post = $post;
      }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        
        
        if(Sentinel::getUser()->inRole('admins')) {      
        	$posts = $this->post->orderBy('created_at', 'DESC')->paginate(10); 
        }else{        
	        $user = Sentinel::getUser()->id;
	        $posts = $this->post->where('user_id', $user)->orderBy('created_at', 'DESC')->paginate(10);
        }
       
        
         
        
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        //Populate the select(dropdowns)
        $department_options = Department::lists('name', 'id');
        //$project_options = Project::lists('name', 'id');
        $source_options = Source::lists('name', 'id');        
        $staff_options = Staff::select('Id', DB::raw('CONCAT(first_name, " ", last_name) AS full_name'))->orderBy('first_name')->lists('full_name', 'Id');
        
        // Show the page
        return view('posts.forms.create', compact('department_options','source_options', 'staff_options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PostsFormRequest $request)
    {
        //
        $user = Sentinel::getUser()->id;
        
        $post = new Post;
        //$post -> user_id = Auth::id();
        $post -> user_id = $user;
        $post -> headline = $request->headline;
        $post -> media_mention = (\Input::get('media_mention') == 1) ? 1 : 0;
        $post -> presentation = (\Input::get('presentation') == 1) ? 1 : 0;
        $post -> meeting = (\Input::get('meeting') == 1) ? 1 : 0;
        $post -> sponsored_event = (\Input::get('sponsored_event') == 1) ? 1 : 0;
        $post -> on_campus_collaboration = (\Input::get('on_campus_collaboration') == 1) ? 1 : 0;
        $post -> off_campus_collaboration = (\Input::get('off_campus_collaboration') == 1) ? 1 : 0;
        $post -> development = (\Input::get('development') == 1) ? 1 : 0;
        $post -> satifaction_survey = (\Input::get('satifaction_survey') == 1) ? 1 : 0;
        $post -> achievement = (\Input::get('achievement') == 1) ? 1 : 0;
        $post -> testimonial = (\Input::get('testimonial') == 1) ? 1 : 0;
        $post -> other = (\Input::get('other') == 1) ? 1 : 0;
        $post -> other_desc = $request->other_desc;   
		$post -> source_id = ($request->source_id == null) ? null : $request->source_id;
		$post -> publish_date = ($request->publish_date == null) ? null : date('Y-m-d', strtotime($request->publish_date));;    
		$post -> writer_collaborator = $request->writer_collaborator;
		$post -> department_id = ($request->department_id == null) ? null : $request->department_id;
		//$post -> project_id = ($request->project_id == null) ? null : $request->project_id;
        $post -> notes = $request->notes;
        $post -> url = $request->url;
        

        
    
		if ($request->file('attachment')) {
			$file = $request->file('attachment');
			$filename = $file->getClientOriginalName();
			$extension = $file -> getClientOriginalExtension();
			$name = $user . '-' . time() . '-' . str_slug($filename, "-") . '.' .$extension;			
			//$file = $file->move('/var/www/vhosts/lgscharlotte.org/private/uploads/', $name);
			$file = $file->move(public_path() . '/resources/', $name);		
			$post->attachment = $name;
		}	
	
        
        
        
//        $attachment = "";
//        if(Input::hasFile('attachment'))
//        {
//            $file = Input::file('attachment');
//            $filename = $file->getClientOriginalName();
//            $extension = $file -> getClientOriginalExtension();
//            $picture = sha1($filename . time()) . '.' . $extension;
//        }
//        $post -> attachment = $attachment;
        
        
        $post -> save();
        
        
         if (Input::get('staff_list')) {
        	$post->staffs()->sync(Input::get('staff_list'));  
        }    
        
//        // Move the files
//        if(Input::hasFile('attachment'))
//        {
//            $destinationPath = public_path() . '/resources/'.$post->id.'/';
//            Input::file('attachment')->move($destinationPath, $attachment);
//        }
        
        return \Redirect::route('manage.posts.index', array($post->id))
            ->with('message', 'Your post has been created!');
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
        $post = Post::findOrFail($id);
        
        //Populate the select(dropdowns)
        $department_options = Department::lists('name', 'id');
        $department_id = $post->department_id;
        //$project_options = Project::lists('name', 'id');
        //$project_id = $post->project_id;
        
        $source_options = Source::lists('name', 'id');
        $source_id = $post->source_id;
        
        $staff_options = Staff::select('Id', DB::raw('CONCAT(first_name, " ", last_name) AS full_name'))->orderBy('first_name')->lists('full_name', 'Id');  
        $staff_selected =  $post->staffs->lists('id');
        
        // Show the page        
        return view('posts.forms.edit',compact('post','department_options','department_id','source_options','source_id', 'staff_options', 'staff_selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PostsFormRequest $request, $id)
    {
        
        $user = Sentinel::getUser()->id;
        
        //
        $post = Post::findOrFail($id);
	    //$post -> user_id = Auth::id();
	    $post -> user_id = $user;
	    $post -> headline = $request->headline;
	    $post -> media_mention = (\Input::get('media_mention') == 1) ? 1 : 0;
	    
	    // This would work too
	    //($request->get('due') == null) ? 1 : 0;	    
	    
	    $post -> presentation = (\Input::get('presentation') == 1) ? 1 : 0;
	    $post -> meeting = (\Input::get('meeting') == 1) ? 1 : 0;
	    $post -> sponsored_event = (\Input::get('sponsored_event') == 1) ? 1 : 0;
	    $post -> on_campus_collaboration = (\Input::get('on_campus_collaboration') == 1) ? 1 : 0;
	    $post -> off_campus_collaboration = (\Input::get('off_campus_collaboration') == 1) ? 1 : 0;
	    $post -> development = (\Input::get('development') == 1) ? 1 : 0;
	    $post -> satifaction_survey = (\Input::get('satifaction_survey') == 1) ? 1 : 0;
	    $post -> achievement = (\Input::get('achievement') == 1) ? 1 : 0;
	    $post -> testimonial = (\Input::get('testimonial') == 1) ? 1 : 0;
	    $post -> other = (\Input::get('other') == 1) ? 1 : 0;
	    $post -> other_desc = $request->other_desc;
	    $post -> source_id = ($request->source_id == null) ? null : $request->source_id;	    
        $post -> publish_date = ($request->publish_date == null) ? null : date('Y-m-d', strtotime($request->publish_date));;    
	    $post -> writer_collaborator = $request->writer_collaborator;
	    $post -> department_id = ($request->department_id == null) ? null : $request->department_id;
	    //$post -> project_id = ($request->project_id == null) ? null : $request->project_id;
	    $post -> notes = $request->notes;
	    $post -> url = $request->url;
	    
	     if (Input::get('staff_list')) {
	    	$post->staffs()->sync(Input::get('staff_list'));  
	    }    
	
//	    $attachment = "";
//	    if(Input::hasFile('attachment'))
//	    {
//	        $file = Input::file('attachment');
//	        $filename = $file->getClientOriginalName();
//	        $extension = $file -> getClientOriginalExtension();
//	        $picture = sha1($filename . time()) . '.' . $extension;
//	    }
//	    $post -> attachment = $attachment;

		if ($request->file('attachment')) {
			$file = $request->file('attachment');
			$filename = $file->getClientOriginalName();
			$extension = $file -> getClientOriginalExtension();
			$name = $user . '-' . time() . '-' . str_slug($filename, "-") . '.' .$extension;			
			//$file = $file->move('/var/www/vhosts/lgscharlotte.org/private/uploads/', $name);
			$file = $file->move(public_path() . '/resources/', $name);		
			$post->attachment = $name;
		}		


	    $post -> save();
//	    if(Input::hasFile('attachment'))
//	    {
//	        $destinationPath = public_path() . '/resources/'.$post->id.'/';
//	        Input::file('attachment')->move($destinationPath, $attachment);
//	    }
	    
	    return \Redirect::route('manage.posts.index', array($post->id))
	        ->with('message', 'Your post has been updated!');     
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
