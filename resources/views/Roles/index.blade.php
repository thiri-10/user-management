@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Role List</h1>
        <span class="text-gray-500">Roles / Roles List</span>

        <div class="mt-5 p-3 container bg-white rounded">
            <form action="{{route('role.index')}}">
                <div class="input-group">
                    <i class="bi bi-search input-group-text"></i>
                    <input type="text" name="keyword" class="form-control" placeholder="Search">
                </div>
            </form>

           <div class="mt-3">
            <a href="{{route('role.create')}}" class="btn btn-primary"><i class="bi bi-plus">Create Role</i></a>
           </div>

           <table class="table">
            <thead>
                <tr>
                    <th><span class="text-gray-500">Role</span></th>
                    <th><span class="text-gray-500">ACTIONS</span></th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($roles as  $role)
                     <tr>
                        <td>{{$role->name}}</td>
                         <td>
                            <a href="{{route('role.edit',$role->id)}}" class="btn btn-secondary">Edit</a>
                            <form action="{{route('role.destroy',$role->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary">Delete</button>
                            </form>

                         </td>
                     </tr>
                 @endforeach
            </tbody>
           </table>

           {{$roles->onEachSide(5)->links()}}

        </div>


    </div>
@endsection