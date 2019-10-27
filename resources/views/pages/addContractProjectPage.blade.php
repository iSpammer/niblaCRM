@extends('layouts.app')

@section('main-row')

    <div class="col-md-10">

        <div id="post-header">

            <h2 class="text-center">Add New Agent</h2>

        </div>

        <br/>

            <div id="post-form">


            {!! Form::open(['route' => 'project.addContract', 'method' => 'POST']) !!}
                            <div class="form-group">
                                    {!! Form::label('projectId', "Adding contract to this project") !!}

                                    <select name="projectId" id="projectId" class="form-control">

                                                <option value="{{ $project->id }}">{{$project->project_name}}</option>

                                    </select>

                            </div>
                            <div class="form-group">
                                    {!! Form::label('contract', "Agent's Contract") !!}

                                    <select name="contract" id="contract" class="form-control">
                                            @foreach ($contracts as $contract)
                                                <option value="{{ $contract->id }}">{{$contract->contract_name}}</option>
                                            @endforeach
                                    </select>

                            </div>



                    {!! Form::submit('Add Agent', ['class' => 'btn btn-success btn-block']) !!}

                </div>

            {!! Form::close() !!}

        </div>

    </div> <!-- Main Area -->

@endsection
