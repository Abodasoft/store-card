<h2>التصنيفات</h2>
<ul>
  @foreach($categories as $category)
    <li>{{ $category->name }}</li>
  @endforeach
</ul>

<h2>المنتجات</h2>
<ul>
  @foreach($products as $product)
    <li>{{ $product->name }} ({{ $product->category->name }})</li>
  @endforeach
</ul>
