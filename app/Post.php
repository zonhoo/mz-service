<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Route;//软删除

class Post extends Model {

	//
    use SoftDeletes;
    protected $guarded = array('id');

    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User','like_user','post_id','user_id');
    }

    //副标题获取器
    public function getSubtitleAttribute($value)
    {
        return ucfirst($value);
    }
    //副标题修改器
    public function setSubtitleAttribute($value)
    {

        $this->attributes['subtitle'] = $value==null?'':$value;
    }

    //文章封面获取器
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
