<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// importo model
use App\Models\Post;
use App\Models\Category;
// importo support per usare STR::
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // prendo tutto l'array dei post e lo traferisco sotto forma di array multi alla pagina index
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // mi passo dei dati della category cosi da poter creare una select con essi 
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // salvo i dati arrivati
        $data = $request->all();
        // istaznio nuova variabile vuota con le stesse caratteristiche dei post del database
        $new_post = new Post();
        //riempio la nuova istanza vuota con i dati salvati (solo se prima ho reso fillable nel Models)
        $new_post->fill($data);
        // creo la slug partendo dal title nuovo
        $new_post->slug = Str::slug($new_post->title, '-');
        // salvo la nuova variabile
        $new_post->save();
        // redirecto la vista alla pagina index 
        return redirect()->route('admin.posts.index')->with('message', 'Hai aggiunto un nuovo post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view ('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // anche qui mi devo passare i dati per la select delle category
        $categories = Category::all();
        return view ('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //salvo i dati arrivanti
        $data = $request->all();
        // per creare lo slug devo prendere i dati della request 
        $post->slug = Str::slug($request->title, '-');
        // metodo update
        $post->update($data);
        return redirect()->route('admin.posts.show', $post)->with('message', "Hai modificato con successo: $post->title");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', "Hai eliminato con successo: $post->title");
    }
}
