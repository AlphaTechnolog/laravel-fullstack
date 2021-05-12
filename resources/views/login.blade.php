@extends('layouts.main')

@section('content')
  @if(count($errors) > 0)
    <Errors
      :errors="{{ json_encode($errors->all()) }}"
    ></Errors>
  @endif

  <Login></Login>
@endsection
