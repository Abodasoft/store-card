@extends('adminlte::page')

@section('title', 'تعديل التصنيف')

@section('content_header')
    <h1>تعديل التصنيف</h1>
@stop

@section('content')
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">اسم التصنيف</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
        </div>

        <button class="btn btn-primary mt-2">تحديث</button>
    </form>
@stop
