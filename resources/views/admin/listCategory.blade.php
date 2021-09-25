@foreach($categories as $category)
    <a href="{{route('category.edit', $category->id ) }}">{{$category->title}}</a><br>
@endforeach
