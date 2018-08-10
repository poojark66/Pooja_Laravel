<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Session;

class BlogController extends Controller
{
	public function index()
	{
		$blogs = Blog::all();

		return view('blogs.index')->withBlogs($blogs);
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
	
	public function show($id)
	{
		$blog = Blog::findOrFail($id);
	    
		return view('blogs.show')->withBlog($blog);
	}
	
	public function edit($id)
	{
		$blog = Blog::findOrFail($id);

		return view('blogs.edit')->withBlog($blog);
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

		Session::flash('flash_message', 'Task successfully added!');

		return redirect()->back();
	}
}

