@extends('layouts.app')

@section('content')
    <div class="container" id="vue-link-generator">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gerador de links</div>

                    <div class="card-body">
                        <app-link-generator></app-link-generator>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
