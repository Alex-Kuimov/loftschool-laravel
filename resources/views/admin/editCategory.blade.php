Изменить категорию

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('category.update', $category->id) }}" method="post">
    {{ csrf_field()}}
    @method('PUT')
    <p>Введите название категории</p>
    <input type="text" name="title" value="{{$category->title}}">
    <p>Введите описание категории категории</p>
    <textarea name="description" cols="30" rows="10">{{$category->description}}</textarea><br><br>
    <input type="hidden" name="id" value="{{$category->id}}">
    <input type="submit" name="submit" value="Изменить категорию"><br><br>
</form>

<form action="{{ route('category.destroy', $category->id) }}" method="post">
    {{ csrf_field()}}
    @method('DELETE')
    <input type="hidden" name="id" value="{{$category->id}}">
    <input type="submit" name="submit" value="Удалить категорию">
</form>

<a href="{{route('admin')}}">На главную</a>
