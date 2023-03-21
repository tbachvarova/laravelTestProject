@extends('layout')

@section('content')
<h1>{{$heading}}</h1>

@php
    echo 'bla';
@endphp

@if( count($listings) == 0 )
    <p>No listings</p>
@endif

@foreach($listings as $listing)
    <h2><a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a> </h2>
    <p>{{$listing['description']}}</p>

@endforeach

{{--

@unless(count($listings) == 0 )
    @foreach($listings as $listing)
        <h2> {{$listing['title']}} </h2>
        <p>{{$listing['description']}}</p>

    @endforeach
@else
    <p>NO listings with unles</p>
@endunless
--}}
@endsection
