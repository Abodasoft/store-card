@extends('adminlte::page')

@section('title', 'إضافة تصنيف')

@section('content_header')
    <h1>إضافة تصنيف</h1>
@stop

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">اسم التصنيف</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-success mt-2">حفظ</button>
    </form>
@stop
