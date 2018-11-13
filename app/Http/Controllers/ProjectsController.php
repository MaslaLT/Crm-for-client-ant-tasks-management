<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\User;
use Illuminate\Support\Facades\Auth;
//use Spatie\Permission\Traits\HasRoles;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        if($user->hasRole('client')){
            $data['projects'] = Projects::where('project_owner_id', $user->id)->get();
            return view('projects.index')->with($data);
        }else {
            $data['projects'] = Projects::paginate(7);
            return view('projects.index')->with($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientUsers = User::role('client')->get();
        $data['clients'] = $clientUsers;
        $data['users'] = User::all();
        return view('projects.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Projects();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->created_at = $request->created_at;
        $project->updated_at = $request->updated_at;
        $project->project_owner_id = $request->project_owner_id;
        $project->hourly_rate = $request->hourly_rate;
        $project->url = $request->url;
        $project->admin_url = $request->admin_url;
        $project->login_details = $request->login_details;
        $project->git_url = $request->git_url;
        $project->logo_url = $request->logo_url;
        $project->system_type = $request->system_type;
        $project->details_id = 1;
        $project->save();
        return redirect('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = Projects::find($id);
        return view('projects.single')->with('projects', $projects);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
