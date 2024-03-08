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





<div class="list-group ">
    @if (auth()->user()->hasPermission('view', 'user'))
        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">
            <button class="btn btn-primary">
                <i class="bi bi-people me-2"></i>User List
            </button>
        </a>
    @endif

    @if (auth()->user()->hasPermission('create', 'user'))
        <a href="{{ route('user.create') }}" class="list-group-item list-group-item-action">
            <button class="btn btn-primary">
                <i class="bi bi-person-plus me-2"></i>Create User
            </button>
        </a>
    @endif

    @if (auth()->user()->hasPermission('view', 'role'))
        <a href="{{ route('role.index') }}" class="list-group-item list-group-item-action">
            <button class="btn btn-primary">
                <i class="bi bi-shield me-2"></i>Roles
            </button>
        </a>
    @endif

    @if (auth()->user()->hasPermission('create', 'role'))
        <a href="{{ route('role.create') }}" class="list-group-item list-group-item-action">
            <button class="btn btn-primary">
                <i class="bi bi-shield-plus me-2"></i>Create Role
            </button>
        </a>
    @endif

    <form action="{{ route('logout') }}" method="POST" class="list-group-item">
        @csrf
        <button type="submit" class="btn btn-secondary">
            <i class="bi bi-box-arrow-right me-2"></i>Logout
        </button>
    </form>
</div>
