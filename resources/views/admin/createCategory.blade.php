Создать категорию
<form action="{{route('changeCategory')}}" method="post">
    {{ csrf_field()}}
    <p>Введите название категории</p>
    <input type="text" name="title">
    <p>Введите описание категории</p>
    <textarea name="description" cols="30" rows="10"></textarea><br><br>
    <input type="submit" name="submit" value="Создать категорию"><br><br>
    @if(!empty($error))
        @foreach($error as $value)
            {{$value}}
        @endforeach
    @endif
</form>
<a href="{{route('admin')}}">На главную</a>

