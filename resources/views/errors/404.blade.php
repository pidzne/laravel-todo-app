@extends('layouts.error')

@section('title')
    Trang báo lỗi - 404
@endsection

@section('content')
    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto mt-5" data-text="404">404</div>
        <p class="lead text-gray-800 mb-2">Không tìm thấy trang</p>
        {{-- <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p> --}}
        <a href="javascript:history.back()" class="btn btn-info">
           <i class="fas fa-arrow-left mr-2"></i>Quay lại
        </a>
    </div>
@endsection