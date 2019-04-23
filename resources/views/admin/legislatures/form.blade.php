@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8 align-self-center">
                    <h4 class="mb-0">
                        <a href="{{ route('legislatures.index') }}">Legislaturas</a>

                        @if(is_null($legislature->id))
                            > NOVA
                        @else
                            > {{ $legislature->number }}
                        @endif
                    </h4>
                </div>

                <div class="col-sm-4 align-self-center d-flex justify-content-end">
                    @include('partials.save-button')
                    @include('partials.edit-button', ['model' => $legislature])
                </div>
            </div>
        </div>

        <div class="card-body">
            @include('partials.alerts')

            @if ($errors->has('number'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('number') }}
                </div>
            @endif

            @if ($errors->has('year_start'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('year_start') }}
                </div>
            @endif

            @if ($errors->has('year_end'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('year_end') }}
                </div>
            @endif

            <form name="formulario" id="formulario" action="{{ route('legislatures.store') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $legislature->id }}">

                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="number">Número</label>
                                <input class="form-control" name="number" id="number" value="{{ $legislature->number }}"/>
                            </div>

                            <div class="form-group" >
                                <label for="year_start">Ano de início</label>
                                <input class="form-control" name="year_start" id="year_start" value="{{$legislature->year_start}}"/>
                            </div>

                            <div class="form-group" >
                                <label for="year_end">Ano final</label>
                                <input class="form-control" name="year_end" id="year_end" value="{{$legislature->year_end}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="form-group col-md-6" >
                    @include('admin.congressman_legislatures.partials.table')
                </div>
            </div>
        </div>
    </div>
@endsection


