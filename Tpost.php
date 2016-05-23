<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tpost extends Model
{
    
    public function tuser(){
    	return $this->belongsTo('App\Tuser');
    }
}
?>
