<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 7/10/15
 * Time: 3:35 PM
 */

namespace App\Http\Controllers\Admin;


use App\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;


class MenuController extends BaseController{

    protected $menu;

    public function __construct(MenuRepository $menuRepository)
    {
        parent::__construct();
        $this->menu=$menuRepository;
    }

    public function index()
    {
        //
        $menus = $this->menu->tree();
        return view('admin.menu.index',compact('menus'));
    }

    public function create()
    {
        $menus = Menu::where('fid','=',0)->get();
        return view('admin.menu.create',compact('menus'));
    }

    public function store(Request $request)
    {
        $result = $this->menu->create($request->all());
        if($result->id) {
            flash()->success('操作成功');
        }else{
            flash()->error('操作失败');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $menu = find($id);
        return view('admin.menu.edit',compact('menu'));
    }

    public function update(Request $request,$id)
    {
        $result = $this->menu->update($request->all(),$id);
        if($result->id) {
            flash()->success('操作成功');
        }else{
            flash()->error('操作失败');
        }
        return redirect()->back();
    }
} 