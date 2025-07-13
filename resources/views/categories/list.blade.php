@extends('layouts.app')

@section('title', 'قائمة التصنيفات')

@section('content')
    <h1>قائمة التصنيفات</h1>

    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
@endsection
