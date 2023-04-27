@extends('layouts.todo')

@section('css')
    
@endsection

@section('title')
    Chi tiết Todo 
@endsection

@section('content')
<h3 class="text-center mb-3">Thông tin chi tiết Todo</h3>
<table class="table table-bordered">
    <tbody>
        @foreach ($todoLists as $t)
            <tr>
                <td class="col-md-4 align-middle">Tiêu đề</td>
                <td class="col-md-8 align-middle">{{ $t->todo_title ?? '' }}</td>
            </tr>
            <tr>
                <td class="col-md-4 align-middle">Nội dung</td>
                <td class="col-md-8 align-middle">{{ $t->todo_content ?? '' }}</td>
            </tr>
            <tr>
                <td class="col-md-4 align-middle">Ngày tạo</td>
                <td class="col-md-8 align-middle">{{ $t->created_at ?? '' }}</td>
            </tr>
            <tr>
                <td class="col-md-4 align-middle">Ngày cập nhật</td>
                <td class="col-md-8 align-middle">{{ $t->updated_at ?? '' }}</td>
            </tr>
            <tr>
                <td class="col-md-4 align-middle">Thời gian tạo</td>
                <td class="col-md-8 align-middle">{{ $t->created_at->diffForHumans() ?? '' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('todos.index') }}" class="btn btn-info">
    <i class="fas fa-arrow-left"></i> Quay lại
</a>
@endsection
