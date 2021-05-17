<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUsersRequest;
use App\Http\Requests\UsersRequest;
use App\photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    //

    public function index()
    {
        $users=User::all();
        return view('admin.users.index')->with('users',$users);
    }

    public function create()
    {
        $roles=Role::all();
            return view('admin.users.createuser',compact('roles'));
    }
    public function store(UsersRequest $request)
    {
        //return $request->all();
        //User::create($request->all());
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->role_id=$request->role;
        $user->is_active=$request->status;


        if($userimagefile=$request->file('image_1'))
        {
            $name=time().$userimagefile->getClientOriginalName();
            $userimagefile->move('public/images',$name);
            $insertintophototable=photo::create(['user_image'=>$name]);
            $user->photo_id=$insertintophototable->id;

        }
        $user->save();
        return redirect('/users');
    }
    public function edit($id)
    {
        $user=User::find($id);
        $roles=Role::all();

        return view('admin.users.edituser')->with(['user'=>$user,'roles'=>$roles]);


    }


    public function update(EditUsersRequest $request, $id)
    {
        $user=User::findorfail($id);
        $user_password=$user->password;
       // echo $user_password;
        $user->name=$request->name;
        $user->email=$request->email;
        if(empty($request->password))
        {
            $user->password=$user_password;
        }
        else
            {
            $user->password=bcrypt($request->password);
        }

        $user->role_id=$request->role;
        $user->is_active=$request->status;
        if($userimagefile=$request->file('image_1'))
        {
            $name=time().$userimagefile->getClientOriginalName();
            $userimagefile->move('public/images',$name);
            $insertintophototable=photo::create(['user_image'=>$name]);
            $user->photo_id=$insertintophototable->id;

        }
        $user->update();
        return redirect('/users');

    }
    public function destroy($id)
    {
        //
        $user=User::findorfail($id);
        $user->delete();
        return redirect('/users')->with('message','User is deleted');
    }
}
