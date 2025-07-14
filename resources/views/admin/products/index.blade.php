@extends('adminlte::page')

@section('title', 'المنتجات')

@section('content_header')
    <h1>المنتجات</h1>
@stop

@section('content')
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">إضافة منتج</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>الاسم</th>
            <th>السعر</th>
            <th>التصنيف</th>
            <th>العمليات</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category->name }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">تعديل</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@stop
