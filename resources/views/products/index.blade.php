<!DOCTYPE html>
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
