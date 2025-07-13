<!DOCTYPE html>
<h1>Products Page Test</h1>
@foreach ($products as $product)
    <div>{{ $product->name }} - {{ $product->price }}</div>
@endforeach

<html>
<head>
    <meta charset="UTF-8">
    <title>Products Test</title>
</head>
<body>
    <h1>Products Page</h1>

    @if(count($products))
        <ul>
            @foreach($products as $product)
                <li>{{ $product->name }} - {{ $product->price }}$</li>
            @endforeach
        </ul>
    @else
        <p>No products found.</p>
    @endif

</body>
</html>
