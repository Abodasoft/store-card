<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>اسم التصنيف</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">تحديث</button>
</form>
