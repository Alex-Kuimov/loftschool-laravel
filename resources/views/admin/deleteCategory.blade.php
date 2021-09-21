@foreach($allCategory as $item)
    <form action="{{route('confirmCategory')}}" method="post">
        {{ csrf_field()}}
        <input type="hidden" name="id" value="{{$item->id}}">
        <input type="submit" name="submit" value="Удалить категорию {{$item->title}}">
    </form>
@endforeach
