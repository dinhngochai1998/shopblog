<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserController extends Controller
{
    protected $userRepo;


    public function __construct(UserRepository $userRepo)
    {
       
        $this->userRepo = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $permission = Permission::get();
        // $role = Role::find(6);
        // $role->givePermissionTo($permission);
        // $us = User::find(3);
        // $us->givePermissionTo(['edit articles', 'delete articles', 'publish articles', 'unpublish articles']);
        $user = $this->userRepo->all();

        // dd($users = User::permission('edit articles')->get());
        return view('backend.admin.user.show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //Code goes here

        return view('backend.admin.user.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // $role = Role::create(['name' => 'add']);
        // $permission = Permission::create(['name' => 'create user']);
        // $role->givePermissionTo($permission);
        $data = $request->validated();
        // dd($data);
        if ($request->hasFile('avatar')) {
            $avatar = $this->userRepo->image($request->file('avatar'));
            $data['avatar'] = $avatar;
        }
        $data['password'] = Hash::make($request->password);

        $user = $this->userRepo->create($data);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepo->find($id);
        return view('backend.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->validated();
        if ($request->hasFile('avatar')) {
            $avatar = $this->userRepo->image($request->file('avatar'));
            $data['avatar'] = $avatar;
        }

        $user = $this->userRepo->update($data, $id);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
