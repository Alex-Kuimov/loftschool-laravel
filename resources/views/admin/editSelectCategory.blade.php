Изменить категорию
<form action="{{route('updateSelectCategory')}}" method="post">
    {{ csrf_field()}}
    <p>Введите название категории</p>
    <input type="text" name="title" value="{{$changeTitle}}">
    <p>Введите описание категории категории</p>
    <textarea name="description" cols="30" rows="10">{{$changeDescription}}</textarea><br><br>
    <input type="hidden" name="id" value="{{$changeId}}">
    <input type="submit" name="submit" value="Изменить категорию"><br><br>
    @if(!empty($error))
        @foreach($error as $value)
            {{$value}}
        @endforeach
    @endif
</form>
<a href="{{route('admin')}}">На главную</a>
