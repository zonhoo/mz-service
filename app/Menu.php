<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	//

    public function children()
    {
        return $this->hasMany('App\Menu','fid');
    }

}
