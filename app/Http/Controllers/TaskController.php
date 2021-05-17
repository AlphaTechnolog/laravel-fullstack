<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Fetch all tasks by user id.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function fetchall(Request $request, int $id)
    {
        $validator = Validator::make(compact('id'), [
            'id' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $tasks = Task::query()
                    ->select(['tasks.*', 'users.name as user_name'])
                    ->join('users', 'users.id', '=', 'tasks.user_id')
                    ->where('tasks.user_id', $id)
                    ->where('tasks.status', true)
                    ->get();

        return response()->json(compact('tasks'), 200);
    }

    /**
     * Create a task using the user id.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $task = Task::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Delete a task by id.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, int $id)
    {
        $validator = Validator::make(compact('id'), [
            'id' => 'required|integer|exists:tasks',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $task = Task::find($id);
        $task->delete();

        return redirect()->route("dashboard");
    }

    /**
     * Render the edit view.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editView(Request $request, int $id)
    {
        $validator = Validator::make(compact('id'), [
            'id' => 'required|integer|exists:tasks,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Edit the task by task id.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make(compact('id'), [
            'id' => 'required|integer|exists:tasks,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'completed' => 'string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $credentials = $request->only('name', 'description', 'completed');
        $credentials['completed'] = isset($credentials['completed']);

        $task = Task::find($id);
        $task->name = $credentials['name'];
        $task->description = $credentials['description'];
        $task->completed = $credentials['completed'];
        $task->save();

        return redirect()->route('dashboard');
    }
}
