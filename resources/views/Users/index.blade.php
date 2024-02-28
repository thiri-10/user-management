@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>User List</h1>
        <span class="text-gray-500">Users / User List</span>

        <div class="mt-5 p-3 container bg-white rounded">
            <div class="row d-flex justify-content ">
                <div class="col-6">
                    <form action="{{ route('user.index') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <i class="bi bi-search input-group-text"></i>
                            <input type="text" class="form-control" name="keyword">
                        </div>
                    </form>

                </div>
                <div class="col-6">
                    <a href="{{ route('user.index') }}" class="btn btn-primary">
                        <i class="bi bi-filter"></i>
                        Filter
                    </a>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i>
                        Create User

                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <table class="table m-3 rounded">
                        <thead>
                            <tr>
                                
                                <th>USER</th>
                                <th>USERNAME</th>
                                <th>ROLE</th>
                                <th>STATUS</th>
                                <th>ACTIONS</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>@if ($user->is_active)
                                        active
                                    @endif</td>
                                    <td>
                                        {{-- <div class="dropdown" data-bs-toggle="dropdown"></div> --}}
                                        <div class="btn-group" role="group" aria-label="Actions">
                                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">View</a>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                            </form>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$users->onEachSide(4)->links()}}
            </div>

        </div>


    </div>
@endsection
