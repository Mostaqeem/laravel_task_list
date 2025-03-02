@extends('layouts.app')


@section('title', 'List of Tasks')


@section('content')
    <div>
        @forelse($tasks as $task)
            <div><a href="{{route('tasks.show', ['id' => $task->id])}}"> {{$task->title}} </a></div>
        @empty
            <div><h2>No data available</h2></div>
        @endforelse
    </div>
@endsection


