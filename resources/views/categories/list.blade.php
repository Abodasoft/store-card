@extends('layouts.app')

@section('title', 'قائمة التصنيفات')

@section('content')
    <h1>قائمة التصنيفات</h1>
    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{ route('categories.show', $category) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
