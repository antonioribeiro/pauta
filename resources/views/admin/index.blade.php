@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gerador de links</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link Notes</label>
                                <input class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Link Portal</label>
                                <input class="form-control" placeholder="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
