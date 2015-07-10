<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 5/13/15
 * Time: 4:00 PM
 */

namespace App\Repositories;


use App\Menu;
use App\Node;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class MenuRepository {

    public function create(array $data)
    {
        return Menu::create([
            'fid' => $data['fid'],
            'name' => $data['name'],
            'route_name' => $data['route_name'],
            'icon' => $data['icon']
        ]);
    }

    public function update(array $data,$id)
    {
        $menu = Menu::find($id);
        $menu->fid = $data['fid'];
        $menu->name = $data['name'];
        $menu->route_name = $data['route_name'];
        $menu->icon = $data['icon'];
        $menu->save();
        return $menu;
    }

    /**
     * Buiding collections to tree.
     *
     * @param  Collection $source
     * @return object
     */
    public function tree()
    {
        $tree = Menu::with('children')->where('fid','=',0)->get();
        return $tree;
    }
} 