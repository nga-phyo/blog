
@extends('section.design')

@section('title', 'MyPost Title')

@section('text')
@foreach($work as $work)

    <li>
        {{ $work->title }}
    </li>
@endforeach

@endsection