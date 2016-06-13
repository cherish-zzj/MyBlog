<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Auth;
use App\Article;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function __construct(){
        //除了主页之外
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$articles = Article::orderBy('published_at','desc')->get();
        return view('articles.index',compact('articles'));*/
        $articles = Article::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * store(Request $request)
     */
 /*   public function store(ArticleRequest $request)
    {
        Auth::user()->articles()->create($request->all());
        flash()->overlay('发布成功', 'Good Job');
        return redirect('articles');
    }*/

    /**
     * Display the specified resource.
     *
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
//        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article,ArticleRequest $request)
        {
     /*       $article->update($request->all());
            flash()->overlay('修改成功！', 'Good Job');
            return redirect('articles');*/

        }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* $article = Article::find($id);
        foreach ($article->tags as $tag) {
            $tag->count--;
            $tag->save();
            $article->tags()->detach($tag->id);
        }
        $article->delete();
        return Redirect::to('/articles');*/
    }
}
