@foreach($orders as $item)
    <p>Имя:{{$item->name}} Email: {{$item->email}} Номер товара:{{$item->product_id}}</p>
@endforeach
