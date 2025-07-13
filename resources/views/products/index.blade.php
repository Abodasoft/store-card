@extends('layouts.app')

@section('content')
<div class="container">
  <h1>المنتجات</h1>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>الاسم</th>
        <th>السعر</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
