<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>قائمة المنتجات</title>
</head>
<body>
    <h1>المنتجات</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>الاسم</th>
            <th>السعر</th>
            <th>الفئة</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category_id }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
