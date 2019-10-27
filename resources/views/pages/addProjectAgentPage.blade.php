@extends('layouts.app')

@section('main-row')

    <div class="col-md-10">

        <div id="post-header">

            <h2 class="text-center">Add New Agent</h2>

        </div>

        <br/>

            <div id="post-form">


            {!! Form::open(['route' => 'agent.addProject', 'method' => 'POST']) !!}
                            <div class="form-group">
                                    {!! Form::label('agentId', "Adding project to this agent") !!}

                                    <select name="agentId" id="agentId" class="form-control">

                                                <option value="{{ $agent->id }}">{{$agent->agent_name}}</option>

                                    </select>

                            </div>
                            <div class="form-group">
                                    {!! Form::label('project', "Agent's Project") !!}

                                    <select name="project" id="project" class="form-control">
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">{{$project->project_name}}</option>
                                            @endforeach
                                    </select>

                            </div>



                    {!! Form::submit('Add Project to Agent', ['class' => 'btn btn-success btn-block']) !!}

                </div>

            {!! Form::close() !!}

        </div>

    </div> <!-- Main Area -->

@endsection
