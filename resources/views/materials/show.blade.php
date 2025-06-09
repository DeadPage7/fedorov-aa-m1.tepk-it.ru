@extends('layouts.layout')

@section('title', 'Список материалов')

@section('content')
    <a class="btn" href="{{ route('materials.create') }}">Создать материал</a>

    @foreach($materials as $material)
        <div >
            <div >
                <div >{{$material->materialType->name}} | {{$material->name}}</div>
                <div>{{$material->minimum}}</div>
                <div>{{$material->warehouse}}</div>
                <div>Цена: {{$material->price}} р/{{$material->unit->name}} | {{$material->packaging}}</div>
            </div>
            <div >
                {{ $material->total }}
            </div>
        </div>
    @endforeach
@endsection
