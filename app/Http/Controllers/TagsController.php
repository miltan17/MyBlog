<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag;

class TagsController extends Controller
{

    /**
     * show all the articles that is related to any particular tag
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Tag $tag){
        $alltags = Tag::all();
        $articles = $tag->articles()->Published()->get();
        return view('articles.index', compact('articles','alltags'));
    }
}
