Изменить товар
<form action="{{route('updateSelectProduct')}}" method="post">
    {{ csrf_field()}}
    <p>Введите название товара</p>
    <input type="text" name="title" value="{{$change['0']}}">
    <p>Введите категорию товара</p>
    <input type="number" name="category_id" value="{{$change['2']}}">
    <p>Введите цену товара</p>
    <input type="number" name="price" value="{{$change['1']}}">
    <p>Введите путь к картинке</p>
    <input type="text" name="image" value="{{$change['3']}}">
    <p>Введите описание товара</p>
    <textarea name="description" cols="30" rows="10">{{$change['4']}}</textarea><br><br>
    <input type="hidden" name="id" value="{{$change['5']}}">
    <input type="submit" name="submit" value="Изменить товар"><br><br>
    @if(!empty($error))
        @foreach($error as $value)
            {{$value}}
        @endforeach
    @endif
</form>
<a href="{{route('admin')}}">На главную</a>
