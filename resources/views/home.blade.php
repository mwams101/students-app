@extends('base')
@section('content')
<h1>Welcome back {{ auth()->user()->name }}</h1>
@endsection
