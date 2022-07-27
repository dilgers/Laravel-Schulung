@extends('layouts.app')

@section('content')


    <h1> Hello {!! $name !!} </h1>
    <p> Meine Content</p>

    @if ($age >= 18)
        <p> Du darfst Alkohol kaufen </p>
    {{-- @elseif ($age >= 16)
        <p> Bier </p>--}}
    @else
        <p> No No </p>
    @endif

    <ul>
    @foreach ($users as $user )
        <li> {{ $loop->index }} {{ $loop->first }} {{ $user }} </li>
    @endforeach
    </ul>

@endsection

@section('blog')
<hi> Blog </hi>
@endsection
