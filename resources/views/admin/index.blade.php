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
                                <label for="exampleInputEmail1">ID do Portal</label>
                                <input v-model="portalId" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Link no Lotus Notes</label>
                                <input v-model="notesLink" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">
                                    Link no Portal

                                    <a href="#" class="copy" data-clipboard-target="#siteLink">
                                        (copiar)
                                    </a>
                                </label>

                                <input v-model="siteLink" id="siteLink" class="form-control" placeholder="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
