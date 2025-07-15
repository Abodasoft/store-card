<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>المتجر</title>
</head>
<body>
  <h1>🌟 المنتجات حسب التصنيفات</h1>

  @foreach($categories as $category)
    <h2>{{ $category->name }}</h2>
    <p>{{ $category->description }}</p>
    <div style="display: flex; gap: 20px;">
      @foreach($category->products as $product)
        <div style="border:1px solid #ccc; padding:10px; width:200px;">
          <h4>{{ $product->name }}</h4>
          <p>السعر: {{ $product->price }}$</p>
          <p>المخزون: {{ $product->stock }}</p>
          @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" style="width:100%;">
          @endif
        </div>
      @endforeach
    </div>
  @endforeach

</body>
</html>
