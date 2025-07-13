@extends('layouts.app')

@section('content')
    <h1>كل التصنيفات</h1>
    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
@endsection
