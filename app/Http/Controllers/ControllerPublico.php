<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obra;
use App\User;

class ControllerPublico extends Controller
{
    public function index()
    {
    	//$obras = Obra::all();
    	$obras = Obra::with('user')->get();
    	return view('publico.index', compact('obras'));
    }
}
