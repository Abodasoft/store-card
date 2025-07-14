@extends('layouts.app')

@section('content')
    <h1>المنتجات في تصنيف: {{ $category->name }}</h1>

    @if($products->count())
        <ul>
            @foreach($products as $product)
                <li>{{ $product->name }} - ${{ $product->price }}</li>
            @endforeach
        </ul>
    @else
        <p>لا توجد منتجات ضمن هذا التصنيف.</p>
    @endif
@endsection
