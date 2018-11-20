<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Posts;

class Creator extends Model
{
    protected $creators = 'creators';


    public function post (){

        return $this->belongsTo(Posts::class);

    }
}
