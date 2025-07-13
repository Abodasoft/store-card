<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Products List</title>
</head>
<body>
    <h1>قائمة المنتجات</h1>

    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - {{ $product->price }}$</li>
        @endforeach
    </ul>
</body>
</html>
