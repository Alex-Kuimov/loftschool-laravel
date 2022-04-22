@foreach($products as $product)
    <a href="{{route('product.edit', $product->id ) }}">{{$product->title}}</a><br>
@endforeach
