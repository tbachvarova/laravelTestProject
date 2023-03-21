@extends('layout')

@section('content')

<h1>{{$listing['title']}}<h1>
<h3>Id: {{$listing['id']}}<h3>


    <p>{{$listing['description']}}</p>
@endsection
