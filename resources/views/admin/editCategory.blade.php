@foreach($allCategory as $item)
    <a href="{{route('editSelectCategory',['id'=>$item->id])}}">{{$item->title}}</a><br>
@endforeach
