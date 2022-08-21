@extends('layouts.app')

@section('title','Tasks')
@section('logo','Home')

@section('content')
    <div class="wrapper middle">
        <h1 class='todo'>To Do List</h1>
        <h4 class='must'>MUST DO</h4>

        <div class="task-view">
            @foreach ($tasks as $task)
                @if ($task->type === 'must')
                    <div class="row2 must-color">
                        <p class='task-color'>{{ $task->task  }}</p>
                        <form action="{{  route('delete-tasks', $task->id)  }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class='delete'>X</button>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
        <h4 class='should'>SHOULD DO</h4>
        <div class="task-view">
            @foreach ($tasks as $task)
                @if ($task->type === 'should')
                    <div class="row2 should-color">
                        <p class="task-color">{{ $task->task  }}</p>
                        <form action="{{  route('delete-tasks', $task->id)  }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class='delete'>X</button>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
        <h4 class="if">IF I HAVE TIME</h4>
        <div class="task-view">
            @foreach ($tasks as $task)
                @if ($task->type === 'if i have time')
                    <div class="row2 if-color">
                        <p class="task-color">{{ $task->task  }}</p>
                        <form action="{{  route('delete-tasks', $task->id)  }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class='delete'>X</button>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection