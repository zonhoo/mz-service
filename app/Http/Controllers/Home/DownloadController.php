<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 7/2/15
 * Time: 1:47 PM
 */

namespace App\Http\Controllers\Home;


use App\Version;

class DownloadController extends BaseController{

    public function index()
    {
        return view('home.download.index');
    }

    public function downloadFile()
    {
        $last = Version::orderBy('updated_at','desc')->first();

        if(!$last){
            return view('home.download.error');
        }
        return response()->download($last->app_url);
    }
}