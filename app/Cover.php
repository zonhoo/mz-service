<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 15/4/15
 * Time: 下午3:31
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Cover extends Model{
    //
    protected $guarded = array('id');


    //启动画面获取器
    public function getPhotoAttribute($value)
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