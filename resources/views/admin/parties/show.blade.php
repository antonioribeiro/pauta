@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-8 col-md-10 align-self-center">
                    <h4 class="mb-0">
                        <a href="{{ route('parties.index') }}">Partidos</a>

                        @if (is_null($party->id))
                            > NOVO
                        @else
                            > {{ $party->code }}
                        @endif
                    </h4>
                </div>

                <div class="col-xs-4 col-md-2 text-right">
                    @include('partials.save-button')
                </div>
            </div>
        </div>

        <div class="card-body">
            @include('partials.alerts')

            <form name="formulario" id="formulario" action="{{ route('parties.store') }}" method="POST">
                {{ csrf_field() }}

                <input name="id" type='hidden' value="{{ $party->id }}" id="id" >

                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="code">Sigla</label>
                        <input name="code" value="{{is_null(old('code')) ? $party->code : old('code')}}" class="form-control" id="code" aria-describedby="nameHelp" placeholder="Sigla" >
                    </div>

                    <div class="form-group col-md-10">
                        <label for="name">Nome</label>
                        <input name="name" value="{{is_null(old('name')) ? $party->name : old('name')}}" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nome" >
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
