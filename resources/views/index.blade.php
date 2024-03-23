@extends('layouts.app')

@section('title', 'List of Tasks')

@section('content')
<nav class="mb-10">
    <a href="{{route('tasks.create')}}" class="font-medium text-gray-700 underline decoration-red-600 text-xl">Add a new task</a>
</nav>
@forelse ($tasks as $task)
    <div><a href="{{route('tasks.show', ['task' => $task['id']])}}"  @class(['font-bold', 'line-through' => $task['completed']])>
        {{$task->title}}
    </a></div>
@empty
    <div>There are no tasks left</div>
@endforelse

@if($tasks->count())
    <nav>
            {{$tasks->links()}}
    </nav>
@endif
@endsection

