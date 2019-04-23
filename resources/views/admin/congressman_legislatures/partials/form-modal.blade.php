<!-- Modal de Remover da Legislatura -->
<div class="modal fade" id="removeCongressmanFromLegislatures"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remover da Legislatura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form" id="form_insertContact" name="form_insertContact" action="{{route('congressman_legislatures.removeFromLegislature')}}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}

                    <input name="congressman_id" type="hidden" value="{{ $congressman->id }}">

                    <div class="row">
                        <div class="col-md-5">
                            <p>Data Fim</p>
                            <input type="date" name="ended_at" >
                        </div>


                    </div>
                </div>

                <div class="modal-footer">
                    <button id="cancelContactButton" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="saveContactButton" type="submit" class="btn btn-success">
                        Gravar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Remover da Legislatura -->
<div class="modal fade" id="includeCongressmanInLegislatures"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Incluir na Legislatura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form" id="form_insertContact" name="form_insertContact" action="{{route('congressman_legislatures.includeInLegislature')}}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}

                    <input name="congressman_id" type="hidden" value="{{ $congressman->id }}">

                    <div class="row">
                        <div class="col-md-5">
                            <p>Data de início</p>
                            <input type="date" name="started_at" >
                        </div>


                    </div>
                </div>

                <div class="modal-footer">
                    <button id="cancelContactButton" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="saveContactButton" type="submit" class="btn btn-success">
                        Gravar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>