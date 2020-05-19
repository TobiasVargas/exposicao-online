<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table = 'obras';

    protected $fillable = [
        'titulo','autor', 'ano', 'imagem'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
