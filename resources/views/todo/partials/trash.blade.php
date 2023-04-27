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
    Thùng rác Todo 
@endsection

@section('content')
<h3 class="text-center">Danh sách Todo bị xóa</h3>
<div class="mt-2 mb-5 d-flex">
    <div class="mr-2">
        <a href="{{ route('todos.index') }}" class="btn btn-info">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>
    <form action="{{ route('todos.remove_all') }}" method="POST" class="mr-2">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn xóa tất cả todo không!')"><i class="fas fa-times-circle mr-1"></i>Xóa tất cả</button>
    </form>
    <form action="{{ route('todos.restore_all') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-secondary"><i class="fas fa-repeat mr-1"></i>Khôi phục tất cả</button>
    </form>
</div>
<div class="row">
    @if ($todoDeletes)
        @foreach ($todoDeletes as $t)
            <div class="col-md-3 mb-3">
                <div class="card h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title" id="h5-text-style">{{ $t->todo_title ?? '' }}</h5>
                        <p class="card-text">{{ $t->todo_content ?? '' }}</p>
                        {{-- <h6 class="card-subtitle mb-3 text-muted" id="h6-text-style">{{ $t->created_at->diffForHumans() }}</h6> --}}
                        <div class="d-flex">
                            <div class="mr-1">
                                <form action="{{ route('todos.restore_one', ['id'=>$t->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-undo"></i> Khôi phục</button>
                                </form>
                            </div>
                            <div>
                                <form action="{{ route('todos.remove_one', ['id'=>$t->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa hoàn toàn todo này không!')"><i class="fas fa-trash"></i> Xóa</button>
                                </form>
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