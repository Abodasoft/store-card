@extends('adminlte::page')

@section('title', 'عرض التصنيف: ' . $category->name)

@section('content_header')
    <h1>المنتجات ضمن: {{ $category->name }}</h1>
@stop

@section('content')
    @if($products->count())
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>اسم المنتج</th>
                <th>السعر</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p>لا يوجد منتجات في هذا التصنيف حالياً.</p>
    @endif
@stop
