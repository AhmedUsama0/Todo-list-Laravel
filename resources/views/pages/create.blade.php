@extends('layouts.app')

@section('title','Create')
@section('content')
    @include('form.form')
    @section('action',"{{ route('create-tasks')  }}")
@endsection

