@extends('layouts.main')

@section('content')
  <h1>Login</h1>

  @if(count($errors) > 0)
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  @endif

  <form action="{{ route('dologin') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Send</button>
  </form>
@endsection
