@extends('layouts.app')

@section('content')
    <div class="col-md-12" id="vue-admin">
        <div class="card">
            <div class="card-header">Painel de Controle</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a class="btn btn-primary btn-lg p-5 m-lg-5" href="#">
                    Pauta
                </a>
            </div>
        </div>
    </div>
@endsection
