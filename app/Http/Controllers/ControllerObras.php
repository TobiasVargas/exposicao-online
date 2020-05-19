<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obra;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;

class ControllerObras extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = User::find(Auth::user()->id)->obras;
        return view('admin.list', compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obra = new Obra;

        $path = $request->file('imagem')->store('imagens');

        $obra->titulo = $request->titulo;
        $obra->autor = $request->autor;
        $obra->ano = $request->ano;
        $obra->imagem = $path;
        $obra->user_id = Auth::user()->id;

        $obra->save();

        return redirect('/publicacoes');
        /*
        ('titulo');
            $table->string('autor');
            $table->integer('ano');
            $table->string('imagem');
            $table->unsignedBigInteger('user_id');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obra = Obra::find($id);

        return view('admin.edit', compact('obra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obra = Obra::find($id);
        $imagem_atual = $obra->imagem;
        $imagem_nova = $request->file('imagem');

        if ($imagem_nova == null or empty($imagem_nova)) {
            
        }else{
            $path = $request->file('imagem')->store('imagens');
            Storage::delete($obra->imagem);
            $obra->imagem = $path;
        }

        $obra->titulo = $request->titulo;
        $obra->autor = $request->autor;
        $obra->ano = $request->ano;

        $obra->save();

        return redirect('publicacoes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obra = Obra::find($id);
        Storage::delete($obra->imagem);

        $obra->delete();


        return redirect('/publicacoes');
    }
}
