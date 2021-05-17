@extends('layouts.adminlayout')

@section('content')
    <br><br>
    <div class="container-fluid">
      @if(session()->has('message'))
       <div class="alert alert-success">
           {{session()->get('message')}}
       </div><br>
        @endif

    <table class="table table-bordered">
        <thead>
        <tr>

            <th>Name</th>
            <th>Photo</th>
            <th>Role</th>
            <th>Active</th>
            <th>Email</th>
            {{-- <th>Password</th> --}}
            {{-- <th>Created_at</th>
            <th>Updated_at</th> --}}
            <th>Edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
        <tr>

            <td>{{$user->name}}</td>
            <td><img  height="50px" src="{{$user->Photo?url('public/images',$user->Photo->user_image):'http://placehold.it/400x400'}}"></td>
            <td>{{$user->Role?$user->Role->role_name:'user has no role'}}</td>
            <td>{{$user->is_active==1?'Active':'Not Active'}}</td>
            <td>{{$user->email}}</td>
{{--            <td>{{$user->password}}</td>--}}
            {{-- <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td> --}}
            <td><a href="{{route('edit-user',$user->id)}}" class="btn btn-outline-dark">Edit user</a></td>
            <td><a href="{{route('delete-user',$user->id)}}" class="btn btn-outline-dark">Delete User</a></td>
        </tr>
            @endforeach
        @endif

        </tbody>
    </table>
    </div>

@endsection
