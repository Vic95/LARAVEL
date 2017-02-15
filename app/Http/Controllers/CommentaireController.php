<?php

namespace App\Http\Controllers;

use App\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'index');
        $user = Auth::user();
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaires = Commentaire::paginate(10);

        return view('commentaires.index', compact('commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commentaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'content' => 'required|min:10'
            ],
            [
                'content.required' => 'Contenu requis',
                'content.min' => 'Minimum 10 caractères'
            ]);

        $commentaire = new Commentaire();
        $input = $request->input();
        $input['article_id'] = Auth::article()->id;

        $commentaire
            ->fill($input)
            ->save();

        return redirect()->route('commentaire.index')->with('success', 'Le commentaire a bien été publié');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commentaire = Commentaire::find($id);
        return view('commentaires.show', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commentaire = Commentaire::find($id);
        return view('commentaires.edit', compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'content' => 'required|min:10'
            ],
            [
                'content.required' => 'Contenu requis',
                'content.min' => 'Minimum 10 caractères'
            ]);

        $commentaire = Commentaire::find($id);
        $input = $request->input();

        $commentaire
            ->fill($input)
            ->save();

        return redirect()->route('commentaire.index')->with('success', 'Le commentaire a bien été modifié');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commentaire = Commentaire::find($id);
        $article->delete();

        return redirect()->route('commentaire.index')->with('success', 'Le commentaire a bien été supprimé');
    }
}