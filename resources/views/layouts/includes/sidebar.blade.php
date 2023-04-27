<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            {{-- <div class="rotate-n-15"></div> --}}
            <i class="fas fa-sticky-note"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Todo App</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>
    <!-- Nav Item - Room types Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if (!request()->is('admin/room-types*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-badge"></i>
            <span>Todo</span>
        </a>
        <div id="collapseTwo" class="collapse @if (request()->is('admin/room-types*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng:</h6>
                <a class="collapse-item" href="{{ route('todos.index') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('todos.create') }}">Thêm mới</a>
                <a class="collapse-item" href="{{ route('todos.trash') }}">Thùng rác</a>
            </div>
        </div>
    </li>
   
    <!-- Divider -->
    <hr class="sidebar-divider">
</ul>