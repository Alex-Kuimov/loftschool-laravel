Изменить товар

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div>
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('product.update', $product->id) }}" method="post">
    {{ csrf_field()}}
    @method('PUT')
    <p>Введите название товара</p>
    <input type="text" name="title" value="{{$product->title}}">
    <p>Введите категорию товара</p>
    <input type="number" name="category_id" value="{{$product->category_id}}">
    <p>Введите цену товара</p>
    <input type="number" name="price" value="{{$product->price}}">
    <p>Введите путь к картинке</p>
    <input type="text" name="image" value="{{$product->image}}">
    <p>Введите описание товара</p>
    <textarea name="description" cols="30" rows="10">{{$product->description}}</textarea><br><br>
    <input type="hidden" name="id" value="{{$product->id}}">
    <input type="submit" name="submit" value="Изменить товар"><br><br>
</form>

<form action="{{ route('product.destroy', $product->id) }}" method="post">
    {{ csrf_field()}}
    @method('DELETE')
    <input type="hidden" name="id" value="{{$product->id}}">
    <input type="submit" name="submit" value="Удалить товар">
</form>

<a href="{{route('admin')}}">На главную</a>
