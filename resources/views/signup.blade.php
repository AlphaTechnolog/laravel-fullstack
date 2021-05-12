@extends("layouts.main")

@section('content')
  <h1>Signup</h1>

  @if (count($errors) > 1)
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  @endif

  <form action="{{ route('dosignup') }}" method='POST'>
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Send</button>
  </form>
@endsection
