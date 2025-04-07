<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Task;

// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }

// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];


//php artisan route:list     =>shows all the routes

Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  return view('index', [
    /**
     * php artisan tinker
     * App\Models\Task::select('id', 'title')->where('completed', 'true')->get();
     */
    'tasks' => Task::latest()->paginate(10)
  ]);
})->name('tasks.index');





//Route for input form
Route::view('/tasks/create', 'create')->name('tasks.create');

// post method to retrive data from the form.
Route::post('/tasks', function (TaskRequest $request) {
  // dd($request->all());

  // $data = $request->validated();

  // $task = new Task();
  // $task->title = $data['title'];
  // $task->description = $data['description'];
  // $task->long_description = $data['long_description'];
  // $task->save();

  $task = Task::create($request->validated());

  return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task Created Successfully!!');
})->name('tasks.store');



//PUT method is used to PUT the data to update
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {


  // $data = $request->validated();

  // $task->title = $data['title'];
  // $task->description = $data['description'];
  // $task->long_description = $data['long_description'];
  // $task->save();

  $task->update($request->validated());

  return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task Updated Successfully!!');
})->name('tasks.update');


//this route is for update or edit
Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('edit', ['task' => $task]);
})->name('tasks.edit');


//passes on the $task parameter or variable to the 'show' blade template
Route::get('/tasks/{task}', function (Task $task) {
  return view(
    'show',
    ['task' => $task]
  );
})->name('tasks.show');


Route::delete('/tasks/{task}', function (Task $task) {
  $task->delete();
  return redirect()->route('tasks.index')
    ->with('success', 'Task was deleted successfully!');
})->name('tasks.destroy');



Route::put('/tasks/{task}/complete', function (Task $task) {
  $task->toggleComplete();

  return redirect()->back()
    ->with('success', 'Task was marked as completed!');

})->name('tasks.toggle-complete');













// //for reference
// //hello page
// Route::get('/hello', function(){
//     return 'Hello User!';
// })->name('hello');

// //redirecting
// Route::get('/hallo', function(){
//     return redirect('/hello');
// });

// Route::get('/hal', function(){
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function($name){
//     return '<h2>Greetings '.$name.'!</h2>';
// });

// //generic catch all other routes
// Route::fallback(function(){
//     return "<h1>The page doesn't exist!</h1>";
// });


//GET
//POST
//PUT
//DELETE