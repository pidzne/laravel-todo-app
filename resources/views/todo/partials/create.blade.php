@extends('layouts.todo')

@section('css')
    
@endsection

@section('title')
    Thêm mới Todo 
@endsection

@section('content')
<h3 class="text-center">Thêm mới Todo</h3>
<form action="{{ route('todos.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="t_title">Tiêu đề</label>
        <input type="text" class="form-control" id="t_title" placeholder="VD: Bóng đá" name="t_title">
    </div>
    <div class="form-group">
        <label for="t_content">Nội dung</label>
        <textarea class="form-control" id="t_content" rows="10" placeholder="Xem trận chung kết UCL giữa MU và Liverpool"  name="t_content"></textarea>
    </div>
    <a href="{{ route('todos.index') }}" class="btn btn-info">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
    <button type="submit" class="btn btn-success">
        <i class="fas fa-plus"></i> Thêm
    </button>
</form>
@endsection
