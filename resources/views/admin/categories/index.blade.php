@extends('adminlte::page')

@section('title', 'التصنيفات')

@section('content_header')
    <h1>التصنيفات</h1>
@stop

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">إضافة تصنيف</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>الاسم</th>
            <th>العمليات</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">تعديل</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@stop
