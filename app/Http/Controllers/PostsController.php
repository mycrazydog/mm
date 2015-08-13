<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Requests\PostsFormRequest;
use Illuminate\Http\Request;

use App\Post;
use App\Department;
use App\Project;
use App\Source;

use Sentinel;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Form;
use View;

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
        $project_options = Project::lists('name', 'id');
        $source_options = Source::lists('name', 'id');
        // Show the page
        return view('posts.forms.create', compact('department_options','project_options','source_options'));
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
        $post = new Post;
        //$post -> user_id = Auth::id();
        $post -> user_id = Sentinel::getUser()->id;
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
		//$post -> source_id = $request->source_id;	    
		$post -> source_id = ($request->source_id == null) ? null : $request->source_id;	    
		//$post -> publish_date = $request->publish_date;
		$post -> publish_date = ($request->publish_date == null) ? null : date('Y-m-d', strtotime($request->publish_date));;    
		$post -> writer_collaborator = $request->writer_collaborator;
		//$post -> department_id = $request->department_id;
		$post -> department_id = ($request->department_id == null) ? null : $request->department_id;
		//$post -> project_id = $request->project_id;
		$post -> project_id = ($request->project_id == null) ? null : $request->project_id;
        $post -> notes = $request->notes;
        $post -> url = $request->url;
    
        $attachment = "";
        if(Input::hasFile('attachment'))
        {
            $file = Input::file('attachment');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $post -> attachment = $attachment;
        $post -> save();
        if(Input::hasFile('attachment'))
        {
            $destinationPath = public_path() . '/images/news/'.$post->id.'/';
            Input::file('attachment')->move($destinationPath, $attachment);
        }
        
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
        $project_options = Project::lists('name', 'id');
        $project_id = $post->project_id;
        
        $source_options = Source::lists('name', 'id');
        $source_id = $post->source_id;
        
        // Show the page        
        return view('posts.forms.edit',compact('post','department_options','department_id','project_options','project_id','source_options','source_id'));
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
        //
        $post = Post::findOrFail($id);
	    //$post -> user_id = Auth::id();
	    $post -> user_id = Sentinel::getUser()->id;
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
	    //$post -> source_id = $request->source_id;	    
	    $post -> source_id = ($request->source_id == null) ? null : $request->source_id;	    
		//$post -> publish_date = $request->publish_date;
        $post -> publish_date = ($request->publish_date == null) ? null : date('Y-m-d', strtotime($request->publish_date));;    
	    $post -> writer_collaborator = $request->writer_collaborator;
	    //$post -> department_id = $request->department_id;
	    $post -> department_id = ($request->department_id == null) ? null : $request->department_id;
	    //$post -> project_id = $request->project_id;
	    $post -> project_id = ($request->project_id == null) ? null : $request->project_id;
	    $post -> notes = $request->notes;
	    $post -> url = $request->url;
	
	    $attachment = "";
	    if(Input::hasFile('attachment'))
	    {
	        $file = Input::file('attachment');
	        $filename = $file->getClientOriginalName();
	        $extension = $file -> getClientOriginalExtension();
	        $picture = sha1($filename . time()) . '.' . $extension;
	    }
	    $post -> attachment = $attachment;
	    $post -> save();
	    if(Input::hasFile('attachment'))
	    {
	        $destinationPath = public_path() . '/images/news/'.$post->id.'/';
	        Input::file('attachment')->move($destinationPath, $attachment);
	    }
	    
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
