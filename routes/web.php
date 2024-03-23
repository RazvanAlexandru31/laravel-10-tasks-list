<?php


use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', ['tasks' => Task::latest()->paginate(5)]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('tasks/{task}/edit', function(Task $task){
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {

    return view('show', ['tasks' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    // dd($request->all());
    $data = $request->validate([
        'title' => ['required', 'max:80'],
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = Task::create($data);

    return redirect()->route('tasks.show', ['task' => $task['id']])->with('success', 'Task created');
})->name('tasks.store');


Route::put('/tasks/{task}', function (Task $task, Request $request) {
    // dd($request->all());
    $data = $request->validate([
        'title' => ['required', 'max:80'],
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task->update($data);

    return redirect()->route('tasks.show', ['task' => $task['id']])->with('success', 'Task updated successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task){
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function(Task $task){
    $task->toggleComplete();
    $task->save();

    return redirect()->back()->with('success', 'Task updated successfully.');
})->name('tasks.toggleComplete');