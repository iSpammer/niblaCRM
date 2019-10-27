@extends('layouts.app')

@section('main-row')

@if(count($agents) > 0)

    <div class="col" id="main-agent">

        <div id="agent-header">
            <h4> Agents </h4>
        </div>

        <div id="agent-container">

            <div id="categories-table" class="table-responsive">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Website</th>
                        <th>Main Contact Name</th>
                        <th>Moto</th>
                        <th>Business</th>
                        <th>Tier</th>
                        <th>Class</th>
                        <th>Status</th>
                        <th>Contact Info</th>
                        <th>Image</th>
                        <th>Project ID</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Add Project</th>
                        <th>Remove Project</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                    @foreach($agents as $i=>$agent)
                    <tr>
                        <td>{{ $agent->id }}</td>
                        <td>{{ $agent->agent_name }}</td>
                        <td>{{ $agent->agent_website }}</td>
                        <td>{{ $agent->agent_main_contact_name }}</td>
                        <td>{{ $agent->agent_moto }}</td>
                        <td>{{ $agent->agent_business }}</td>
                        <td>{{ $agent->tier }}</td>
                        <td>{{ $agent->class }}</td>
                        <td>{{ $agent->status }}</td>
                        <td>{{ $agent->agent_contact_info }}</td>
                        <td>{{ $agent->agent_image_path }}</td>
                        <td>
                            @foreach ($agent->projects as $project)
                                <ul>
                                    <li>
                                        {{$project->project_name}}
                                    </li>
                                </ul>
                            @endforeach
                        </td>
                        <td>{{ $agent->created_at }}</td>
                        <td>{{ $agent->updated_at }}</td>
                        <td><a href="addProjectAgentPage/{{$agent->id}}"><span id="{{ $agent->id }}" class="btn btn-dark">Add Project</span></a></td>
                        <td><a href="removeProjectAgentPage/{{$agent->id}}"><span id="{{ $agent->id }}" class="btn btn-secondary">Remove Project</span></a></td>
                        {{-- <!--<td><a data-js="open-edit-agent"><span id="{{ $agent->id }}" class="btn btn-warning">Edit</span></a></td>--> --}}
                        <td><a class="btn btn-warning" href="{{ route('agent.edit', [$agent->id]) }}">Edit Agent</a></td>
                        <td><a data-js="open-remove-agent"><span id="{{ $agent->id }}" class="btn btn-danger">Remove</span></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>

    </div>
@endif


<agent-post-component></agent-post-component>

@endsection
