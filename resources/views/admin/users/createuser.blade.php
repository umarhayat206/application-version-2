@extends('layouts.adminlayout')
<style>
    form{
        padding: 20px;
    }

</style>
@section('content')

    <div class="container-fluid">
        <hr>
        <h1>Create User</h1>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card bg-dark text-white">
                    <div class="card-header text-center"><h2>Register User</h2></div>
                    <div class="card-body">
                        <form method="POST" action="{{route('store-user')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label  class="col-md-2 col-form-label text-md-right">Name</label>
                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control" name="name">
{{--                                    @if($errors->has('name'))<p class="alert-danger">{{$errors->first('name')}}</p>@endif--}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-2 col-form-label text-md-right">Email</label>
                                <div class="col-md-10">
                                    <input id="name" type="email" class="form-control" name="email">
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
                                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-md-2 col-form-label text-md-right" >Status</label>
                                <div class="col-md-10">
                                    {{--                            <input id="name" type="text" class="form-control" name="status">--}}
                                    <select class="form-control" name="status">
                                        <option value="">select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
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
    @endif

@endsection
