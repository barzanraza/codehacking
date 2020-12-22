<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['file'];

    protected $uploads = '/images/';
    public function getFileAttribute($photo){// am paramter a aw pathaya ka la dway '/images/' anusret
    	return $this->uploads . $photo;
    }







    
}
