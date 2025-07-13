<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>قائمة التصنيفات</title>
</head>
<body>
    <h1>قائمة التصنيفات</h1>

    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</body>
</html>
