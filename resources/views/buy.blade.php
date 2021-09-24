@extends('layouts.app')
@section('content')
    <h3>Ваш заказ</h3>
    <p>Игра:{{$product->title}}</p>
    <p>Цена:{{$product->price}}</p>
    <h3>Оставте свои данные, чтобы наш менеджер связался с вами:</h3>
    @if(isset($user))
        <form action="{{route('sell')}}" method="post">
            {{ csrf_field()}}
            <p>Ваше имя</p>
            <input type="text" value="{{$user->name}}" name="name"><br>
            <p>Ваш email</p>
            <input type="email" name="email" value="{{$user->email}}"><br>
            <br>
            <input type="hidden" name="id" value="{{$id}}">
            <input type="submit">
        </form>
    @else
        <form action="{{route('sell')}}" method="post">
            {{ csrf_field()}}
            <p>Ваше имя</p>
            <input type="text" name="name"><br>
            <p>Ваш email</p>
            <input type="email" name="email"><br>
            <br>
            <input type="hidden" name="id" value="{{$id}}">
            <input type="submit">
        </form>
        <br>
    @endif
    @if(!empty($error))
        @foreach($error as $value)
            <p style="color: red">{{$value}}</p><br>
        @endforeach
    @endif
@endsection
