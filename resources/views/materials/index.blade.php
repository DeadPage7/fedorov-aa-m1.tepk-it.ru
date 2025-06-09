@extends('layouts.layout')

@section('title', 'Список материалов')

@section('content')
    <a class="btn" href="{{ route('materials.create') }}">Создать материал</a>

    @foreach($materials as $material)
        <div class="flex border c1-background bigSize">
            <div class="div85" id="edit">
                <div class="bigSize">{{$material->materialType->name}} | {{$material->name}}</div>
                <div>{{$material->minimum}}</div>
                <div>{{$material->warehouse}}</div>
                <div>Цена: {{$material->price}} р/{{$material->unit->name}} | {{$material->packaging}}</div>
            </div>
            <div class="div15 bigSize">
                {{ $material->total }}
            </div>
            <a  class="btn2 " href="{{ route('materials.show', $material->id) }}">Просмотр</a>
            <a  class="btn2 " href="{{ route('materials.edit', $material->id) }}">Редактировать</a>
        </div>

    @endforeach
@endsection
