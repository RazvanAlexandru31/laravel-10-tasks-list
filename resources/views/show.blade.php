@extends('layouts.app')

@section('title', $tasks->title)

@section('content')
<div class="mb-4">
    <a href=""></a><a href="{{route('tasks.index')}}" class="font-medium text-gray-700 underline decoration-red-600 text-xl">&larr; Go back to the task list</a>
</div>

<p class="mb-4 text-gray-700">{{$tasks->description}}</p>

@if($tasks->long_description)
<p class="mb-4 text-gray-700">{{$tasks->long_description}}</p>
@endif

<p class="mb-4 text-sm text-slate-500">Created - {{$tasks->created_at->diffForHumans()}} . Updated - {{$tasks->updated_at->diffForHumans()}}</p>

<p class="mb-4">
    @if($tasks['completed'])
        <span class="font-medium text-green-500">Completed</span>
    @else
        <span class="font-medium text-red-500">Not completed</span>
@endif
</p>



<div class="flex gap-5">
    <a href="{{route('tasks.edit', ['task' => $tasks['id']])}}" class="rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-slate-500">Edit</a>

    <form action="{{route('tasks.toggleComplete', ['task' => $tasks['id']])}}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-slate-500">
            Mark as {{$tasks['completed'] ? 'not completed' : 'completed'}}
        </button>
    </form>

    <form action="{{ route('tasks.destroy', ['task' => $tasks['id']])}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-slate-500" type="submit">Delete</button>
    </form>
</div>

@endsection
