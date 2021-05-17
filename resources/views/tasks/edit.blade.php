@extends('layouts.main')

@section('content')
  <edit-task :task='{{ $task }}'></edit-task>
@endsection
