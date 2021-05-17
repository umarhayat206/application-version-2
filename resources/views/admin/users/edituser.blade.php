

@extends('layouts.adminlayout')
<style>
    form{
        padding: 20px;
    }

</style>
@section('content')

    <div class="container-fluid">
        <hr>
        <h1>Edit User</h1>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <img  class="img-thumbnail" src="{{$user->Photo?url('public/images',$user->Photo->user_image):'http://placehold.it/400x400'}}">
{{--                <img  class="img-thumbnail" src="{{$user->photo ? url('public/images/',$user->photo->image) : 'http://placehold.it/400x400'}}" height="200px">--}}
            </div>
            <div class="col-md-9">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card bg-dark text-white">
                    <div class="card-header text-center"><h2>Register User</h2></div>
                    <div class="card-body">
                        <form method="POST" action="{{route('update-user',$user->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label  class="col-md-2 col-form-label text-md-right">Name</label>
                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
                                    {{--                                    @if($errors->has('name'))<p class="alert-danger">{{$errors->first('name')}}</p>@endif--}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-2 col-form-label text-md-right">Email</label>
                                <div class="col-md-10">
                                    <input id="name" type="email" class="form-control" name="email" value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-2 col-form-label text-md-right">Password</label>
                                <div class="col-md-10">
                                    <input id="name" type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-2 col-form-label text-md-right">Image No 1</label>
                                <div class="col-md-10">
                                    <input id="name" type="file" class="form-control" name="image_1">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-2 col-form-label text-md-right" >Roll</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="role">
                                        <option value=" ">Chose role</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" {{$role->id==$user->role_id?'selected':''}}>{{$role->role_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-2 col-form-label text-md-right" >Status</label>
                                <div class="col-md-10">
                                    {{--                            <input id="name" type="text" class="form-control" name="status">--}}
                                    <select class="form-control" name="status" >
                                        <option value="" {{$user->is_active==""?'selected':''}}>select Status</option>
                                        <option value="1"{{$user->is_active==1?'selected':''}}>Active</option>
                                        <option value="0" {{$user->is_active==0?'selected':''}}>Not Active</option>
                                    </select>

                                </div>
                            </div>

                            <input type="submit" class="form-control btn-outline-light" >

                        </form>


                    </div>

                </div>
            </div>
        </div>


        @if(count($errors)>0)
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

            </div>

    @endif

@endsection
