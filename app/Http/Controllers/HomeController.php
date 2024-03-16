<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Job;

use App\Models\Article;

use App\Models\Application;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $jobs = Job::all();
        return view('welcome',compact('categories', 'jobs'));
    }

    public function jobs(){
        $jobs = Job::paginate(5);
        return view('jobs',compact('jobs'));
    }

    public function jobDetail(Job $job){

        return view('job_detail',compact('job'));
    }

    public function jobsByCategory(Category $category){
        $jobs = $category->jobs()->paginate(10);
        return view('jobs',compact('jobs'));
    }

    public function viewCV(Application $application) 
    {
        return view('preview', compact('application'));
    } 

    public function search(Request $request)
    {

        $searchKey = $request->input('search_key');
        $city = $request->input('city');
        $result = implode(" ", array_slice(explode(" ", $city), -2));

        $type = $request->input('type');

        $resultJobs = Job::query();

        $resultJobs->where(function($query) use ($searchKey, $result, $type) {
            if ($searchKey) {
                $query->orWhere('title', 'like', '%' . $searchKey . '%');
            }
            if ($result && $result != 'Tất cả tỉnh thành') {
                $query->orWhere('location', 'like', '%' . $result . '%')
                ->orWhere('location', 'Toàn quốc');
            }
            if ($type && $type != 'Tất cả hình thức') {
                $query->orWhere('type', $type);
            }
        });

        $jobs = $resultJobs->paginate(5);
        return view('jobs', ['jobs' => $jobs]);
    }

    public function getArticles(){
        $articles = Article::all();
        return view('blog', compact('articles'));
    }

    public function detailBlog(Article $article){

         $otherArticles = Article::where('id', '!=', $article->id)->get();
        return view('detail_blog',compact('article','otherArticles'));
    }


}
