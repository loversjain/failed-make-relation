<?php

namespace App;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Tuser extends Model  implements  Authenticatable
{
    protected $table='Tusers';
    use \Illuminate\Auth\Authenticatable;
    
    public function tposts(){
    	return $this->hasMany('App\Tpost');
    }
     
}
?>
