@extends('layouts.app')

@section('main-row')

    <div class="col-md-10">

        <div id="post-header">

        <h2 class="text-center">Edit Agent {{$agent->agent_name}}</h2>

        </div>

        <br/>

            <div id="post-form">


            {!! Form::open(['route' => 'agent.update', 'method' => 'POST']) !!}
                    <div class="form-group">
                            {!! Form::label('agentId', "Editing this agent") !!}

                            <select name="agentId" id="agentId" class="form-control">

                                        <option value="{{ $agent->id }}">{{$agent->agent_name}}</option>

                            </select>

                        </div>

                        <div class="form-group">
                            {!! Form::label('agentName', 'Agent Name') !!}

                            {!! Form::text('agentName', isset($agent->agent_name)? $agent->agent_name : '', ['class' => 'form-control']) !!}
                      </div>

                        <div class="form-group">
                            {!! Form::label('agentWebsite', 'Website') !!}

                            {!! Form::text('agentWebsite', isset($agent->agent_website)? $agent->agent_website : '', ['class' => 'form-control']) !!}


                        <div class="form-group">
                            {!! Form::label('agentMainContactName', 'Contact Name') !!}

                            {!! Form::text('agentMainContactName', isset($agent->agent_main_contact_name)? $agent->agent_main_contact_name : '' , ['class' => 'form-control', ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('agentMoto', 'Moto') !!}

                            {!! Form::text('agentMoto', isset($agent->agent_moto)? $agent->agent_moto : '', ['class' => 'form-control']) !!}
                        </div>
                            <div class="form-group">
                                    {!! Form::label('agentBusiness', 'Business') !!}

                                    {!! Form::text('agentBusiness', isset($agent->agent_moto)? $agent->agent_moto : '', ['class' => 'form-control']) !!}
                            </div>
                           <!-- <div class="form-group">
                                    {!! Form::label('project', "Agent's Project") !!}

                                    <select name="project" id="project" class="form-control">
                                            {{-- @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">{{$project->project_name}}</option>
                                            @endforeach --}}
                                    </select>

                                </div>
                            -->


                                <div class="form-group">
                                        {!! Form::label('tier', 'tier') !!}

                                        <select name="tier" id="tier" class="form-control">
                                                @foreach ($tiers as $tier)
                                                    <option value="{{ $tier->id }}">{{$tier->tier_name}}</option>
                                                @endforeach
                                        </select>

                                    </div>



                            <div class="form-group">


                                {!! Form::label('class', 'Class') !!}
                                <select name="class" id="class" class="form-control">
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{$class->class_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">

                                    {!! Form::label('status', 'Status') !!}
                                    <select name="status" id="status" class="form-control">
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">{{$status->status_name}}</option>
                                        @endforeach
                                    </select>

                            </div>
                            <div class="form-group">
                                    {!! Form::label('agentContactInfo', 'Contact info') !!}

                                    {!! Form::textarea('agentContactInfo', isset($agent->agent_contact_info)? $agent->agent_contact_info : '', ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('agentImage', "Agent's image") !!}
                                    {!! Form::file('image', ['class' => 'form-control']) !!}
                            </div>



                            <div class="form-group">

                    {!! Form::submit('Update Agent', ['class' => 'btn btn-success btn-block']) !!}

                </div>

            {!! Form::close() !!}

        </div>

    </div> <!-- Main Area -->

@endsection
