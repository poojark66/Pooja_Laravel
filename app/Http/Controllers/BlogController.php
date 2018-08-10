<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Session;

class BlogController extends Controller
{
	public function index($id='')
	{
		$blogs = Blog::all();
		
		//return view('blogs.index')->withBlogs($blogs);
		return view('blogs.index', compact(['blogs', 'id']));
	}
	
	public function create()
	{
		return view('blogs.create');
	}
	
	public function store(Request $request)
	{
		$input = $request->all();
		
		$this->validate($request, [
			'title' => 'required',
			'description' => 'required'
		]);
		
		Blog::create($input);
		
		Session::flash('flash_message', 'Task successfully added!');

		return redirect()->back();
	}
	
	public function show($id, $uid)
	{
		$blog = Blog::findOrFail($id);
	    return view('blogs.show', compact(['blog', 'uid']));
	}
	
	public function edit($id, $uid)
	{
		$blog = Blog::findOrFail($id);
		return view('blogs.edit', compact(['blog', 'uid']));
	}
	
	public function update($id, Request $request)
	{
		$blog = Blog::findOrFail($id);
		
		$this->validate($request, [
			'title' => 'required',
			'description' => 'required'
		]);
		
		$input = $request->all();
		
		$blog->fill($input)->save();

		Session::flash('flash_message', 'Task successfully updated!');

		return redirect()->back();
	}
}

