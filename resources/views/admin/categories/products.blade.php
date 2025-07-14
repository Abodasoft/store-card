@extends('layouts.app') {{-- إذا عندك layout عام للموقع --}}
{{-- أو استبدله بـ adminlte::page إذا تريده بنفس تصميم الادمن --}}

@section('title', $category->name)

@section('content')
<div class="container mt-4">
    <h1>منتجات التصنيف: {{ $category->name }}</h1>

    @if($products->count())
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>السعر: {{ $product->price }}$</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p>لا يوجد منتجات ضمن هذا التصنيف حالياً.</p>
    @endif
</div>
@endsection
