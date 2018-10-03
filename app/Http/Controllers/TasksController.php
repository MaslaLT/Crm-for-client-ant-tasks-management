<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use App\Status;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Tasks::paginate(7);
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        return view('tasks.create')->with('statuses', $statuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Tasks();
        $task->title = $request->title;
        $task->task_content = $request->task_content;
        $task->status_id = 1;
        $task->priority_id = 1;
        $task->client_id = 1;
        $task->author_id = 1;
        $task->project_id = 1;
        $task->estimated_time = $request->estimated_time;
        $task->spent_time = 0;
        $task->billing_time = 0;
        $task->start_date = $request->start_date;
        $task->deadline_date = $request->deadline_date;
        $task->fixed_rate = $request->fixed_rate;
        $task->save();
        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Tasks::find($id);
        return view('tasks.single')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['task'] = Tasks::find($id);
        $data['statuses'] = Status::all();
        return view('tasks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Tasks::where('id',$id)->update([
            'title' => $request->title,
            'status_id' => $request->status,
            'task_content' => $request->task_content,
            'start_date' => $request->start_date
        ]);
        return redirect(route('tasks.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tasks::destroy($id);
        return redirect('tasks');
    }
}
