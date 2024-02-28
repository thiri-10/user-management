{{-- <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
    New Sidebar
    <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
    </a>
</h5>
<ul class="nav flex-column mb-2">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#dropdown1"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span data-feather="settings"></span>
            User
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown1" id="dropdown1">
            <a class="dropdown-item" href="{{ route('user.index') }}">User List</a>
            <a class="dropdown-item" href="{{route('user.create')}}">Create User</a>
            <a class="dropdown-item" href="#">Import user</a>
            <!-- Add more dropdown items as needed -->
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#dropdown2"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span data-feather="user"></span>
           Role
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown2" id="dropdown2">
            <a class="dropdown-item" href="{{route('role.index')}}">Role List</a>
            <a class="dropdown-item" href="{{route('role.create')}}">Create Role</a>
            <!-- Add more dropdown items as needed -->
        </div>
    </li>
    
   
</ul> --}}

<div class="list-group">
    <div class="list-group-item">
        <a href="{{ route('user.index') }}" class="btn btn-primary">User List</a>
    </div>
    <div class="list-group-item">
        <a href="{{ route('user.create') }}" class="btn btn-primary">Create User</a>

    </div>

    <div class="list-group-item">
        <a href="{{ route('role.index') }}" class="btn btn-primary">Roles</a>
    </div>

    <div class="list-group-item">
        <a href="{{ route('role.create') }}" class="btn btn-primary">Create Role</a>
    </div>

    <div class="list-group-item">
        <form action="{{route('logout')}}" method="POST">
            @csrf
           <button class="btn btn-secondary">Logout</button>
    </div>


</div>
