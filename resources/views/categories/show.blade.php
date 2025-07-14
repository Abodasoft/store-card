@extends('layouts.app')

@section('title', 'منتجات التصنيف: ' . $category->name)

@section('content')
    <h1>منتجات {{ $category->name }}</h1>

    @if($products->count())
        <table>
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
@endsection
