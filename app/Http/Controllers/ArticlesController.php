<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;


use App\Article;
use App\Http\Requests\newPostRequest;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ArticlesController extends Controller
{

    /**
     * Check for authentication
     *
     */
    public function __construct()
    {
        $this->middleware('auth',['only'=>'create','edit']);
    }

    /**
     * Home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $alltags = Tag::all();
    	$articles = Article::latest()->Published()->get();
        //dd($alltags);
    	return view('Articles.index', compact('alltags','articles'));
    }

    /**
     * Show any particular article using id
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function show(Article $article){
        return view('articles.show',compact('article'));
    }

    /**
     * Create a new article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $tags = Tag::lists('name','id');
        return view('Articles.create', compact('tags'));
    }


    /**
     * Store the created article in the database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(newPostRequest $request ){

        //work to save a new tag
        $newTag = new Tag;
        foreach ($request->input('tag_list') as $tag) {
            $tags = Tag::Present($tag)->get();

            //dd($tags[0]->id);
            if($tags->count()==null){
                /*save the tag into the tag table*/
                $newTag->name = $tag;
                $newTag->save();
                flash()->info("Please Fill And Resubmit The Form Again.");
                //Session::flash('message', "Please Fill And Resubmit The Form Again.");
                return redirect::back();
            }
        }
        
        /*
        *save the article and corresponding Tag_article
         *
        */
        $article = new Article($request->all());
        $articles = Auth::user()->articles()->save($article);

        //dd($request->input('tag_list'));
        $articles->tags()->attach( $request->input('tag_list'));

        flash()->success('Your Article Has Been Created Successfully.');

        return redirect('articles');
    }

    /**
     * Edid any article based on id
     *
     * @param $id
     */
    public function edit(Article $article){
        //$article = Article::findOrFail($id);
        $tags = Tag::lists('name','id');
        return view('articles.edit', compact('article','tags'));
    }


    /**
     * update the article
     *
     * @param $id
     * @param newPostRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, newPostRequest $request){
        //$article = Article::findOrFail($id);

        $article->update($request->all());

        $article->tags()->sync( $request->input('tag_list'));

        return redirect('author');
        //return redirect('articles');
    }


    /**
     * @param Article $article
     * @return Redirect|string
     */
    Public function destroy(Article $article){

        $article->delete();
        return redirect('author');
    }

}
