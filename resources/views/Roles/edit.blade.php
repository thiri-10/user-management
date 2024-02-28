@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Create role</h1>
        <span class="text-gray-500">Roles List/Create</span>


        <div class="mt-5 container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('role.update',$role->id)}}" method="POST">
                        @csrf
                        @method('put')
                        
                        <div class="mt-3 p-3 bg-white rounded">
                            <div class="mt-1">
                                <label for="" class="form-label">Role name</label>
                                <input type="text" class="form-control" name="role" value="{{$role->name}}" required>
                            </div>

                            <div class="mt-3">
                                <h3>Role Permissions</h3>
                                <table class="table">
                                    <thead>
                                        <th>Administrator Access <i class="bi bi-exclamation"></i></th>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input d-inline-block" name="">Select all
                                            </div>
                                        </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach (App\Models\Feature::all() as $feature)
                                            <tr>
                                                <td>{{$feature->name}}</td>
                                                @foreach ($feature->permissions as $permission)
                                                    <td>
                                                        <input type="checkbox" name="permissions[]"
                                                         class="form-check-input " value='{{$permission->id}}' 
                                                         {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                                         <label for="">{{ $permission->name }}</label>
                                                    </td>
                                                @endforeach
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-2">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection