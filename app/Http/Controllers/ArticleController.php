<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('homepage', ['allArticles' => $articles]);
    }

    public function getMyArticlesPage($id) {
        $articles = Article::where('author_id', $id)->get();
        $author_name = User::find($id)->name;

        return view('my-articles', ['articles'=>$articles, 'author_name'=>$author_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create', ['tags'=>Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $article = Article::create([
            'title'=>$request->title,
            'body'=>$request->text,
            'author_id'=>Auth::id(),
            'img'=>$request->file('img')->store('public/articles/')
        ]);

        foreach($request->tags as $tag){
            $article->getTags()->attach($tag);
        }

        return redirect(route('myArticles', ['id' => Auth::user()->id ]))->with('message', "Complimenti " . Auth::user()->name . ", hai pubblicato un nuovo articolo!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {   
        //dd($article);
        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {   
        $article->title = $request->title;
        $article->body = $request->body;
        if ($request->file('img')) {
            $article->img = $request->file('img')->store('public/articles/');
        }
        $article->author_id = $request->author_id;
        $article->save();

        return redirect(route('homepage'))->with('message', Auth::user()->name . ", il tuo articolo è stato aggiornato correttamente.");
    }

    public function getTagArticles($id) {
        //$articles = Article::all()->getTags->where('id', $id)->get();
        $articles = [];
        foreach(Article::all() as $article){
            foreach($article->getTags as $tag){
                if ($tag->id == $id){
                    $articles[] = $article;
                }
            }
        }
        $tag_name = Tag::find($id)->tag_name;

        return view('article.tag', ['articles'=>$articles, 'tag_name'=>$tag_name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('homepage'))->with('message', 'Articolo eliminato.');
    }
}
