@extends('layouts.todo')

@section('css')
    <style>
        #h5-text-style {
            color: #000;
            font-weight: 600;
        }
        #h6-text-style {
            color: #f00;
        }
    </style>
@endsection

@section('title')
    Todo Dashboard
@endsection

@section('content')
<h3 class="text-center mb-3">Danh sách Todo</h3>
 <!-- Topbar Search -->
<div class="mt-2 mb-5 d-flex">
    <div class="mr-2">
        <a href="{{ route('todos.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Thêm
        </a>
    </div>
    <div class="mr-2">
        <a href="{{ route('todos.trash') }}" class="btn btn-secondary">
            <i class="fas fa-recycle"></i> Thùng rác
        </a>
    </div>
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('todos.search') }}" method="GET">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Bạn muốn tìm gì?..."
                aria-label="Search" aria-describedby="basic-addon2" name="search" id="search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<div class="row">
    @if ($todoLists)
        @foreach ($todoLists as $t)
            <div class="col-md-3 mb-3">
                <div class="card h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title" id="h5-text-style">{{ $t->todo_title ?? '' }}</h5>
                        <p class="card-text">{{ $t->todo_content ?? '' }}</p>
                        <div class="d-flex">
                            <div class="mr-1">
                                <a href="{{ route('todos.edit', ['todo'=>$t->id]) }}" class="btn btn-primary"><i class="fas fa-pencil"></i> Sửa</a>
                            </div>
                            <div class="mr-1">
                                <form action="{{ route('todos.destroy', ['todo'=>$t->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không!')"><i class="fas fa-trash"></i> Xóa</button>
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('todos.show', ['todo'=>$t->id]) }}" class="btn btn-warning"><i class="fas fa-info" ></i> Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach        
    @endif
</div>
@endsection

@section('script')
    @if (session('msgSuccess'))
        <script>
            swal({
            title: "Thành công!",
            text: "{{ session('msgSuccess') }}",
            icon: "success",
            button: "OK!",
        });
        </script>
    @endif
@endsection
