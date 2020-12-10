@extends('layouts.app')

@section('content')
    
    @foreach($areas as $area)
        <p> {{$area}} </p>
    @endforeach
@endsection
