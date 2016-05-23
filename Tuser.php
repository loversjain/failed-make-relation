<?php

namespace App;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Tuser extends Model  implements  Authenticatable
{
	 
    use \Illuminate\Auth\Authenticatable;
    
    public function tposts(){
    	return $this->hasMany('App\Tpost');
    }
     
}
?>
