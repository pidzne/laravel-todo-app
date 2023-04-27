@extends('layouts.todo')

@section('css')
    
@endsection

@section('title')
    Chỉnh sửa Todo 
@endsection

@section('content')
<h3 class="text-center">Cập nhật Todo</h3>
<form action="{{ route('todos.update', ['todo'=>$todoLists->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="t_title">Tiêu đề</label>
        <input type="text" class="form-control" id="t_title" value="{{ $todoLists->todo_title ?? '' }}" name="t_title">
    </div>
    <div class="form-group">
        <label for="t_content">Nội dung</label>
        <textarea class="form-control" id="t_content" rows="10" name="t_content">{{ $todoLists->todo_content ?? '' }}</textarea>
    </div>
    <a href="{{ route('todos.index') }}" class="btn btn-info">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-pencil"></i> Cập nhật
    </button>
</form>
@endsection
