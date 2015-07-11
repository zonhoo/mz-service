<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/16
 * Time: 上午10:21
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Route;

class Version extends Model{
    use SoftDeletes;

    protected $data = ['delete_at'];

    protected $guarded = array('id');

    //文章封面获取器
    public function getAppUrlAttribute($value)
    {
        //dd(Route::currentRouteName());
        $currentRouteName = Route::currentRouteName();
        $pattern = '/admin./';
        $result = preg_match($pattern,$currentRouteName);
        if(!$result)
        {
            return url($value);
        }else{
            return $value;
        }

    }
} 