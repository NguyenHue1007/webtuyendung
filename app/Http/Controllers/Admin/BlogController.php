<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
class BlogController extends BaseController
{
	public function index()
	{
		$blogs = Article::all();
		
		return view('admin.blog.index', compact('blogs'));

	}

	public function create()
	{
		
		return view('admin.blog.create');

	}

	public function edit(Article $blog)
	{

		return view('admin.blog.edit', ['blog' => $blog]);
	}

	public function update(Request $request, Article $blog)
	{

		$blog->title = $request->input('title');
		$blog->summary = $request->get('summary');
		$blog->content = $request->get('content');
		if($request->hasFile('thumbnail')){
			if(!empty($blog->thumbnail)){
				Storage::delete($blog->thumbnail);
			}
			$blog->thumbnail = $request->file('thumbnail')->store('public/news');
		}

		$blog->update();

		session()->flash('success','blog update successfull');

		return to_route('blog.index');
	}
    public function store(Request $request)
	{
		$news = new Article();

		$news->title = $request->get('title');
		$news->summary = $request->get('summary');
        $news->content = $request->get('content');

		if($request->hasFile('thumbnail')){
			$news->thumbnail = $request->file('thumbnail')->store('public/news');
		}

		$news->save();

		session()->flash('success','news store successfull');

		
        return redirect()->back();
	}

	public function destroy(Request $request, Article $blog)
	{

		$blog->delete();

		session()->flash('success','Blog delete successfull');

		return to_route('blog.index');       
	}

}
