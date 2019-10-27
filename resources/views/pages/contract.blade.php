@extends('layouts.app')

@section('main-row')

{{-- @if(count($contracts) > 0)

   <contract-table-component></contract-table-component>

@endif --}}
<!--
    <div class="col-md-10">

        <div id="post-header">

            <h2 class="text-center">Add New contract</h2>

        </div>

        <br/>

            <div id="post-form">

            <contract-component></contract-component>

             {{-- {!! Form::open(['route' => 'contract.add', 'method' => 'POST']) !!}

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

            {!! Form::close() !!} --}}

        </div>

    </div>
-->

<contract-component></contract-component>

@endsection
