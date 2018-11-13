<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use App\Status;
use App\Priority;
use App\Projects;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userId = auth::id();

        if($user->hasRole('client')){
            $data['tasks'] = Tasks::where('active', 1)->where('client_id', $userId)->paginate(7);
            return view('tasks.index', $data);
        } else {
            $data['tasks'] = Tasks::where('active', 1)->paginate(7);
            return view('tasks.index', $data);
        }


//    $tasks = Tasks::paginate(7);
//    return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['statuses'] = Status::all();
        $data['priorities'] = Priority::all();
        $data['projects'] = Projects::all();
        return view('tasks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $connectedUser = auth::id();

        $task = new Tasks();
        $task->title = $request->title;
        $task->task_content = $request->task_content;
        $task->status_id = $request->status;
        $task->priority_id = $request->priority;
        $task->author_id = $connectedUser;
        $task->project_id = $request->project;
        $task->client_id = Projects::find($task->project_id)->client->id;
        $task->estimated_time = $request->estimated_time;
        $task->spent_time = 0;
        $task->billing_time = 0;
        $task->start_date = $request->start_date;
        $task->deadline_date = $request->deadline_date;
        $task->fixed_rate = $request->fixed_rate;
        $task->active = 1;
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
        $user = Auth::user();

       if($user->can('edit task')) {
           $data['task'] = Tasks::find($id);
           $data['statuses'] = Status::all();
           return view('tasks.edit', $data);
       }
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
        $user = Auth::user();

        if($user->can('delete task')) {
            Tasks::where('id',$id)->update([
                'active' => 0
            ]);

            return redirect('tasks');
        }
    }
}
