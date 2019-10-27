<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;
use App\Events\ContractPublished;
use App\Events\ContractRemoved;
use App\Events\ContractUpdated;
use App\Events\StatusLiked;

class ContractController extends Controller
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
        $contracts = Contract::orderBy('created_at', 'desc')->get();
        return view('pages.contract')->with('contracts', $contracts);
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
        $this->validate($request, ['contractName' => 'required', 'contractStartDate' => 'required', 'contractEndDate' => 'required', 'contractStatus' => 'required']);

        $contract = new contract();
        $contract->contract_name = $request->contractName;
        $contract->contract_start_date = $request->contractStartDate;
        $contract->contract_end_date = $request->contractEndDate;
        $contract->contract_status = $request->contractStatus;
        $contract->contract_description = $request->contractDescription;

        //Save Intance
        $contract->save();
        event(new ContractPublished($contract));

        session()->flash('Success', 'contract Added Successfully');

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
        //  //Find contract
        //  $contract = contract::findOrFail($id);

        //  //Change the Name
        //  $contract->name = $request->contract_name;

        //  //Updating contract
        //  $contract->update();

        //  session()->flash('Success', 'contract Name changed Successfully to : ' . $contract->contract_name);

        //  return json_encode(['Success' => 'contract Name changed Successfully to : ' . $contract->contract_name]);
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
        if($request->id == 1){
            session()->flash('Danger', 'Contract Failed to be Updated');
            return json_encode(['Danger' => 'Contract Failed to be Updated']);

        }
        $contract = Contract::findOrFail($request->id);

        $contract->contract_name = $request->contractName;
        $contract->contract_start_date = $request->contractStartDate;
        $contract->contract_end_date = $request->contractEndDate;
        $contract->contract_status = $request->contractStatus;
        $contract->contract_description = $request->contractDescription;

        //Updating Category
        $contract->update();
        session()->flash('Success', 'Contract Updated Successfully');

        event(new ContractUpdated($contract));

        return json_encode(['Success' => 'Category Updated Successfully to : ' . $contract->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          //$data = $request->all();

        //Find the contract
        if($id == 1){
            session()->flash('Danger', 'Contract Failed to Removed');
            return json_encode(['Danger' => 'Contract Failed to Removed']);

        }
        $contract = contract::findOrFail($id);
        if($contract->id == 1){
            session()->flash('Danger', 'contract Named ' . $contract->contract_name . ' Failed to be removed');
            return json_encode(['Danger' => 'contract Named ' . $contract->contract_name . ' Failed to be removed']);

        }
        else{
            event(new ContractRemoved($contract));

            //Delete the contract
            $contract->delete();

            //Session Massage
            session()->flash('Success', 'contract Named ' . $contract->contract_name . ' Removed Successuflly');

            return json_encode(['Success' => 'contract Named ' . $contract->contract_name . ' Removed Successuflly']);
        }
    }
}
