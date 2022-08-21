@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <h3 class='welcome'>Welcome {{Auth::user()->name}}</h3>
                    <form action="{{  route('show-tasks')  }}" method="POST">
                        @csrf
                        <button class="view-my-tasks" type="submit">View my Tasks</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
