@foreach($allProduct as $item)
    <a href="{{route('editSelectProduct',['id'=>$item->id])}}">{{$item->title}}</a><br>
@endforeach
