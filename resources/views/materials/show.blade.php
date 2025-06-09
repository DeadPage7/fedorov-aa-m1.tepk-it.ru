@extends('layouts.layout')

@section('title', 'Продукция с использованием материала')

@section('content')

    <div>
        <div>
            <a class="btn" href="{{ route('materials.index') }}">Назад к списку материалов</a>
            <h2 class="zag">Продукция с использованием "{{ $material->name }}"</h2>
        </div>

        @if ($products->isEmpty())
            <p>Этот материал нигде не используется.</p>
        @else
            <table>
                <thead>
                <tr>
                    <th class="border c1-background">Наименование продукции</th>
                    <th class="border c1-background">Необходимое количество материала</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $mp)
                    <tr >
                        <td class="border c1-background">{{ $mp->product->name }}</td>
                        <td class="border c1-background">{{ $mp->quantity }} {{ $material->unit->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection
