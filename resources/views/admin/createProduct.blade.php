Создать товар
<form action="{{route('product.create')}}" method="get">
    {{ csrf_field()}}

    <p>Введите название товара</p>
    <input type="text" name="title">
    <p>Введите категорию товара</p>
    <input type="number" name="category_id">
    <p>Введите цену товара</p>
    <input type="number" name="price">
    <p>Введите путь к картинке</p>
    <input type="text" name="image">
    <p>Введите описание товара</p>
    <textarea name="description" cols="30" rows="10"></textarea><br><br>
    <input type="submit" name="submit" value="Создать товар"><br><br>
</form>
<a href="{{route('admin')}}">На главную</a>
