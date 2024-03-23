@extends('layouts.app')

@section('title', 'Edit a task')

@section('styles')
<style>
    .error-message {
        color: red,
        font-size: 0,8rem
    }
</style>
@endsection

@section('content')
<form action="{{ route('tasks.update', ['task' => $task['id']]) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title" class="block uppercase text-slate-700 mb-2">Title</label>
        <input type="text" name="title" id="title" value={{$task['title']}} class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none">
        @error('title')
            <p class="error-message">{{$message}}</p>
        @enderror

        <label for="description" class="block uppercase text-slate-700 mb-2">Description</label>
        <textarea name="description" id="description" cols="30" rows="5" class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none">{{$task['description']}}</textarea>
        @error('description')
        <p class="error-message">{{$message}}</p>
        @enderror

        <label for="long_description" class="block uppercase text-slate-700 mb-2">Long Description</label>
        <textarea class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none" name="long_description" id="long_description" cols="30" rows="10">{{$task['long_description']}}</textarea>
        @error('long_description')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>

    <div>
        <button type="submit">Add Task</button>
    </div>
</form>
@endsection