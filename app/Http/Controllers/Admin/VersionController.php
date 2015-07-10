<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\VersionRepository;
use App\Version;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class VersionController extends BaseController {

    protected $version;

    public function __construct(VersionRepository $repository)
    {
        parent::__construct();
        $this->version = $repository;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $versions = Version::orderBy('created_at', 'desc')->get();
        return view('admin.version.index',compact('versions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('admin.version.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
        $result = $this->version->create($request->all());

        if($result->id) {
            flash()->success('新建成功');
        }else{
            flash()->error('新建失败');
        }
        return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $version = Version::find($id);
        return view('admin.version.edit',compact('version'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
        $result = $this->version->update($request->all(),$id);
        if($result->id) {
            flash()->success('操作成功');
        }else{
            flash()->error('操作失败');
        }
        return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $version = Version::find($id);
        $version->delete();
        if($version->id) {
            flash()->success('操作成功');
        }else{
            flash()->error('操作失败');
        }
        return redirect()->back();
	}

}
