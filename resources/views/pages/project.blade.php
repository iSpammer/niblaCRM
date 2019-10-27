@extends('layouts.app')

@section('main-row')

@if(count($projects) > 0)

<div class="col" id="main-project">

        <div id="project-header">
            <h4> Orojects </h4>
        </div>

        <div id="project-container">

            <div id="categories-table" class="table-responsive">


                <table class="table">

                    <tr>

                        <th>ID</th>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Priority</th>
                        <th>Final deadline</th>
                        <th>Next deadline</th>
                        <th>Current milestone</th>
                        <th>Completation Level</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Belong to</th>
                        <th>Under The following Contracts</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Add Project</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>

                    @foreach($projects as $i=>$project)

                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->project_icon }}</td>
                        <td>{{ $project->project_name }}</td>
                        <td>{{ $project->project_priority }}</td>
                        <td>{{ $project->project_final_deadline }}</td>
                        <td>{{ $project->project_next_deadline }}</td>
                        <td>{{ $project->project_current_milestone }}</td>
                        <td>{{ $project->project_cmp_level }}</td>
                        <td>{{ $project->project_status }}</td>
                        <td>{{ $project->project_description }}</td>
                        <td>
                                <ul>
                                    @foreach ($project->agents as $agent)
                                    <li>
                                            {{ $agent->agent_name }}
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                        <td>
                                <ul>
                                    @foreach ($project->contracts as $contract)
                                    <li>
                                            {{ $contract->contract_name }}
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                        <td>{{ $project->created_at }}</td>
                        <td>{{ $project->updated_at }}</td>
                        <td><a href="addContractProjectPage/{{$project->id}}"><span id="{{ $project->id }}" class="btn btn-secondary">Add Contract</span></a></td>
                        {{-- <!--<td><a data-js="open-edit-project"><span id="{{ $project->id }}" class="btn btn-warning">Edit</span></a></td>--> --}}
                        <td><a class="btn btn-warning" href="{{ route('project.edit', [$project->id]) }}">Edit Project</a></td>
                        <td><a data-js="open-remove-project"><span id="{{ $project->id }}" class="btn btn-danger">Remove</span></a></td>
                    </tr>

                    @endforeach

                </table>




            </div>

        </div>

    </div>
    @endif



    <div class="col-md-10">

        <div id="post-header">

            <h2 class="text-center">Add New Project</h2>

        </div>

        <br/>

            <div id="post-form">


            {!! Form::open(['route' => 'project.add', 'method' => 'POST']) !!}

                        <div class="form-group">
                            {!! Form::label('projectName', 'project Name') !!}

                            {!! Form::text('projectName', '', ['class' => 'form-control']) !!}
                      </div>

                        <div class="form-group">
                            {!! Form::label('projectIcon', 'Icon') !!}

                            {!! Form::file('icon', ['class' => 'form-control']) !!}


                        <div class="form-group">
                            {!! Form::label('projectPriority', 'Priority') !!}

                            {!! Form::text('projectPriority', '', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('projectFinalDeadline', 'Final Deadline') !!}

                            {!! Form::text('projectFinalDeadline', '', ['class' => 'form-control']) !!}
                        </div>
                            <div class="form-group">
                                    {!! Form::label('projectNextDeadline', 'Next Deadline') !!}

                                    {!! Form::text('projectNextDeadline', '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('projectCurrentMilestone', 'Current Milestone') !!}

                                    {!! Form::text('projectCurrentMilestone', '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('projectCmpLevel', 'Completation Level') !!}

                                    {!! Form::text('projectCmpLevel', '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('statusId', 'Status') !!}

                                    <select name="statusId" id="statusId" class="form-control">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}">{{$status->status_name}}</option>
                                            @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                    {!! Form::label('projectDescription', 'Description') !!}

                                    {!! Form::text('projectDescription', '', ['class' => 'form-control']) !!}
                            </div>

                            {{-- <div class="form-group">
                                    {!! Form::label('agentId', 'Belongs to') !!}

                                    <select name="agentId" id="agentId" class="form-control">
                                            @foreach ($agents as $agent)
                                                <option value="{{ $agent->id }}">{{$agent->agent_name}}</option>
                                            @endforeach
                                    </select>

                                </div> --}}




                                <div class="form-group">
                                        {!! Form::label('contractId', 'Under the following contract') !!}

                                        <select name="contractId" id="contractId" class="form-control">
                                                @foreach ($contracts as $contract)
                                                    <option value="{{ $contract->id }}">{{$contract->contract_name}}</option>
                                                @endforeach
                                        </select>

                                    </div>




                            <div class="form-group">

                    {!! Form::submit('Add Project', ['class' => 'btn btn-success btn-block']) !!}

                </div>

            {!! Form::close() !!}

        </div>

    </div> <!-- Main Area -->

@endsection
