<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles= Article::all();//mi recupera dal db tutti gli articoli e li salva in una collezione
        return view('article.index', compact('articles'));//nuova sintassi per portarti i dati nella view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        /* $title = $request->title;
        $subtitle = $request->title;
        $body = $request->body;
        $img = $request->file('img')->store('public/img'); */

        //mass assigment
        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
        ]);

        if($request->file('img')){
            $article->img = $request->file('img')->store('public/img');
            $article->save();
        }

        return redirect()->back()->with('message', 'Articolo inserito con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show' , compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //condizione se metto l immagine o meno
        if($request->file('img')){
            $img = $request->file('img')->store('public/img');
        }
        else{
            $img = $article->img;
        }

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'img' => $img
        ]);

        return redirect(route('article.index'))->with('message', 'articolo modificato'); //ritorno all pagina index degli articoli
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back()->with('message', 'articolo eliminato');
    }
}
