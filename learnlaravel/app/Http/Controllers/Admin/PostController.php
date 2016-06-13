<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Jobs\ArticleFormFields;
use App\Jobs\BlogIndexData;
use App\Http\Requests;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
use Auth;
use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      /*  return view('admin.post.index')
            ->withArticles(Article::all());*/

        $articles = Article::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('admin.post.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->dispatch(new ArticleFormFields());
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
        
        $Article =Auth::user()->articles()->create($request->ArticleFillData());
        $Article->syncTags($request->get('tags', []));

        return redirect()
            ->route('admin.post.index')
            ->withSuccess('New Post Successfully Created.');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->dispatch(new ArticleFormFields($id));

        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->fill($request->articleFillData());
        $article->save();
        $article->syncTags($request->get('tags', []));

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Post saved.');
        }

        return redirect()
            ->route('admin.post.index')
            ->withSuccess('Post saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->tags()->detach();
        $article->delete();

        return redirect()
            ->route('admin.post.index')
            ->withSuccess('Post deleted.');
    }
}
