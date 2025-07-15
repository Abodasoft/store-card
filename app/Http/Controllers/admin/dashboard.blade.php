@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">

  <h1 class="text-2xl font-bold mb-6">لوحة التحكم</h1>

  {{-- ✅ إضافة تصنيف --}}
  <h2 class="text-xl font-semibold mb-2">إضافة تصنيف</h2>
  <form method="POST" action="{{ route('admin.category.add') }}" class="mb-6">
    @csrf
    <input type="text" name="name" placeholder="اسم التصنيف" class="border p-2 rounded w-full mb-2" required>
    <textarea name="description" placeholder="الوصف" class="border p-2 rounded w-full mb-2"></textarea>
    <input type="text" name="image" placeholder="رابط الصورة" class="border p-2 rounded w-full mb-2">
    <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded">إضافة</button>
  </form>

  {{-- ✅ قائمة التصنيفات --}}
  <h2 class="text-xl font-semibold mb-2">التصنيفات</h2>
  <ul class="mb-6">
    @foreach($categories as $category)
      <li class="mb-2 border-b pb-2">
        <form method="POST" action="{{ route('admin.category.edit', $category->id) }}">
          @csrf
          <input type="text" name="name" value="{{ $category->name }}" class="border p-2 rounded mb-1" required>
          <input type="text" name="description" value="{{ $category->description }}" class="border p-2 rounded mb-1">
          <input type="text" name="image" value="{{ $category->image }}" class="border p-2 rounded mb-1">
          <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">تعديل</button>
          <a href="{{ route('admin.category.delete', $category->id) }}" onclick="return confirm('هل أنت متأكد من الحذف؟')" class="bg-red-600 text-white px-3 py-1 rounded">حذف</a>
        </form>
      </li>
    @endforeach
  </ul>

  {{-- ✅ إضافة منتج --}}
  <h2 class="text-xl font-semibold mb-2">إضافة منتج</h2>
  <form method="POST" action="{{ route('admin.product.add') }}" class="mb-6">
    @csrf
    <select name="category_id" class="border p-2 rounded w-full mb-2" required>
      @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
    <input type="text" name="name" placeholder="اسم المنتج" class="border p-2 rounded w-full mb-2" required>
    <textarea name="description" placeholder="الوصف" class="border p-2 rounded w-full mb-2"></textarea>
    <input type="number" name="price" placeholder="السعر" class="border p-2 rounded w-full mb-2" required>
    <input type="number" name="stock" placeholder="الكمية" class="border p-2 rounded w-full mb-2" required>
    <input type="text" name="image" placeholder="رابط الصورة" class="border p-2 rounded w-full mb-2">
    <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded">إضافة</button>
  </form>

  {{-- ✅ قائمة المنتجات --}}
  <h2 class="text-xl font-semibold mb-2">المنتجات</h2>
  <ul>
    @foreach($products as $product)
      <li class="mb-2 border-b pb-2">
        <form method="POST" action="{{ route('admin.product.edit', $product->id) }}">
          @csrf
          <select name="category_id" class="border p-2 rounded mb-1" required>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
            @endforeach
          </select>
          <input type="text" name="name" value="{{ $product->name }}" class="border p-2 rounded mb-1" required>
          <input type="text" name="description" value="{{ $product->description }}" class="border p-2 rounded mb-1">
          <input type="number" name="price" value="{{ $product->price }}" class="border p-2 rounded mb-1" required>
          <input type="number" name="stock" value="{{ $product->stock }}" class="border p-2 rounded mb-1" required>
          <input type="text" name="image" value="{{ $product->image }}" class="border p-2 rounded mb-1">
          <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">تعديل</button>
          <a href="{{ route('admin.product.delete', $product->id) }}" onclick="return confirm('هل أنت متأكد من الحذف؟')" class="bg-red-600 text-white px-3 py-1 rounded">حذف</a>
        </form>
      </li>
    @endforeach
  </ul>

</div>
@endsection
