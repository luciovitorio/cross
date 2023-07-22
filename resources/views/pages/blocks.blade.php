@extends('master.master')

@section('content')
<div class="page-content">
  <div class="mb-3">
    <h4 class="mb-5 mb-md-0">Cadastro de Bloqueios</h4>
  </div>
  <!-- CARD 1 -->
  <div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="row align-items-start">
            <div class="col-md-7">
              <div class="d-grid gap-2 mb-3">
                {{-- SEGUNDA-FEIRA --}}
                <div class="d-grid d-flex">
                  @if ($segunda->status == 1)
                  <button class="btn btnSeg btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$segunda->name}}" aria-expanded="false">
                    {{$segunda->name}}-feira | <span class="badge bg-success">Liberado</span>
                  </button>

                  <button type="button" class="btn btnDaySeg btn-danger btn-icon" idDay="{{$segunda->id}}"
                    dayStatus="0">
                    <i data-feather="x-square"></i>
                  </button>
                  @else
                  <button class="btn disabled btnSeg btn-inverse-danger flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$segunda->name}}" aria-expanded="false" id="day">
                    {{$segunda->name}}-feira | <span class="badge bg-danger">Bloqueado</span>
                  </button>

                  <button type="button" class="btn btnDaySeg btn-success btn-icon" idDay="{{$segunda->id}}"
                    dayStatus="1">
                    <i data-feather="check-square"></i>
                  </button>
                  @endif

                </div>
                <div class="collapse" id="{{$segunda->name}}">
                  <div class="card card-body">
                    @foreach ($hoursSeg as $hour)
                    <div class="d-grid d-flex">
                      @if ($hour->status == 1)
                      <button class="btn btnHourSeg btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        type=" button" hourStatus="0">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">Liberado</span>
                      </button>

                      @else
                      <button class="btn btnHourSeg btn-inverse-danger mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        type=" button" hourStatus="1">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                      </button>

                      @endif

                    </div>
                    @endforeach
                  </div>
                </div>

                {{-- TERÇA-FEIRA --}}

                <div class="d-grid d-flex">
                  @if ($terca->status == 1)
                  <button class="btn btnTer btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$terca->name}}" aria-expanded="false">
                    {{$terca->name}}-feira | <span class="badge bg-success">Liberado</span>
                  </button>

                  <button type="button" class="btn  btnDayTer btn-danger btn-icon " idDay="{{$terca->id}}"
                    dayStatus="0">
                    <i data-feather="x-square"></i>
                  </button>
                  @else
                  <button class="btn btnTer disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$terca->name}}" aria-expanded="false">
                    {{$terca->name}}-feira | <span class="badge bg-danger">Bloqueado</span>
                  </button>

                  <button type="button" class="btn btnDayTer  btnDel btn-success btn-icon " idDay="{{$terca->id}}"
                    dayStatus=" 1">
                    <i data-feather="check-square"></i>
                  </button>
                  @endif

                </div>
                <div class="collapse" id="{{$terca->name}}">
                  <div class="card card-body">
                    @foreach ($hoursTer as $hour)
                    <div class="d-grid d-flex">
                      @if ($hour->status == 1)
                      <button class="btn btnHourTer btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        type=" button" hourStatus="0" type=" button">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">Liberado</span>
                      </button>

                      @else
                      <button class="btn btnHourTer btn-inverse-danger mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        type=" button" hourStatus="1" type=" button">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                      </button>

                      @endif

                    </div>
                    @endforeach
                  </div>
                </div>


                {{-- QUARTA-FEIRA --}}

                <div class="d-grid d-flex">
                  @if ($quarta->status == 1)
                  <button class="btn btnQua btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$quarta->name}}" aria-expanded="false">
                    {{$quarta->name}}-feira | <span class="badge bg-success">Liberado</span>
                  </button>

                  <button type="button" class="btn  btnDayQua btn-danger btn-icon " idDay="{{$quarta->id}}"
                    dayStatus="0">
                    <i data-feather="x-square"></i>
                  </button>
                  @else
                  <button class="btn btnQua disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$quarta->name}}" aria-expanded="false">
                    {{$quarta->name}}-feira | <span class="badge bg-danger">Bloqueado</span>
                  </button>

                  <button type="button" class="btn btnDayQua  btnDel btn-success btn-icon " idDay="{{$quarta->id}}"
                    dayStatus=" 1">
                    <i data-feather="check-square"></i>
                  </button>
                  @endif

                </div>
                <div class="collapse" id="{{$quarta->name}}">
                  <div class="card card-body">
                    @foreach ($hoursQua as $hour)
                    <div class="d-grid d-flex">
                      @if ($hour->status == 1)
                      <button class="btn btnHourQua btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        hourStatus="0" type=" button">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">Liberado</span>
                      </button>

                      @else
                      <button class="btn btnHourQua btn-inverse-danger mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        hourStatus="1" type=" button">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                      </button>

                      @endif

                    </div>
                    @endforeach
                  </div>
                </div>

                {{-- QUINTA-FEIRA --}}

                <div class="d-grid d-flex">
                  @if ($quinta->status == 1)
                  <button class="btn btnQui btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$quinta->name}}" aria-expanded="false">
                    {{$quinta->name}}-feira | <span class="badge bg-success">Liberado</span>
                  </button>

                  <button type="button" class="btn  btnDayQui btn-danger btn-icon " idDay="{{$quinta->id}}"
                    dayStatus="0">
                    <i data-feather="x-square"></i>
                  </button>
                  @else
                  <button class="btn btnQui disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$quinta->name}}" aria-expanded="false">
                    {{$quinta->name}}-feira | <span class="badge bg-danger">Bloqueado</span>
                  </button>

                  <button type="button" class="btn  btnDayQui btn-success btn-icon " idDay="{{$quinta->id}}"
                    dayStatus="1">
                    <i data-feather="check-square"></i>
                  </button>
                  @endif

                </div>
                <div class="collapse" id="{{$quinta->name}}">
                  <div class="card card-body">
                    @foreach ($hoursQui as $hour)
                    <div class="d-grid d-flex">
                      @if ($hour->status == 1)
                      <button class="btn btnHourQui btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        hourStatus="0" type=" button">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">Liberado</span>
                      </button>

                      @else
                      <button class="btn btnHourQui btn-inverse-danger mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        hourStatus="1" type=" button">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                      </button>

                      @endif

                    </div>
                    @endforeach
                  </div>
                </div>


                {{-- SEXTA-FEIRA --}}

                <div class="d-grid d-flex">
                  @if ($sexta->status ==1)
                  <button class="btn btnSex btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$sexta->name}}" aria-expanded="false">
                    {{$sexta->name}}-feira | <span class="badge bg-success">Liberado</span>
                  </button>

                  <button type="button" class="btn  btnDaySex btn-danger btn-icon " idDay="{{$sexta->id}}"
                    dayStatus="0">
                    <i data-feather="x-square"></i>
                  </button>
                  @else
                  <button class="btn btnSex disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$sexta->name}}" aria-expanded="false">
                    {{$sexta->name}}-feira | <span class="badge bg-danger">Bloqueado</span>
                  </button>

                  <button type="button" class="btn  btnDaySex btn-success btn-icon " idDay="{{$sexta->id}}"
                    dayStatus="1">
                    <i data-feather="check-square"></i>
                  </button>
                  @endif

                </div>
                <div class="collapse" id="{{$sexta->name}}">
                  <div class="card card-body">
                    @foreach ($hoursSex as $hour)
                    <div class="d-grid d-flex">
                      @if ($hour->status == 1)
                      <button class="btn btnHourSex btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        hourStatus="0" type=" button">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">Liberado</span>
                      </button>

                      @else
                      <button class="btn btnHourSex btn-inverse-danger mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        hourStatus="1" type=" button">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                      </button>

                      @endif

                    </div>
                    @endforeach
                  </div>
                </div>


                {{-- SABADO --}}

                <div class="d-grid d-flex">
                  @if ($sabado->status == 1)

                  <button class="btn btnSab btn-inverse-primary flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$sabado->name}}" aria-expanded="false">
                    {{$sabado->name}} | <span class="badge bg-success">Liberado</span>
                  </button>

                  <button type="button" class="btn  btnDaySab btn-danger btn-icon " idDay="{{$sabado->id}}"
                    dayStatus="0">
                    <i data-feather="x-square"></i>
                  </button>

                  @else

                  <button class="btn btnSab disabled btn-inverse-danger flex-grow-1 me-1 text-capitalize" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{$sabado->name}}" aria-expanded="false">
                    {{$sabado->name}} | <span class="badge bg-danger">Bloqueado</span>
                  </button>

                  <button type="button" class="btn  btnDaySab btn-success btn-icon " idDay="{{$sabado->id}}"
                    dayStatus="1">
                    <i data-feather="check-square"></i>
                  </button>

                  @endif


                </div>
                <div class="collapse" id="{{$sabado->name}}">
                  <div class="card card-body">
                    @foreach ($hoursSab as $hour)
                    <div class="d-grid d-flex">

                      @if ($hour->status == 1)

                      <button class="btn btnHourSab btn-inverse-success mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        hourStatus="0" type=" button">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-success">Liberado</span>
                      </button>


                      @else

                      <button class="btn btnHourSab btn-inverse-danger mb-3 flex-grow-1 me-1" idHour="{{$hour->id}}"
                        hourStatus="1" type=" button">
                        {{$hour->hour}}:00 - {{$hour->hour+1}}:00 | <span class="badge bg-danger">Bloqueado</span>
                      </button>


                      @endif


                    </div>
                    @endforeach
                  </div>
                </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- QUANTIDADE DE ALUNOS --}}
  <div class="mb-3">
    <h4 class="mb-5 mb-md-0">Quantidade de Alunos</h4>
  </div>
  <div class="col-12 col-xl-12 grid-margin stretch-card">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="row align-items-start">
          <div class="col-md-7">
            <div class="d-grid gap-2 mb-3">
              <div class="d-grid d-flex">
                <div class="mb-3">
                  <h4 class="mb-4 mb-md-0">Quantidade de alunos permitidos por aula: {{$quantity}}</h4>
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-icon-text mt-4" data-bs-toggle="modal"
                      data-bs-target="#alterQtdModal">
                      Alterar quantidade
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- LISTA DE ALUNOS --}}
  <div class="mb-3">
    <h4 class="mb-5 mb-md-0">Check-in Alunos</h4>
  </div>
  <div class="col-12 col-xl-12 grid-margin stretch-card">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="row align-items-start table-responsive">
          <table class="table" style="width: 100%;">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Hora</th>
                <th>Dia da semana</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              @if ($user['hourStatus'])
              <tr>
                <td class="align-middle">{{ $user['name'] }}</td>
                <td class="align-middle">{{ $user['hour'] }}:00 - {{ $user['hour'] + 1}}:00</td>
                <td class="align-middle text-capitalize">{{ $user['day'] }}</td>
                <td>
                  <button type="button" class="btn btnExclude btn-danger btn-icon" idUser="{{$user['userId']}}"
                    idHour="{{$user['hourId']}}">
                    <i data-feather="x-square"></i>
                  </button>
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>

  <div class="mb-3">
    <h4 class="mb-5 mb-md-0">RESET DA SEMANA</h4>
  </div>
  <div class="col-12 col-xl-12 grid-margin stretch-card">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="row align-items-start">
          <button type="submit" id="btnReset" class="btn btn-danger btn-icon-text mt-4">
            RESETAR A SEMANA!
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL EDIT QTD-->
<div class="modal fade" id="alterQtdModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form role="form" name="quantity" action="{{route('quantity.update')}}" method="POST">
        @csrf
        <div class="modal-header text-bg-light">
          <h5 class=" modal-title" id="exampleModalLabel">Alterar Quantidade de Alunos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i data-feather="users"></i></span>
              <input type="number" class="form-control " name="quantity"
                placeholder="Insira a quantidade de alunos permitido" aria-invalid="true"
                aria-describedby="basic-addon1" required>
              <label id="quantity-error" class="error invalid-feedback">
              </label>
            </div>
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
@endsection

@section('js')
<script src="{{asset('assets/js/_blockCreate.js')}}"></script>
@endsection