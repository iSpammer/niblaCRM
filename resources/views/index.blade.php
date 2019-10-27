<html>

<body>

<h1> Laravel Many to Many Example </h1>
<h2> User 1 (John) is playing below Roles

@if ($agent->projects->count() > 0)

  <ul>

  @foreach($agent->projects as $agent)

    <li>{{ $agent->agent_name }}</li>

  @endforeach

  </ul>

@endif

<h2> Role 3 (Reader) is played by below Users

@if ($project->agents->count() > 0)

  <ul>

  @foreach($project->agents as $project)

    <li>{{ $project->project_name }}</li>

  @endforeach

  </ul>

@endif

</body>
</html>
