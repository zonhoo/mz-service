<?php namespace App\Http\Controllers\Admin;

    use Illuminate\Html;
    use App\User;
    use App\Role;
    use App\Http\Requests\StoreUserProfileRequest;
    use App\Http\Requests\UpdateUserProfileRequest;
    use App\Repositories\UserRepository;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use Laracasts\Flash\Flash;
    class UserController extends BaseController{
        protected $user;
        
        public function __construct(UserRepository $user)
        {
            parent::__construct();
            $this->user = $user;
        }

        public function index()
        {
            //echo $can = Route::currentRouteName();
            $users = User::paginate(15);
            return view('admin.user.index',compact('users'));
        }

        public function create()
        {
            return view('admin.user.create');
        }

        public function store(StoreUserProfileRequest $request)
        {
            $user = $this->user->create($request->all());

            if($user->id) {
                flash()->success('发布成功');
            }else{
                flash()->error('发布失败');
            }
            return redirect()->back();
        }

        public function update(UpdateUserProfileRequest $request)
        {
            $user = $this->user->update($request->all());
            if($user->id) {
                flash()->success('更新成功');
            }else{
                flash()->error('更新失败');
            }
            return redirect()->back();

        }

        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('admin.user.edit',compact('user'));
        }

        //编辑头像
        public function editAvatar($id)
        {
            $user = User::select('id','avatar')->find($id);
            return view('admin.user.edit-avatar',compact('user'));
        }

        public function Avatar(Request $request)
        {
            $user = $this->user->updateAvatar($request->input('avatar'),$request->input('user_id'));
            if($user->id) {
                flash()->success('更新成功');
            }else{
                flash()->error('更新失败');
            }
            return redirect()->back();
        }

        public function profile($id)
        {
            $user = User::find($id);
            //获取用户角色
            $role = $user->roles()->first()->display_name;
            return view('admin.user.profile',compact('user','role'));
        }
        
    }
