<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Category;

use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller as BaseController;

class CategoryController extends BaseController
{
    public function index()
	{
		$categories = Category::all();
		// ::orderBy('id')
		// 				->paginate(5)
		// 				->withQueryString();

		return view('admin.category.index', compact('categories'));

	}

    public function create()
	{
		return view('admin.category.create');
	}

	public function edit(Category $category)
	{

		return view('admin.category.edit', ['category' => $category]);
	}

    public function store(Request $request)
	{
		$category = new Category();

		$category->name = $request->get('name');

		if($request->hasFile('thumbnail')){
			$category->thumbnail = $request->file('thumbnail')->store('public/categories');
		}

		$category->save();

		session()->flash('success','category store successfull');

		// return to_route('category.edit',$category->id);
        return view('admin.category.create');
	}

	public function update(Request $request, Category $category)
	{

		$validated = $request->validate(['name'=>'required']);

		$category->name = $request->input('name');

		if($request->hasFile('thumbnail')){
			if(!empty($category->thumbnail)){
				Storage::delete($category->thumbnail);
			}
			$category->thumbnail = $request->file('thumbnail')->store('public/categories');
		}

		$category->update();

		session()->flash('success','category update successfull');

		return to_route('category.edit',$category->id);
	}

	public function destroy(Request $request, Category $category)
	{

		$category->delete();

		session()->flash('success','category delete successfull');

		return to_route('category');       
	}

}
