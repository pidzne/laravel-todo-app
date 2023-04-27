@extends('layouts.todo')

@section('css')
    
@endsection

@section('title')
    Tìm kiếm Todo 
@endsection
@section('content')
    <a href="{{ route('todos.index') }}" class="btn btn-info">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
    @if ($results->isNotEmpty())
        <h3 class="text-center mb-3">Đã tìm thấy {{ $results->count() }} Todo phù hợp với từ khóa tìm kiếm</h3>
        <div class="row">
            @foreach ($results as $t)
                <div class="col-md-3 mb-3">
                    <div class="card h-100" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title" id="h5-text-style">{{ $t->todo_title ?? '' }}</h5>
                            <p class="card-text">{{ $t->todo_content ?? '' }}</p>
                            {{-- <h6 class="card-subtitle mb-3 text-muted" id="h6-text-style">{{ $t->created_at->diffForHumans() }}</h6> --}}
                            <div class="d-flex">
                                <div class="mr-1">
                                    <a href="{{ route('todos.edit', ['todo'=>$t->id]) }}" class="btn btn-primary"><i class="fas fa-pencil"></i> Sửa</a>
                                </div>
                                <div class="mr-1">
                                    <form action="{{ route('todos.destroy', ['todo'=>$t->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Xóa</button>
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
        </div>
    @else
        <h3 class="text-center">Không tìm thấy Todo phù hợp với từ khóa tìm kiếm</h3>
    @endif
@endsection