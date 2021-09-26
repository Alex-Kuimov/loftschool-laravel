Создать категорию
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
<form action="{{route('category.create')}}" method="get">
    {{ csrf_field()}}
    <p>Введите название категории</p>
    <input type="text" name="title">
    <p>Введите описание категории</p>
    <textarea name="description" cols="30" rows="10"></textarea><br><br>
    <input type="submit" name="submit" value="Создать категорию"><br><br>
</form>
<a href="{{route('admin')}}">На главную</a>

