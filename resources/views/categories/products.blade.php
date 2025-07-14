@extends('layouts.app')

@section('title', 'منتجات التصنيف: ' . $category->name)

@section('content_header')
    <h1>منتجات التصنيف: {{ $category->name }}</h1>
@stop

@section('content')
    @if($products->count())
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>الاسم</th>
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
        <p>لا توجد منتجات في هذا التصنيف.</p>
    @endif
@stop
