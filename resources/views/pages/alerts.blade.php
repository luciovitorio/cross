@extends('master.master')

@section('content')
<div class="page-content">
  <div class="mb-3">
    <h4 class="mb-4 mb-md-0">Cadastro de Alertas</h4>
    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary btn-icon-text mb-4" data-bs-toggle="modal"
        data-bs-target="#createAlertModal">
        <i data-feather="alert-octagon" class="btn-icon-prepend"></i>
        Cadastrar Alerta
      </button>
    </div>
  </div>
  <!-- CARD 1 -->
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Lista de Alertas</h6>
          <div class="table-responsive">
            <table class="table alertTable tbl" style="width: 100%;">
              <thead>
                <tr>
                  <th></th>
                  <th>Mensagem</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($alerts as $alert)
                <tr>
                  <td></td>
                  <td>{{substr($alert->message,0,21).'...'}}</td>
                  <td class="col">
                    <div class="btn-group">
                      <button type="button" data-bs-toggle="modal" idAlert="{{$alert->id}}" id=""
                        data-bs-target="#editAlertModal" class="btn btnEdit btn-xs btn-warning btn-icon">
                        <i data-feather="edit"></i>
                      </button>
                      <button type="button" class="btn btn-xs btnDel btn-danger btn-icon" idAlert="{{$alert->id}}">
                        <i data-feather="x-square"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL ADD ALERT-->
<div class="modal fade" id="createAlertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form role="form" name="createAlert" action="{{route('alert.store')}}" method="POST">
        <div class="modal-header text-bg-light">
          <h5 class=" modal-title" id="exampleModalLabel">Criar Alerta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="alert-octagon"></i></span>
              <textarea class="form-control" name="message" placeholder="Insira seu texto aqui" aria-invalid="true"
                aria-describedby="basic-addon1" required></textarea>

              <label id="message-error" class="error invalid-feedback">
              </label>

            </div>
            <span class="badge bg-primary text-wrap">Máximo de 191 caracteres</span>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDIT ALERT-->
<div class="modal fade" id="editAlertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form role="form" name="editAlert" action="{{route('alert.update','/')}}" method="POST">
        <div class="modal-header text-bg-light">
          <h5 class=" modal-title" id="exampleModalLabel">Editar Alerta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="id" name="id">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="alert-octagon"></i></span>
              <textarea class="form-control" id="editMessage" name="message" placeholder="Insira seu texto aqui"
                aria-invalid="true" aria-describedby="basic-addon1" required></textarea>

              <label id="editMessage-error" class="error invalid-feedback">
              </label>

            </div>
            <span class="badge bg-primary text-wrap">Máximo de 191 caracteres</span>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Alterar Alerta</button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection


@section('js')
<script src="{{asset('assets/js/_iniAlertDataTable.js')}}"></script>
<script src="{{asset('assets/js/_alertCreate.js')}}"></script>
<script src="{{asset('assets/js/_alertEdit.js')}}"></script>
<script src="{{asset('assets/js/_alertDel.js')}}"></script>
@endsection