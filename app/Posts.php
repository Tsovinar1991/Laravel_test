<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Creator;


class Posts extends Model
{
    /**
     * @var string
     */
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestump  = true;


    /**
     * @var array
     */
    protected $guarded = [];


    public function user(){
        return $this->belongsTo('App\User');
    }


    public function creators(){
        return $this->hasMany(Creator::class);
    }

}
