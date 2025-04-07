@extends('layouts.app')


@section('title', 'List of Tasks')



@section('content')

    <nav class="mb-4">
        <a class="link" href="{{route('tasks.create')}}">
            Create new task
        </a>
    </nav>

    <div>
        @forelse($tasks as $task)
            <div><a href="{{route('tasks.show', ['task' => $task->id])}}"
                @class([ 'line-through' => $task->completed]) > {{$task->title}} </a></div>
        @empty
            <div>
                <h2>No data available</h2>
            </div>
        @endforelse
    </div>


    <nav class="mt-4">
        @if ($tasks->count())
            {{$tasks->links()}}
        @endif
    </nav>
@endsection