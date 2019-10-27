<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Project;
use App\Tier;
use App\Classes;
use App\Status;
use App\Event\AgentPublished;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class AgentController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::orderBy('created_at', 'desc')->get();
        $projects = Project::orderBy('created_at', 'desc')->get();
        $tiers = Tier::orderBy('created_at', 'desc')->get();
        $classes = Classes::orderBy('created_at', 'desc')->get();
        $statuses = Status::orderBy('created_at', 'desc')->get();
        //dd($projects);
        $data = [
            'agents' => $agents,
            'projects' => $projects,
            'tiers' => $tiers,
            'classes' => $classes,
            'statuses' => $statuses
        ];
        return view('pages.agent')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->project);
        $this->validate($request, ['agentProject' => 'required']);

        $agent = new Agent();
        $agent->agent_name = $request->agentName;
        $agent->agent_website = $request->agentWebsite;
        $agent->agent_main_contact_name = $request->agentMainContactName;
        $agent->agent_moto = $request->agentMoto;
        $agent->agent_business = $request->agentBusiness;
        $tierId = $request->agentTier;
        $classId = $request->agentClass;
        $statusId = $request->agentStatus;
        $agent->agent_contact_info = $request->agentContactInfo;
        $projectId= $request->agentProject;


        // $data = [
        //     'image' => '',
        // ];
        try
        {
            //dd($request->project);
           // dd($projectId);
            $agent->save();

            $project = Project::find($projectId);
            //dd($project);
            // $tier = Tier::find($tierId);
            // $class = Classes::find($classId);
            // $status = Status::find($statusId);
            $agent->projects()->save($project);
            $project->save();
            //dd($project);


        }
        // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {

        }
        $tiers = Tier::select('tier_name')->where('id', $tierId)->get('tier_name');
        foreach($tiers as $tier) {
            $tierName = $tier->tier_name;
        }
        $classes = Classes::select('class_name')->where('id', $classId)->get();
        foreach($classes as $class) {
            $className = $class->class_name;
        }
        $statuss = Status::select('status_name')->where('id', $statusId)->get();

        foreach($statuss as $status) {
            $statusName = $status->status_name;
        }
        $agent->tier = $tierName;
        $agent->class = $className;
        $agent->status = $statusName;



        $agent->save();
        event(new AgentPublished($agent));
        //dd($agent);

        session()->flash('Success', 'Agent Added Successfully');

        return back();

    }

    public function showAddProject($id){

        $agent = Agent::findOrFail($id);
        $projects = project::orderBy('created_at', 'desc')->get();

       // dd($projects);
        $data = [
            'agent' => $agent,
            'projects' => $projects,

        ];
        //dd($agent);
        return view('pages.addProjectAgentPage')->with($data);
    }




    public function addProject(Request $request){
        $agentId = $request->agentId;
        $projectId= $request->project;

        // $data = [
        //     'image'   => '',
        // ];
        try
        {
            // dd($request->project);
            // dd($projectId);
            $agent = Agent::find($agentId);
            $agent->save();

            $project = Project::find($projectId);
            $project->save();
            // dd($project);
            // $tier = Tier::find($tierId);
            // $class = Classes::find($classId);
            // $status = Status::find($statusId);
            $agent->projects()->attach($project);
            $project->save();

            //dd($project);


        }
        // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {

        }



        $agent->save();
        //dd($agent);

        session()->flash('Success', 'Agent Added Successfully');

        return back();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        $projects = Project::orderBy('created_at', 'desc')->get();
        $tiers = Tier::orderBy('created_at', 'desc')->get();
        $classes = Classes::orderBy('created_at', 'desc')->get();
        $statuses = Status::orderBy('created_at', 'desc')->get();
       // dd($projects);
        $data = [
            'agent' => $agent,
            'projects' => $projects,
            'tiers' => $tiers,
            'classes' => $classes,
            'statuses' => $statuses
        ];
        return view('pages.editAgent')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, ['agentName' => 'required', 'agentBusiness' => 'required', 'status' => 'required']);

        $agent = Agent::findOrFail($request->agentId);
        $agent->agent_name = $request->agentName;
        $agent->agent_website = $request->agentWebsite;
        $agent->agent_main_contact_name = $request->agentMainContactName;
        $agent->agent_moto = $request->agentMoto;
        $agent->agent_business = $request->agentBusiness;
        $tierId = $request->tier;
        $classId = $request->class;
        $statusId = $request->status;
        $agent->agent_contact_info = $request->agentContactInfo;
        $projectId= $request->project;

        // $data = [
        //     'image' => '',
        // ];
        try
        {
            //dd($request->project);
           // dd($projectId);
            $agent->save();

            $project = Project::find($projectId);
            //dd($project);
            // $tier = Tier::find($tierId);
            // $class = Classes::find($classId);
            // $status = Status::find($statusId);
            $project->save();

            $agent->projects()->attach($project);
            $project->save();
            //dd($project);


        }
        // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {

        }
        $tiers = Tier::select('tier_name')->where('id', $tierId)->get('tier_name');
        foreach($tiers as $tier) {
            $tierName = $tier->tier_name;
        }
        $classes = Classes::select('class_name')->where('id', $classId)->get();
        foreach($classes as $class) {
            $className = $class->class_name;
        }
        $statuss = Status::select('status_name')->where('id', $statusId)->get();

        foreach($statuss as $status) {
            $statusName = $status->status_name;
        }

        $agent->tier = $tierName;
        $agent->class = $className;
        $agent->status = $statusName;



        $agent->save();
        //dd($agent);

        session()->flash('Success', 'Agent Updated Successfully');

        return redirect('/Agent');

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


    public function removeAgent(Request $request) {

        //$data = $request->all();

        //Find the agent
        $agent = Agent::findOrFail($request->id);

        //Delete the agent
        $agent->delete();

        //Session Massage
        session()->flash('Success', 'agent Named ' . $agent->agent_name . ' Removed Successuflly');

        return json_encode(['Success' => 'agent Named ' . $agent->agent_name . ' Removed Successuflly']);
    }

    public function editAgent(Request $request) {
        //Find agent
        $agent = Agent::findOrFail($request->id);

        //Change the Name
        $agent->name = $request->agent_name;

        //Updating agent
        $agent->update();

        session()->flash('Success', 'agent Name changed Successfully to : ' . $agent->agent_name);

        return json_encode(['Success' => 'agent Name changed Successfully to : ' . $agent->agent_name]);
    }

}
