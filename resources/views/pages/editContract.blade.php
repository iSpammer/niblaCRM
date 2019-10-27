<div class="col-md-10">

        <div id="post-header">

            <h2 class="text-center">Edit Contract</h2>

        </div>

        <br/>

            <div id="post-form">


            {!! Form::open(['route' => 'contract.edit', 'method' => 'POST']) !!}

                        <div class="form-group">
                            {!! Form::label('contractName', 'contract Name') !!}

                            {!! Form::text('contractName', '', ['class' => 'form-control']) !!}
                      </div>

                        <div class="form-group">
                            {!! Form::label('contractStartDate', 'Contract start date') !!}

                            {{ Form::text('contractStartDate', null, ['class' => 'form-control', 'id'=>'datetimepicker']) }}

                        </div>
                        <div class="form-group">
                            {!! Form::label('contractEndDate', 'Contract End Date') !!}

                            {!! Form::text('contractEndDate', null, ['class' => 'form-control', 'id'=>'datetimepicker']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contractStatus', 'Contract Status') !!}

                            {!! Form::text('contractStatus', '', ['class' => 'form-control']) !!}
                        </div>
                            <div class="form-group">
                                    {!! Form::label('contractDescription', 'Description') !!}

                                    {!! Form::textarea('contractDescription', '', ['class' => 'form-control']) !!}
                            </div>



                            <div class="form-group">

                    {!! Form::submit('Add contract', ['class' => 'btn btn-success btn-block']) !!}

                </div>

            {!! Form::close() !!}

        </div>

    </div> <!-- Main Area -->
