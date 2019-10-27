<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Contract;
use App\Project;
use App\Tier;
use App\Classes;
use App\Status;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
        $projects = Project::orderBy('created_at', 'desc')->get();
        $contracts = Contract::orderBy('created_at', 'desc')->get();
        $tiers = Tier::orderBy('created_at', 'desc')->get();
        $classes = Classes::orderBy('created_at', 'desc')->get();
        $statuses = Status::orderBy('created_at', 'desc')->get();
       // dd($contracts);
        $data = [
            'projects' => $projects,
            'contracts' => $contracts,
            'tiers' => $tiers,
            'classes' => $classes,
            'statuses' => $statuses
        ];
        return view('pages.project')->with($data);
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
        //dd($request->contract);
       // $this->validate($request, ['projectName' => 'required', 'projectBusiness' => 'required', 'status' => 'required']);

        $project = new Project();
        $project->project_name = $request->projectName;
        $project->project_icon = $request->projectIcon;
        $project->project_priority = $request->projectPriority;
        $project->project_final_deadline = $request->projectFinalDeadline;
        $project->project_next_deadline = $request->projectNextDeadline;
        $project->project_current_milestone = $request->projectCurrentMilestone;
        $project->project_status = $request->projectStatus;
        $project->project_description = $request->projectDescription;
        $contractId = $request->contractId;


        // $data = [
        //     'image' => '',
        // ];
        try
        {//bb2 el 5al2 syda zenab modryt amn kahra share3 7asan b2alt els3ydy bared shr3 7san b2alt el s3ydy 3omra door 3 dr safwat
            //mdam aml 3yza tsl 3alek amal mohamed 7elmy
       //  s3at 3arys w23t mn el 3rbya mostafa vabo 3lm embaba
            //dd($request->contractId);
           // dd($contractId);
            $project->save();

            $contract = Contract::find($contractId);
          //  dd($contract);
            //dd($contract);
            // $tier = Tier::find($tierId);
            // $class = Classes::find($classId);
            // $status = Status::find($statusId);
            $project->contracts()->save($contract);

            //dd($contract);


        }
        // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {

        }


        $project->save();
        //dd($project);

        session()->flash('Success', 'Project Added Successfully');

        return back();

    }

    public function showAddContract($id){

        $project = project::findOrFail($id);
        $contracts = Contract::orderBy('created_at', 'desc')->get();

       // dd($contracts);
        $data = [
            'project' => $project,
            'contracts' => $contracts,

        ];
        //dd($project);
        return view('pages.addContractprojectPage')->with($data);
    }




    public function addContract(Request $request){
        $projectId = $request->projectId;
        $contractId= $request->contract;

        // $data = [
        //     'image'   => '',
        // ];
        try
        {
            //dd($request->contract);
           //dd($request->contract);
            $project = project::find($projectId);
            $project->save();

            $contract = Contract::find($contractId);
            // dd($contract);
            // $tier = Tier::find($tierId);
            // $class = Classes::find($classId);
            // $status = Status::find($statusId);
            $project->contracts()->save($contract);
            $contract->save();
            //dd($contract);


        }
        // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {

        }



        $project->save();
        //dd($project);

        session()->flash('Success', 'project Added Successfully');

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
        $project = project::findOrFail($id);
        $contracts = Contract::orderBy('created_at', 'desc')->get();
        $tiers = Tier::orderBy('created_at', 'desc')->get();
        $classes = Classes::orderBy('created_at', 'desc')->get();
        $statuses = Status::orderBy('created_at', 'desc')->get();
       // dd($contracts);
        $data = [
            'project' => $project,
            'contracts' => $contracts,
            'tiers' => $tiers,
            'classes' => $classes,
            'statuses' => $statuses
        ];
        return view('pages.editproject')->with($data);
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
       // $this->validate($request, ['projectName' => 'required', 'projectBusiness' => 'required', 'status' => 'required']);

        $project = project::findOrFail($request->projectId);
        $project->project_name = $request->projectName;
        $project->project_website = $request->projectWebsite;
        $project->project_main_contact_name = $request->projectMainContactName;
        $project->project_moto = $request->projectMoto;
        $project->project_business = $request->projectBusiness;
        $tierId = $request->tier;
        $classId = $request->class;
        $statusId = $request->status;
        $project->project_contact_info = $request->projectContactInfo;
        $contractId= $request->contract;

        // $data = [
        //     'image' => '',
        // ];
        try
        {
            //dd($request->contract);
           // dd($contractId);
            $project->save();

            $contract = Contract::find($contractId);
            //dd($contract);
            // $tier = Tier::find($tierId);
            // $class = Classes::find($classId);
            // $status = Status::find($statusId);
            $project->contracts()->save($contract);
            $contract->save();
            //dd($contract);


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

        $project->tier = $tierName;
        $project->class = $className;
        $project->status = $statusName;



        $project->save();
        //dd($project);

        session()->flash('Success', 'project Updated Successfully');

        return redirect('/project');

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


    public function removeproject(Request $request) {

        //$data = $request->all();

        //Find the project
        $project = project::findOrFail($request->id);

        //Delete the project
        $project->delete();

        //Session Massage
        session()->flash('Success', 'project Named ' . $project->project_name . ' Removed Successuflly');

        return json_encode(['Success' => 'project Named ' . $project->project_name . ' Removed Successuflly']);
    }

    public function editproject(Request $request) {
        //Find project
        $project = project::findOrFail($request->id);

        //Change the Name
        $project->name = $request->project_name;

        //Updating project
        $project->update();

        session()->flash('Success', 'project Name changed Successfully to : ' . $project->project_name);

        return json_encode(['Success' => 'project Name changed Successfully to : ' . $project->project_name]);
    }

}
