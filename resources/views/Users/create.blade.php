@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Create User</h1>
        <span class="text-gray-500">Users / Create User</span>

        <div class="mt-5 container">
            <div class="row d-flex justify-content">
                <div class="col-12">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mt-3 p-3 bg-white rounded">
                            <h3>User Information</h3>
                            <div class="row mt-3 d-flex justify-spacebetween">
                               
                                <div class="col-4">
                                    <label for="" class="form-label"><strong>First Name</strong></label>
                                    <input type="text" class="form-control " name="name" placeholder="First Name"
                                        >
                                    @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                               
                            </div>
                            <div class="mt-4">
                                <label for="" class="form-label"><strong>Email</strong></label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                             @enderror


                            <div class="mt-4 ">
                                <input type="checkbox" name="is_active" value="1" class="form-check-input
                                 " checked>

                                <label for="" class="form-label"><strong>Is Active</strong></label>
                                <p class="text-black-50">User account is activate or deactivate</p>
                                @error('is_active')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror

                            </div>
                        </div>


                        <div class="mt-3 p-3 bg-white rounded">
                            <h3>Roles and Permissions</h3>
                            <div class="row mt-3 d-flex justify-spacebetween">
                                <div class="col-4">
                                    <label for="" class="form-label"><strong>User Name</strong></label>
                                    <input type="text" class="form-control " name="username" placeholder="Username">
                                </div>
                                @error('username')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <div class="col-4">
                                    <label for="" class="form-label"><strong>Password</strong></label>
                                    <input type="password" class="form-control " name="password" >
                                    @error('password')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label"><strong>Confirm Password</strong></label>
                                    <input type="password" class="form-control" name="password_confirmation" >
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label"><strong>Roles</strong></label>
                                    <select name="role_id" id="" class="form-select">
                                        @foreach (App\Models\Role::get() as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label"><strong>Access Locations</strong></label>
                                    <input type="text" class="form-control " name="address"
                                        placeholder="Select an access locations" required>
                                        @error('address')
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                </div>
                            </div>
                           
                        </div>


                        <div class="mt-3 p-3 bg-white rounded">
                            <h1>More Information</h1>
                            <div class="row mt-3 d-flex justify-spacebetween">
                                <div class="col-4">
                                    <label for="" class="form-label"><strong>Gender</strong></label>
                                    <select name="gender" class="form-select " aria-placeholder="Select a Gender">
                                        <option value="male">Male
                                        </option>
                                        <option value="female">Female
                                        </option>
                                        <option value="other">Rather not say
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label"><strong>Phone</strong></label>
                                    <input type="number" class="form-control " name="phone" placeholder="## ### ####">
                                </div>
                                @error('phone')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                        </div>

                          <div class="mt-5">
                            <button class="btn btn-primary">Create</button>
                          </div>


                    </form>

                </div>

            </div>


        </div>
    </div>
@endsection
