<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 7/11/15
 * Time: 3:22 PM
 */

namespace App\Http\Controllers\Home;


use App\Post;

class PostController extends BaseController{

    public function show($id)
    {
        $post = Post::find($id);
        return view('home.post.show',compact('post'));
    }
} 