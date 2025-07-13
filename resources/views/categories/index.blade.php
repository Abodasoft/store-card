<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
</head>
<body>
    <h1>Categories</h1>
    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</body>
</html>
