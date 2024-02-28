@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>User List</h1>
        <span class="text-gray-500">Users / User </span>

        <div class="mt-5 container bg-white rounded">
            <div class="row d-flex justify-content">
               

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body text-center">
            <div class="text-center d-flex flex-column align-items-center">
                <div class="rounded-circle img-thumbnail" style="width: 150px; height: 150px; line-height: 150px; font-size: 24px; background-color: #e9ecef;">
                    {{ $user->name[0] }}
                </div>
            </div>
            <h5 class="card-title">{{ $user->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $user->email }}</h6>
            <div class="row">
                <div class="col-6">
                    <p class="card-text"><strong>Phone: </strong></p>
            <p class="card-text"><strong>Address:</strong></p>
            <p class="card-text"><strong>Gender:</strong></p>
            <p class="card-text"><strong>Active:</strong>
            </p>
                    

                </div>
                <div class="col-6">
                    <p class="card-text">
                        {{ $user->phone }}
                    </p>
                    <p class="card-text"> {{ $user->address }}</p>
                     <p class="card-text">
                        {{ $user->gender }}
                     </p>
                     <p class="card-text">{{ $user->is_active ? 'active' : 'No' }}</p>
                </div>
            </div>
           
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary mt-3">Edit</a>
            
        </div>
    </div>
</div>
@endsection

            </div>

           

        </div>


    </div>
@endsection
