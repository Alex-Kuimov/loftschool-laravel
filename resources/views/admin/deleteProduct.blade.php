@foreach($allProduct as $item)
    <form action="{{route('confirmProduct')}}" method="post">
        {{ csrf_field()}}
        <input type="hidden" name="id" value="{{$item->id}}">
        <input type="submit" name="submit" value="Удалить товар {{$item->title}}">
    </form>
@endforeach
