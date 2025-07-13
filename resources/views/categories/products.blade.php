@extends('adminlte::page')

@section('title', 'منتجات ' . $category->name)

@section('content_header')
    <h1>منتجات التصنيف: {{ $category->name }}</h1>
@stop

@section('content')
    @if($products->count())
        <ul>
            @foreach($products as $product)
                <li>{{ $product->name }}</li>
            @endforeach
        </ul>
    @else
        <p>لا توجد منتجات في هذا التصنيف.</p>
    @endif
@stop
